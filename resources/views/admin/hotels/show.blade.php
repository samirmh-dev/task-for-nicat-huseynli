@extends('admin.layouts.main')

@section('title','Otel: '.$model->name)
@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.show',$model)}}
@endsection


@section('content')
    <?php  $attributes = (new \App\Http\Requests\HotelsRequest())->attributes(); ?>
    <div class="section-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="title d-inline-flex">
                    <label class="section-title">{{'Otel: '.$model->name}}</label>
                </div>
                <div class="actions d-inline-flex float-right">
                    <a href="{{url("/hotels/{$model->id}/edit")}}" class="btn btn-primary mr-2">Yenilə</a>
                    <a href="{{url("/hotels/{$model->id}")}}" class="btn btn-danger" data-method="DELETE" data-confirm="Bu elementi silmək istədiyinizə əminsiniz mi?">Sil</a>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-striped mg-t-30">
                    <thead>
                    <tbody>

                    <tr>
                        <th>{{$attributes['id']}}</th>
                        <td>{{$model->id}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['name']}}</th>
                        <td>{{$model->name}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['stars']}}</th>
                        <td>{{$model->stars}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['address']}}</th>
                        <td>{{$model->address}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['price']}}</th>
                        <td>{{$model->price}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['description']}}</th>
                        <td>{{$model->description}}</td>
                    </tr>
                    <tr>
                        <th  >{{$attributes['files']}}</th>
                        <td >
                            @foreach($model->images as $img)
                                <a href="{{$img->url}}" target="_blank"> <img src="{{$img->url}}" width="200" height="200" class="img-thumbnail"></a>
                            @endforeach
                        </td>

                    </tr>


                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
