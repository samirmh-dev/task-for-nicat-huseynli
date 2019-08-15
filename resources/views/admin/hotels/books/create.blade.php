@extends('admin.layouts.main')

@section('title','Yeni Qeydiyyat')
@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.books.new',$hotel)}}
@endsection


@section('content')
    <div class="section-wrapper">
        <label class="section-title">Yeni Qeydiyyat</label>
            <form class="form-horizontal" method="POST" action="{{url("/hotels/{$hotel->id}/books")}}">
                @csrf
                @include('admin.hotels.books._form',['request' => $request,'hotel' => $hotel ])
            </form>
    </div>
@endsection
