<?php
$attributes = $request->attributes();
?>

<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['hotel_room_id']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <select name="hotel_room_id" class="form-control @error('hotel_room_id') parsley-error @enderror ">
            <option>  Otaq seçin ... </option>
            @foreach($hotel->roomNumbers as $id => $number)
                <option value="{{$id}}" @if(old('hotel_room_id', $model->hotel_room_id) == $id) selected @endif>{{$number}}</option>
            @endforeach
        </select>
        @error('hotel_room_id')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>

<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['departure_date']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="text" id="departure_date" name="departure_date" class="form-control @error('departure_date') parsley-error @enderror " placeholder="{{$attributes['departure_date']}} " value="{{ old('departure_date', $model->departure_date)  }}"  required autocomplete="off" style="margin-top: -12px">
        @error('departure_date')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>


<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['return_date']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="text" id="return_date" name="return_date" class="form-control @error('return_date') parsley-error @enderror " placeholder="{{$attributes['return_date']}} " value="{{ old('return_date', $model->return_date)  }}"  required autocomplete="off" style="margin-top: -12px">
        @error('return_date')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>


<div class="form-group row">
    <div class="col-md-9 offset-3">
        <button type="submit" id="submit-button" class="btn btn-primary pd-x-20">Yadda saxla</button>
    </div>
</div>


@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@stop
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    {{--<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest($request) !!}--}}
    <script>
        $('#return_date, #departure_date').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
        });
    </script>

@endsection
