<?php
$attributes = $request->attributes();
$images = [];
foreach ($model->images as $image){
    $images[$image['img']] = $image->url;
}
?>
<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['name']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="text" name="name" class="form-control @error('name') parsley-error @enderror " placeholder="{{$attributes['name']}} " value="{{ old('name', $model->name)  }}"  required style="margin-top: -12px">
        @error('name')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>


</div>

<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['stars']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="number" name="stars" class="form-control @error('stars') parsley-error @enderror " min="0" max="5" placeholder="{{$attributes['stars']}} " value="{{ old('stars', $model->stars)  }}"  required style="margin-top: -12px">
        @error('stars')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>


<div class="form-group row mg-t-30">
    <label class="col-md-3">{{$attributes['address']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <input type="text" id="address" name="address" class="form-control @error('address') parsley-error @enderror " placeholder="{{$attributes['address']}} " value="{{ old('address', $model->address)  }}"  required autocomplete="off" style="margin-top: -12px">
        @error('address')
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
    <label class="col-md-3">{{$attributes['description']}}: <span class="tx-danger">*</span></label>
    <div class="col-md-9">
        <textarea name="description" class="form-control @error('description') parsley-error @enderror " placeholder="{{$attributes['description']}} "  required style="margin-top: -12px">{{ old('description', $model->description)  }}</textarea>
        @error('description')
        <ul class="parsley-errors-list filled">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
</div>

<div class="form-group row mg-t-30" >
    <label class="col-md-3">{{$attributes['description']}}: <span class="tx-danger">*</span></label>
    <div class="dropzone col-md-8 mg-l-15" id="dropzone"> </div>
    @error('files')
    <ul class="parsley-errors-list filled col-md-8 offset-3 pd-l-15">
        <li class="parsley-required">{{ $message }}</li>
    </ul>
    @enderror
</div>



<div class="form-group row">
    <div class="col-md-9 offset-3">
        <button type="submit" id="submit-button" class="btn btn-primary pd-x-20">Yadda saxla</button>
    </div>
</div>


@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
@stop
@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    {!! JsValidator::formRequest($request) !!}
    <script type="text/javascript">
        const files = {};
        const defaultFiles = JSON.parse('{!! json_encode($images) !!}')
        Dropzone.options.dropzone =
            {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                //type: "POST",
                url: '{{ url('/hotels/upload-image/') }}',
                maxFilesize: 10,
                //uploadMultiple:true,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time+file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                //autoProcessQueue: false,
                init: function(){
                    var thisDropzone = this;
                    for(let key in defaultFiles){
                        var mockFile = { name: key, size: 12345, type: 'image/jpeg',upload:{filename:key} };
                        thisDropzone.emit("addedfile", mockFile);
                        thisDropzone.emit("success", mockFile, key);
                        thisDropzone.emit("thumbnail", mockFile, defaultFiles[key])
                        this.on("maxfilesexceeded", function(file){
                             this.removeFile(file);
                             alert("No more files please!");
                         });
                    }
                },
                removedfile: function(file)
                {
                    var name = files[file.upload.filename];
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ url("hotels/remove-image") }}',
                        data: {filename: name,id:'{{ $model->id }}'},
                        success: function (data){
                            delete files[file.upload.filename];
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function(file, response)
                {
                    files[file.upload.filename] = response;

                },
                error: function(file, response)
                {
                    return false;
                }
            };


            $('#hotels-form').submit(function (e) {
                e.preventDefault();
                for (let key in files){
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'files[]';
                    input.value = files[key];
                    this.appendChild(input);
                }
                this.submit();
            })

    </script>





@endsection

