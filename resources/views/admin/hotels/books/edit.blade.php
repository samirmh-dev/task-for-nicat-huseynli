@extends('admin.layouts.main')

@section('title','Yenilə: '.$model->id)
@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.books.new',$hotel)}}
@endsection


@section('content')
    <div class="section-wrapper">
        <label class="section-title">{{'Yenilə: '.$model->id}}</label>
        <form class="form-horizontal" method="POST" action="{{url("/hotels/{$hotel->id}/books/{$model->id}")}}">
            @csrf
            @method('PATCH')
            @include('admin.hotels.books._form',['request' => $request])
        </form>
    </div>

@endsection
