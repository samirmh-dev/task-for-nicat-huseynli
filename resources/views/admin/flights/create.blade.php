@extends('admin.layouts.main')

@section('title','Yeni Uçuş')
@section('breadcrumbs')
    {{Breadcrumbs::render('flights.new')}}
@endsection


@section('content')
    <div class="section-wrapper">
        <label class="section-title">Yeni uçuş</label>
            <form class="form-horizontal" method="POST" action="{{url('/flights')}}">
                @csrf
                @include('admin.flights._form',['request' => $request])
            </form>
    </div>
@endsection
