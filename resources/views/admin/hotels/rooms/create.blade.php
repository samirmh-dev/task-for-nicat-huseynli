@extends('admin.layouts.main')

@section('title','Yeni Otaq')
@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.rooms.new',$hotel)}}
@endsection


@section('content')
    <div class="section-wrapper">
        <label class="section-title">Yeni Otaq</label>
            <form class="form-horizontal" method="POST" action="{{url("/hotels/{$hotel->id}/rooms")}}">
                @csrf
                @include('admin.hotels.rooms._form',['request' => $request,'hotel' => $hotel ])
            </form>
    </div>
@endsection
