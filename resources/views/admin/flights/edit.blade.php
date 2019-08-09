@extends('admin.layouts.main')

@section('title','Yenilə: '.$model->id)
@section('breadcrumbs')
    {{Breadcrumbs::render('flights.edit',$model)}}
@endsection


@section('content')
    <div class="section-wrapper">
        <label class="section-title">{{'Yenilə: '.$model->id}}</label>
        <form class="form-horizontal" method="POST" action="{{url('/flights/'.$model->id)}}">
            @csrf
            @method('PATCH')
            @include('admin.flights._form',['request' => $request])
        </form>
    </div>
@endsection
