@extends('admin.layouts.main')

@section('title','Uçuş: '.$model->id)
@section('breadcrumbs')
    {{Breadcrumbs::render('flights.show',$model)}}
@endsection


@section('content')
    <?php  $attributes = (new \App\Http\Requests\FlightRequest())->attributes(); ?>
    <div class="section-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="title d-inline-flex">
                    <label class="section-title">{{'Uçuş: '.$model->id}}</label>
                </div>
                <div class="actions d-inline-flex float-right">
                    <a href="{{url("/flights/{$model->id}/edit")}}" class="btn btn-primary mr-2">Yenilə</a>
                    <a href="{{url("/flights/{$model->id}")}}" class="btn btn-danger" data-method="DELETE" data-confirm="Bu elementi silmək istədiyinizə əminsiniz mi?">Sil</a>
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
                        <th>{{$attributes['company_name']}}</th>
                        <td>{{$model->company_name}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['type']}}</th>
                        <td>{{$model->type}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['departure_date']}}</th>
                        <td>{{$model->departure_date}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['finish_date']}}</th>
                        <td>{{$model->finish_date}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['start_location']}}</th>
                        <td>{{$model->start_location}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['destination']}}</th>
                        <td>{{$model->destination}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['price']}}</th>
                        <td>{{$model->price}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['count_passenger']}}</th>
                        <td>{{$model->count_passenger}}</td>
                    </tr>

                    <tr>
                        <th>{{$attributes['description']}}</th>
                        <td>{{$model->description}}</td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
