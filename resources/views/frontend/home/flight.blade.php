@extends('frontend.layouts.app')

@section('title','Search flight')
@section('content')

        <!-- Page Title
        ============================================= -->
        <section id="page-title" class="page-title-center page-title-parallax page-title-dark" style="background-image: url({{asset('/theme/images/hotels/page-title.jpg')}}); background-position: center center; padding: 100px 0;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">

            <div class="container clearfix">
                <h1>{{$models->total()}} Flights Found</h1>
                <span>{{$request->input('start_location')}} &nbsp;&nbsp;<i class="icon-map-marker"></i>&nbsp;&nbsp; {{$request->input('destination')}}</span>
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
                                        <h1 class="">0 flight found</h1>
                                        <a href="{{url('/')}}">Back to Main page</a>
                                    </div>
                                </div>
                            @endif


                            @foreach($models as $model)
                            <div class="entry clearfix">
                                <div class="row clearfix">
                                    <div class="bottommargin-sm d-block d-md-block d-lg-none"></div>
                                    <div class="col-lg-10 col-md-8">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h2><a href="blog-single.html">{{$model->company_name}}</a></h2>
                                            </div>
                                            <ul class="entry-meta clearfix">
                                                <li><i class="icon-plane"></i><a href="#"> {{$model->type}}</a></li>
                                                <li><i class="icon-time"></i><a href="#"> Estimate arrival: {{$model->finish_date}}</a></li>
                                                <li><a href="#" class="pr-1"> {{$model->start_location}}</a><i class="icon-arrow-right"></i><a href="#"> {{$model->destination}}</a></li>
                                            </ul>
                                            <div class="entry-content">
                                                <p class="nobottommargin">
                                                    {{$model->description}}

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 center">
                                        <div class="hotel-price">
                                            <i class="icon-dollar"></i>{{number_format($model->price,2)}}
                                        </div>
                                        <small><em>Price per person*</em></small><br>
                                        <a href="#"class="button button-rounded topmargin-sm">Buy ticket</a>
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

@section('scripts')
    <script>
        $(function() {
            $('.travel-date-group').datepicker({
                autoclose: true,
                startDate: "today"
            });
        });
    </script>
@stop
