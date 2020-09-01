<div class="tab-pane fade show" id="{{$data['city']}}" role="tabpanel">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 col-sm-12 col-xs-12">
                <div class="p-4">
                    <div class="d-flex">
                        <h6 class="flex-grow-1">{{$data['city']}}</h6>
                    </div>
                    <div class="d-flex flex-column temp mt-5 mb-3">
                        <h1 class="mb-0 font-weight-bold"> {{$data['temperature']}}° C </h1> <span class="small grey">{{$data['state']}}</span>
                    </div>
                    <div class="d-flex">
                        <div class="temp-details flex-grow-1">
                            <p class="my-1"> Wind speed: <span> {{$data['wind_speed']}} km/h </span> </p>
                            <p class="my-1"> Humidity: </i> <span> {{$data['humidity']}} % </span> </p>
                            <p class="my-1"> Feels like: <span> {{$data['feels_like']}}° C </span> </p>
                        </div>
                        <div> <img src="http://openweathermap.org/img/w/{{$data['icon']}}.png" width="100px"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>