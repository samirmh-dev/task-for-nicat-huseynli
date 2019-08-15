@extends('admin.layouts.main')

@section('title','Yenilə: '.$model->name)
@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.edit',$model)}}
@endsection


@section('content')
    <div class="section-wrapper">
        <label class="section-title">{{'Yenilə: '.$model->name}}</label>
        <form class="form-horizontal" id="hotels-form" method="POST" action="{{url('/hotels/'.$model->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('admin.hotels._form',['request' => $request])
        </form>
    </div>

@endsection
