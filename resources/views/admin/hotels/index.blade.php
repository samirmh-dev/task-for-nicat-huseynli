@extends('admin.layouts.main')

@section('title','Otellər')

@section('breadcrumbs')
    {{Breadcrumbs::render('hotels')}}
@endsection

@section('content')
    <div class="section-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="title d-inline-flex">
                    <label class="section-title">Otellər</label>
                </div>
                <div class="actions d-inline-flex float-right">
                    <a href="{{url("/hotels/create")}}" class="btn btn-success mr-2">Yeni Otel</a>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-hover table-bordered mg-t-30">
                    <thead>
                    <tr>
                        <th>@sortablelink('id',$attributes['id'])</th>
                        <th>@sortablelink('name',$attributes['name'])</th>
                        <th>@sortablelink('stars',$attributes['stars'])</th>
                        <th>@sortablelink('address',$attributes['address'])</th>
                        <th>@sortablelink('price',$attributes['price'])</th>
                        <th>@sortablelink('description',$attributes['description'])</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td width="100px">
                            <input type="number"  name="id"  class="grid-search form-control form-control-sm @error('id') is-invalid @enderror" value="{{ request()->input('id') }}" style="width: 50px">
                        </td>
                        <td>
                            <input type="search" name="name"  class="grid-search form-control form-control-sm @error('name') is-invalid @enderror" value="{{ request()->input('name') }}">
                        </td>
                        <td>
                            <input type="search" name="stars"  class="grid-search form-control form-control-sm @error('stars') is-invalid @enderror" value="{{ request()->input('stars') }}">
                        </td>
                        <td>
                            <input type="search" name="address"  class="grid-search form-control form-control-sm @error('address') is-invalid @enderror" value="{{ request()->input('address') }}">
                        </td>
                        <td>
                            <input type="search" name="price"  class="grid-search form-control form-control-sm @error('price') is-invalid @enderror" value="{{ request()->input('price') }}">
                        </td>
                        <td>
                            <input type="search" name="description"  class="grid-search form-control form-control-sm @error('description') is-invalid @enderror" value="{{ request()->input('description') }}">
                        </td>
                        <td></td>
                    </tr>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->id}}</td>
                            <td>{{$model->name}}</td>
                            <td>{{$model->stars}}</td>
                            <td>{{$model->address}}</td>
                            <td>{{$model->price}}</td>
                            <td>{{$model->description}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{url("/hotels/{$model->id}")}}" title="Bax"><i class="fa fa-lg fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{url("/hotels/{$model->id}/edit")}}" title="Yenilə"><i class="fa fa-lg fa-edit"></i></a>
                                    <a class="btn btn-primary" href="{{url("/hotels/{$model->id}/rooms")}}" title="Yenilə"><i class="fa fa-lg fa-trello"></i></a>
                                    <a class="btn btn-primary" href="{{url("/hotels/{$model->id}")}}" title="Sil" data-method="DELETE" data-confirm="Bu elementi silmək istədiyinizə əminsiniz mi?"><i class="fa fa-lg fa-trash"></i></a>
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
