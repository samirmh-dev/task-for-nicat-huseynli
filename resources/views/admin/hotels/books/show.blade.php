@extends('admin.layouts.main')

@section('title','Qeydiyyat  №: '.$model->number)
@section('breadcrumbs')
    {{Breadcrumbs::render('hotels.books.show',$hotel, $model)}}
@endsection


@section('content')
    <?php  $attributes = (new \App\Http\Requests\HotelRoomBookRequest())->attributes(); ?>
    <div class="section-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="title d-inline-flex">
                    <label class="section-title">{{'Qeydiyyat  №: '.$model->id}}</label>
                </div>
                <div class="actions d-inline-flex float-right">
                    <a href="{{url("/hotels/{$hotel->id}/books/{$model->id}/edit")}}" class="btn btn-primary mr-2">Yenilə</a>
                    <a href="{{url("/hotels/{$hotel->id}/books/{$model->id}")}}" class="btn btn-danger" data-method="DELETE" data-confirm="Bu elementi silmək istədiyinizə əminsiniz mi?">Sil</a>
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
                        <th>{{$attributes['hotel']}}</th>
                        <td>{{$hotel->name}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['hotel_room_id']}}</th>
                        <td>{{$model->room->number}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['departure_date']}}</th>
                        <td>{{$model->departure_date}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['return_date']}}</th>
                        <td>{{$model->return_date}}</td>
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

