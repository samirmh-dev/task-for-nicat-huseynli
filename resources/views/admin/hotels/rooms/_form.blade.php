<?php
$attributes = $request->attributes();
?>

<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['number']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="number" name="number" class="form-control @error('number') parsley-error @enderror " min="1" placeholder="{{$attributes['number']}} " value="{{ old('number', $model->number)  }}"  required style="margin-top: -12px">
        @error('number')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>

<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['floor']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="number" name="floor" class="form-control @error('floor') parsley-error @enderror " min="0" placeholder="{{$attributes['floor']}} " value="{{ old('floor', $model->floor)  }}"  required style="margin-top: -12px">
        @error('floor')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>



<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['capacity']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="number" name="capacity" class="form-control @error('capacity') parsley-error @enderror " min="1" placeholder="{{$attributes['capacity']}} " value="{{ old('capacity', $model->capacity)  }}"  required style="margin-top: -12px">
        @error('capacity')
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


@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest($request) !!}

@endsection
