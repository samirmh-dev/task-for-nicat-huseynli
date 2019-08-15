@extends('admin.layouts.main')

@section('title','Yenilə: '.$model->number)
@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.rooms.new',$hotel)}}
@endsection


@section('content')
    <div class="section-wrapper">
        <label class="section-title">{{'Yenilə: '.$model->number}}</label>
        <form class="form-horizontal" method="POST" action="{{url("/hotels/{$hotel->id}/rooms/{$model->id}")}}">
            @csrf
            @method('PATCH')
            @include('admin.hotels.rooms._form',['request' => $request])
        </form>
    </div>

@endsection
