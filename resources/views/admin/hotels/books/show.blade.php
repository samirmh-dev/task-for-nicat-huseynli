@extends('admin.layouts.main')

@section('title','Otaq  №: '.$model->number)
@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.rooms.show',$hotel, $model)}}
@endsection


@section('content')
    <?php  $attributes = (new \App\Http\Requests\HotelRoomsRequest())->attributes(); ?>
    <div class="section-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="title d-inline-flex">
                    <label class="section-title">{{'Otaq  №: '.$model->number}}</label>
                </div>
                <div class="actions d-inline-flex float-right">
                    <a href="{{url("/hotels/{$hotel->id}/rooms/{$model->id}/edit")}}" class="btn btn-primary mr-2">Yenilə</a>
                    <a href="{{url("/hotels/{$hotel->id}/rooms/{$model->id}")}}" class="btn btn-danger" data-method="DELETE" data-confirm="Bu elementi silmək istədiyinizə əminsiniz mi?">Sil</a>
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
                        <th>{{$attributes['hotel_id']}}</th>
                        <td>{{$hotel->name}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['number']}}</th>
                        <td>{{$model->number}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['floor']}}</th>
                        <td>{{$model->floor}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['capacity']}}</th>
                        <td>{{$model->capacity}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['created_at']}}</th>
                        <td>{{$model->created_at}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['updated_at']}}</th>
                        <td>{{$model->updated_at}}</td>
                    </tr>



                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
