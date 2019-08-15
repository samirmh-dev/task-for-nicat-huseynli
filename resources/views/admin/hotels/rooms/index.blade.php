@extends('admin.layouts.main')

@section('title','Otaqlar')

@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.rooms',$hotel)}}
@endsection

@section('content')
    <div class="section-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="title d-inline-flex">
                    <label class="section-title">Otaqlar</label>
                </div>
                <div class="actions d-inline-flex float-right">
                    <a href="{{url("/hotels/{$hotel->id}/rooms/create")}}" class="btn btn-success mr-2">Yeni Otaq</a>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-hover table-bordered mg-t-30">
                    <thead>
                    <tr>
                        <th>@sortablelink('id',$attributes['id'])</th>
                        <th>@sortablelink('number',$attributes['number'])</th>
                        <th>@sortablelink('floor',$attributes['floor'])</th>
                        <th>@sortablelink('capacity',$attributes['capacity'])</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td width="100px">
                            <input type="number"  name="id"  class="grid-search form-control form-control-sm @error('id') is-invalid @enderror" value="{{ request()->input('id') }}" style="width: 50px" min="0">
                        </td>
                        <td>
                            <input type="number"  name="number"  class="grid-search form-control form-control-sm @error('number') is-invalid @enderror" value="{{ request()->input('number') }}" min="0">
                        </td>
                        <td>
                            <input type="number"  name="floor"  class="grid-search form-control form-control-sm @error('floor') is-invalid @enderror" value="{{ request()->input('floor') }}" min="0">
                        </td>
                        <td>
                            <input type="number"  name="capacity"  class="grid-search form-control form-control-sm @error('capacity') is-invalid @enderror" value="{{ request()->input('capacity') }}" min="0">
                        </td>
                        <td></td>
                    </tr>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->id}}</td>
                            <td>{{$model->number}}</td>
                            <td>{{$model->floor}}</td>
                            <td>{{$model->capacity}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{url("/hotels/{$hotel->id}/rooms/{$model->id}")}}" title="Bax"><i class="fa fa-lg fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{url("/hotels/{$hotel->id}/rooms/{$model->id}/edit")}}" title="Yenilə"><i class="fa fa-lg fa-edit"></i></a>
                                    <a class="btn btn-primary" href="{{url("/hotels/{$hotel->id}/rooms/{$model->id}")}}" title="Sil" data-method="DELETE" data-confirm="Bu elementi silmək istədiyinizə əminsiniz mi?"><i class="fa fa-lg fa-trash"></i></a>
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
