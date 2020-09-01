/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$( document ).ready(function() {

    /**
     * Fetches data on submit
     */
    $('#weather-form').on('submit', function (event) {
        event.preventDefault();

        let city = $('#city').val();
        let tab = $('#' + city + '-tab');

        if (tab.length === 0) {
            fetchWeather(city);
        }

        tab.click();
    });

    /**
     * @description Appends new tabs
     * @param data
     */
    const appendTabItem = data => {
        $.ajax({
            url: '/api/partials/tabs',
            type: 'POST',
            data: {city: data.city},
            success: function (template) {
                $('#weatherTab').append(template);
                appendTabContent(data);
            }
        });
    }

    /**
     * @description Appends tab content
     * @param data
     */
    const appendTabContent = data => {
        $.ajax({
            url: '/api/partials/tabs-content',
            type: 'POST',
            data: {data: data},
            success: function (template) {
                $('#weatherTabContent').append(template);
                $('#' + data.city + '-tab').click();
            }
        });
    }

    /**
     * @description Fetches weather data from backend
     * @param city
     */
    const fetchWeather = city => {

        let apiKey = $('#api-key').val();

        $.ajax({
            url: '/api/weather',
            type: 'POST',
            data: {
                city: city,
                apiKey: apiKey
            },
            success: function (response) {
                appendTabItem(response);
            },
            error: function (error) {
                console.log(error);
                getWarning(error.message);
            }
        });
    }

    /**
     * @description TODO returns warning
     * @param message
     */
    const getWarning = message => {
        $.ajax({
            url: '/api/messages/warning',
            type: 'POST',
            data: {message: message},
            success: function (template) {
                $('#messages').append(template);
            }
        });
    }

});