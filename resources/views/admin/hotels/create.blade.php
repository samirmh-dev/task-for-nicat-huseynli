@extends('admin.layouts.main')

@section('title','Yeni Otel')
@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.new')}}
@endsection


@section('content')
    <div class="section-wrapper">
        <label class="section-title">Yeni otel</label>
            <form class="form-horizontal" id="hotels-form" method="POST" action="{{url('/hotels')}}" enctype="multipart/form-data">
                @csrf
                @include('admin.hotels._form',['request' => $request])
            </form>
    </div>
@endsection
