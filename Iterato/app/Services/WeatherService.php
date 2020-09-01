<?php

namespace App\Services;

use App\Contracts\WeatherServiceContract;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class WeatherService
 *
 * @package App\Services
 */
class WeatherService implements WeatherServiceContract
{

    /**
     * @var string
     */
    private string $endpoint;

    /**
     * @var Client
     */
    private Client $client;

    /**
     * @var string
     */
    private string $units;

    /**
     * WeatherService constructor.
     *
     * @param $endpoint
     * @param $units
     * @param Client $client
     */
    public function __construct(string $endpoint, string $units, Client $client)
    {
        $this->client = $client;
        $this->endpoint = $endpoint;
        $this->units = $units;
    }

    /**
     * @description Returns weather forecast by given city, (units are set to metric -> celsius)
     * @param string|null $city
     * @param string|null $apiKey
     * @return JsonResponse
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function getWeatherByCity(?string $city, ?string $apiKey): JsonResponse
    {
        $response = $this->client->get($this->endpoint, [
          'query' => [
            'q' => $city,
            'appid' => $apiKey,
            'units' => $this->units
          ]
        ])->getBody()->getContents();

        return new JsonResponse($this->structureData($response));
    }

    /**
     * @description Structures array
     * @param $json
     * @return array
     * @throws \JsonException
     */
    private function structureData($json): array
    {
        $array = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        return [
            'temperature' => $array['main']['temp'],
            'feels_like' => $array['main']['feels_like'],
            'humidity' => $array['main']['humidity'],
            'wind_speed' => $array['wind']['speed'],
            'icon' => $array['weather'][0]['icon'],
            'state' => $array['weather'][0]['main'],
            'city' => $array['name']
        ];
    }
}
