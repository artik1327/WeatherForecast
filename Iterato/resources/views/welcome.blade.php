<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iterato Weather</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>

    {{--    Form content--}}
    <section class="jumbotron">
        <div class="container">
            <form id="weather-form" class="form-inline justify-content-center">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="api-key" placeholder="API key">
                </div>
                <div class="input-group mb-3">
                    <input id="city" type="text" class="form-control" placeholder="City">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{--    Messages--}}
    <section id="messages"></section>

    {{--    Tabs content--}}
    <section class="container">
        <h3 class="text-center">Welcome to Iterato weather</h3>
        <ul class="nav nav-tabs" id="weatherTab" role="tablist"></ul>
        <div class="tab-content" id="weatherTabContent"></div>
    </section>
    </body>
</html>
