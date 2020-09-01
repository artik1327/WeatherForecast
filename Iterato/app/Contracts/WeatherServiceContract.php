<?php

namespace App\Contracts;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Interface WeatherServiceContract
 *
 * @package App\Contracts
 */
interface WeatherServiceContract
{

    /**
     * @param string $city
     * @param string $apiKey
     * @return JsonResponse
     */
    public function getWeatherByCity(string $city, string $apiKey): JsonResponse;
}
