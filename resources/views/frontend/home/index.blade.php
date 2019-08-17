
@extends('frontend.layouts.app')

@section('title','Travel')

@section('content')
    <section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix">

        <div class="slider-parallax-inner">

            <div class="fslider" data-speed="3000" data-pause="7500" data-animation="fade" data-arrows="false" data-pagi="false" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background-color: #333;">
                <div class="flexslider" style="height: 100% !important;">
                    <div class="slider-wrap" style="height: inherit;">
                        <div class="slide" style="background: url('/theme/images/slider/1.jpg') center center; background-size: cover; height: 100% !important;"></div>
                        <div class="slide" style="background: url('/theme/images/slider/2.jpg') center center; background-size: cover; height: 100% !important;"></div>
                        <div class="slide" style="background: url('/theme/images/slider/3.jpg') center center; background-size: cover; height: 100% !important;"></div>
                    </div>
                </div>
            </div>

            <div id="travel-slider-overlay">
                <div class="vertical-middle">

                    <div class="container clearfix">

                        <div class="tabs travel-organiser-tabs clearfix">

                            <ul class="tab-nav clearfix">
                                <li><a href="#tab-flights"><i class="icon-plane"></i><span class="d-none d-md-inline-block">Flights</span></a></li>
                                <li><a href="#tab-hotels"><i class="icon-building"></i><span class="d-none d-md-inline-block">Hotels</span></a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tab-flights">
                                    <div class="heading-block nobottomborder bottommargin-sm clearfix">
                                        <h4 class="fleft">Book your Flights</h4>
                                        <div class="clear"></div>
                                    </div>
                                    <form action="{{url('/search/flight')}}" method="get" id="flight-form" class="nobottommargin">
                                        <div class="row">
                                            <div class="col-md-6 col-12 bottommargin-sm">
                                                <label for="">From</label>
                                                <input type="text" name="start_location" value="" class="sm-form-control" placeholder="Eg. Melbourne, Australia">
                                                @error('start_location')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-12 bottommargin-sm">
                                                <label for="">To</label>
                                                <input type="text" name="destination" value="" class="sm-form-control" placeholder="Eg. New York, United States">
                                                @error('destination')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="clear"></div>
                                            <div class="input-daterange travel-date-group col-md-9 bottommargin-sm">
                                                <div class="row">
                                                    <div class="col-md-6 col-6">
                                                        <label for="">Departure</label>
                                                        <input type="text" name="departure_date" value="" class="sm-form-control tleft dpicker"  placeholder="DD/MM/YYYY" autocomplete="off">
                                                        @error('departure_date')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <label for="">Return</label>
                                                        <input type="text" name="return_date" value="" class="sm-form-control tleft dpicker" placeholder="DD/MM/YYYY" autocomplete="off">
                                                        @error('return_date')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 bottommargin-sm">
                                                <label for="">Adults</label>
                                                <input type="number" name="count_passenger" min="1" max="10" value="" class="sm-form-control" placeholder="2">
                                                @error('count_passenger')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <button class="button button-3d nomargin rightmargin-sm">Search Flights</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-content clearfix" id="tab-hotels">
                                    <div class="heading-block nobottomborder bottommargin-sm clearfix">
                                        <h4 class="fleft">Book your Hotels</h4>
                                        <div class="clear"></div>
                                    </div>
                                    <form action="{{url('/search/hotel')}}" id="hotel-form" class="nobottommargin">
                                        <div class="row">
                                            <div class="col-md-12 bottommargin-sm">
                                                <label for="">City</label>
                                                <input type="text" name="h_address" value="" class="sm-form-control" placeholder="Eg. Melbourne, Australia">
                                                @error('h_address')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="input-daterange travel-date-group col-md-9 bottommargin-sm">
                                                <div class="row">
                                                    <div class="col-md-6 col-6">
                                                        <label for="">Departure</label>
                                                        <input type="text" name="h_departure_date" value="" class="sm-form-control tleft dpicker" placeholder="DD/MM/YYYY" autocomplete="off">
                                                        @error('h_departure_date')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <label for="">Return</label>
                                                        <input type="text" name="h_return_date" value="" class="sm-form-control tleft dpicker" placeholder="DD/MM/YYYY" autocomplete="off">
                                                        @error('h_return_date')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 bottommargin-sm">
                                                <label for="">Rooms</label>
                                                <input type="number" name="h_capacity" min="1" max="10" value="" class="sm-form-control"placeholder="2">
                                                @error('h_capacity')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <button class="button button-3d nomargin rightmargin-sm">Search Hotels</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest(\App\Http\Requests\FlightSearchRequest::class, '#flight-form') !!}
    {!! JsValidator::formRequest(\App\Http\Requests\HotelSearchRequest::class, '#hotel-form') !!}

    <script>
        $('.dpicker').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            startDate: "today",
        });
    </script>
@endsection
