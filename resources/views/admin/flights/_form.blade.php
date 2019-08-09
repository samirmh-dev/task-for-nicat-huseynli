<?php
$attributes = $request->attributes();
?>
<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['company_name']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="text" name="company_name" class="form-control @error('company_name') parsley-error @enderror " placeholder="{{$attributes['company_name']}} " value="{{ old('company_name', $model->company_name)  }}"  required style="margin-top: -12px">
        @error('company_name')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>


</div>

<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['type']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="text" name="type" class="form-control @error('type') parsley-error @enderror " placeholder="{{$attributes['type']}} " value="{{ old('type', $model->type)  }}"  required style="margin-top: -12px">
        @error('type')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>


<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['finish_date']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="text" id="finish_date" name="finish_date" class="form-control @error('finish_date') parsley-error @enderror " placeholder="{{$attributes['finish_date']}} " value="{{ old('finish_date', $model->finish_date)  }}"  required autocomplete="off" style="margin-top: -12px">
        @error('finish_date')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>


<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['price']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="number" step="0.01" name="price" class="form-control @error('price') parsley-error @enderror " placeholder="{{$attributes['price']}} " value="{{ old('price', $model->price)  }}"  required style="margin-top: -12px">
        @error('price')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>


<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['destination']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="text" name="destination" class="form-control @error('destination') parsley-error @enderror " placeholder="{{$attributes['destination']}} " value="{{ old('destination', $model->destination)  }}"  required style="margin-top: -12px">
        @error('destination')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>


<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['start_location']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="text" name="start_location" class="form-control @error('start_location') parsley-error @enderror " placeholder="{{$attributes['start_location']}} " value="{{ old('start_location', $model->start_location)  }}"  required style="margin-top: -12px">
        @error('start_location')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>


<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['count_passenger']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="number" name="count_passenger" class="form-control @error('count_passenger') parsley-error @enderror " placeholder="{{$attributes['count_passenger']}} " value="{{ old('count_passenger', $model->count_passenger)  }}"  required style="margin-top: -12px">
        @error('count_passenger')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>


<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['description']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <textarea name="description" class="form-control @error('description') parsley-error @enderror " placeholder="{{$attributes['description']}} " value="{{ old('description', $model->description)  }}"  required style="margin-top: -12px"></textarea>
        @error('description')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>


<div class="form-group row">
    <div class="col-md-9 offset-3">
        <button type="submit" class="btn btn-primary pd-x-20">Yadda saxla</button>
    </div>
</div>


@section('stylesheets')
{{--
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
--}}
<link rel="stylesheet" href="{{asset('lib/datetimepicker/bootstrap-datetimepicker.css')}}">
@stop
@section('scripts')
   {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    --}}

   <script src="{{asset('lib/datetimepicker/bootstrap-datetimepicker.min.js?t=20130302')}}"></script>
   <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest($request) !!}
    <script>
        $('#finish_date').datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: true,
        });
    </script>

@endsection
