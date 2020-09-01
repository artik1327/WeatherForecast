<?php

namespace App\Http\Controllers;

use App\Contracts\WeatherServiceContract;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class WeatherController
 *
 * @package App\Http\Controllers
 */
class WeatherController extends Controller
{

    /**
     * @var WeatherServiceContract
     */
    private WeatherServiceContract $weatherService;

    /**
     * WeatherController constructor.
     *
     * @param WeatherServiceContract $weatherService
     */
    public function __construct(WeatherServiceContract $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * @description Main weather forecast page
     * @return View
     */
    public function index(): View
    {
        return view('welcome');
    }

    /**
     * @description Returns clickable tab template
     * @param Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function getTabTemplate(Request $request): JsonResponse
    {
        return new JsonResponse(
          view('partials.tabs', ['city' => $request->post('city')])->render()
        );
    }

    /**
     * @description Returns tab content template with weather forecast data
     * @param Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function getTabContentTemplate(Request $request): JsonResponse
    {
        return new JsonResponse(
          view('partials.tabsContent', ['data' => $request->post('data')])->render()
        );
    }

    /**
     * @description Returns weather forecast data
     * @param Request $request
     * @return JsonResponse
     */
    public function getWeather(Request $request): JsonResponse
    {
        return $this->weatherService->getWeatherByCity(
          $request->post('city'),
          $request->post('apiKey')
        );
    }
}
