@extends('admin.layouts.main')

@section('title','Qeydiyyatlar')

@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.books',$hotel)}}
@endsection
@section('content')
    <div class="section-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="title d-inline-flex">
                    <label class="section-title">Qeydiyyatlar</label>
                </div>
                <div class="actions d-inline-flex float-right">
                    <a href="{{url("/hotels/{$hotel->id}/books/create")}}" class="btn btn-success mr-2">Yeni Qeydiyyat</a>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-hover table-bordered mg-t-30">
                    <thead>
                        <tr>
                            <th>@sortablelink('id',$attributes['id'])</th>
                            <th>@sortablelink('hotel_room_id',$attributes['hotel_room_id'])</th>
                            <th>@sortablelink('departure_date',$attributes['departure_date'])</th>
                            <th>@sortablelink('return_date',$attributes['return_date'])</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="100px">
                                <input type="number"  name="id"  class="grid-search form-control form-control-sm @error('id') is-invalid @enderror" value="{{ request()->input('id') }}" style="width: 50px" min="0">
                            </td>
                            <td>
                                <input type="number"  name="hotel_room_id"  class="grid-search form-control form-control-sm @error('hotel_room_id') is-invalid @enderror" value="{{ request()->input('hotel_room_id') }}" min="0">
                            </td>
                            <td>
                                <input type="string"  name="departure_date"  class="grid-search form-control form-control-sm @error('departure_date') is-invalid @enderror" value="{{ request()->input('departure_date') }}" min="0">
                            </td>
                            <td>
                                <input type="string"  name="return_date"  class="grid-search form-control form-control-sm @error('return_date') is-invalid @enderror" value="{{ request()->input('return_date') }}" min="0">
                            </td>
                            <td></td>
                        </tr>
                        @foreach($models as $model)
                            <tr>
                                <td>{{$model->id}}</td>
                                <td>{{$model->room->number}}</td>
                                <td>{{$model->departure_date}}</td>
                                <td>{{$model->return_date}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{url("/hotels/{$hotel->id}/books/{$model->id}")}}" title="Bax"><i class="fa fa-lg fa-eye"></i></a>
                                        <a class="btn btn-primary" href="{{url("/hotels/{$hotel->id}/books/{$model->id}/edit")}}" title="Yenilə"><i class="fa fa-lg fa-edit"></i></a>
                                        <a class="btn btn-primary" href="{{url("/hotels/{$hotel->id}/books/{$model->id}")}}" title="Sil" data-method="DELETE" data-confirm="Bu elementi silmək istədiyinizə əminsiniz mi?"><i class="fa fa-lg fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$models->links()}}
            </div>
        </div>

    </div>
@endsection
