@extends('frontend.layouts.app')
@section('content')

    <!-- Page Title
    ============================================= -->
    <section id="page-title" class="page-title-center page-title-parallax page-title-dark" style="background-image: url({{asset('/theme/images/hotels/page-title.jpg')}}); background-position: center center; padding: 100px 0;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">

        <div class="container clearfix">
            <h1>{{$models->total()}} Hotel Found</h1>
            <span><i class="icon-map-marker"></i> {{request()->input('h_address')}}</span>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin col_last clearfix" style="width: 100%">

                    <!-- Posts
                    ============================================= -->
                    <div id="posts" class="small-thumbs">
                        @if($models->total() == 0)
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="">0 Hotel found</h1>
                                    <a href="{{url('/')}}">Back to Main page</a>
                                </div>
                            </div>
                        @endif
                        @foreach($models as $model)
                            <?php $imgSize = sizeof($model->images); ?>
                            <div class="entry clearfix">
                                    <div class="row clearfix">
                                        <div class="col-lg-4">
                                            @if($imgSize > 1)
                                            <div class="fslider" data-pagi="false" data-lightbox="gallery">
                                                <div class="flexslider">
                                                    <div class="slider-wrap">
                                                        @foreach($model->images as $image)
                                                        <div class="slide"><a href="{{$image->url}}" data-lightbox="gallery-item"><img class="image_fade" src="{{$image->url}}" alt="Standard Post with Gallery"></a></div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @elseif($imgSize == 1)
                                                <a href="{{$model->images[0]->url}}" data-lightbox="image"><img class="image_fade" src="{{$model->images[0]->url}}" alt="Bronze Time Hotel"></a>
                                            @endif
                                        </div>
                                        <div class="bottommargin-sm d-block d-md-block d-lg-none"></div>
                                        <div class="col-lg-6 col-md-8">
                                            <div class="entry-c">
                                                <div class="entry-title">
                                                    <h2><a href="#">{{$model->name}}</a></h2>
                                                </div>
                                                <ul class="entry-meta clearfix">
                                                    <li>{!! str_repeat('<i class="icon-star3 color"></i>',$model->stars) !!}{!! str_repeat('<i class="icon-star2 color"></i>', 5 - $model->stars) !!}</li>
                                                    <li><i class="icon-line-map"></i><a href="#"> {{ $model->address }}</a></li>
                                                    <li><i class="icon-map-marker2"></i> <a href="https://maps.google.com/maps?q={{urlencode($model->address)}}" data-lightbox="iframe">View map</a></li>
                                                </ul>
                                                <div class="entry-content">
                                                    <div class="clearfix" style="margin-bottom: 10px;">
                                                        {!! $model->servicesWithIcon !!}
                                                    </div>
                                                    <p class="nobottommargin">{{$model->description}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 center">
                                            <div class="hotel-price">
                                                <i class="icon-dollar"></i>{{number_format($model->price,2)}}
                                            </div>
                                            <small><em>Price per night*</em></small><br>
                                            <a href="#"class="button button-rounded topmargin-sm">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>

                    {{ $models->links() }}

                </div>

            </div>

        </div>

    </section><!-- #content end -->


<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

@endsection

