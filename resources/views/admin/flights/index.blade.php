@extends('admin.layouts.main')

@section('title','Uçuşlar')

@section('breadcrumbs')
    {{Breadcrumbs::render('flights')}}
@endsection

@section('content')
    <div class="section-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="title d-inline-flex">
                    <label class="section-title">Uçuşlar</label>
                </div>
                <div class="actions d-inline-flex float-right">
                    <a href="{{url("/flights/create")}}" class="btn btn-success mr-2">Yeni Uçuş</a>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-hover table-bordered mg-t-30">
                    <thead>
                    <tr>
                        <th>@sortablelink('id',$attributes['id'])</th>
                        <th>@sortablelink('company_name',$attributes['company_name'])</th>
                        <th>@sortablelink('type',$attributes['type'])</th>
                        <th>@sortablelink('finish_date',$attributes['finish_date'])</th>
                        <th>@sortablelink('price',$attributes['price'])</th>
                        <th>@sortablelink('destination',$attributes['destination'])</th>
                        <th>@sortablelink('start_location',$attributes['start_location'])</th>
                        <th>@sortablelink('count_passenger',$attributes['count_passenger'])</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td width="100px">
                            <input type="number"  name="id"  class="grid-search form-control form-control-sm @error('id') is-invalid @enderror" value="{{ request()->input('id') }}" style="width: 50px">
                        </td>
                        <td>
                            <input type="search" name="company_name"  class="grid-search form-control form-control-sm @error('company_name') is-invalid @enderror" value="{{ request()->input('company_name') }}">
                        </td>
                        <td>
                            <input type="search" name="type"  class="grid-search form-control form-control-sm @error('type') is-invalid @enderror" value="{{ request()->input('type') }}">
                        </td>
                        <td>
                            <input type="search" name="finish_date"  class="grid-search form-control form-control-sm @error('finish_date') is-invalid @enderror" value="{{ request()->input('finish_date') }}">
                        </td>
                        <td>
                            <input type="search" name="price"  class="grid-search form-control form-control-sm @error('price') is-invalid @enderror" value="{{ request()->input('price') }}">
                        </td>
                        <td>
                            <input type="search" name="destination"  class="grid-search form-control form-control-sm @error('destination') is-invalid @enderror" value="{{ request()->input('destination') }}">
                        </td>
                        <td>
                            <input type="search" name="start_location"  class="grid-search form-control form-control-sm @error('start_location') is-invalid @enderror" value="{{ request()->input('start_location') }}">
                        </td>
                        <td>
                            <input type="search" name="count_passenger"  class="grid-search form-control form-control-sm @error('count_passenger') is-invalid @enderror" value="{{ request()->input('count_passenger') }}">
                        </td>

                        <td></td>
                    </tr>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->id}}</td>
                            <td>{{$model->company_name}}</td>
                            <td>{{$model->type}}</td>
                            <td>{{$model->finish_date}}</td>
                            <td>{{$model->price}}</td>
                            <td>{{$model->destination}}</td>
                            <td>{{$model->start_location}}</td>
                            <td>{{$model->count_passenger}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{url("/flights/{$model->id}")}}" title="Bax"><i class="fa fa-lg fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{url("/flights/{$model->id}/edit")}}" title="Yenilə"><i class="fa fa-lg fa-edit"></i></a>
                                    <a class="btn btn-primary" href="{{url("/flights/{$model->id}")}}" title="Sil" data-method="DELETE" data-confirm="Bu elementi silmək istədiyinizə əminsiniz mi?"><i class="fa fa-lg fa-trash"></i></a>
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
