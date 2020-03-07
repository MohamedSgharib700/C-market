@extends('admin.layout')

@section('content')
    <div class="app-content">
        <section class="section">
            <!--page-header open-->
            <div class="row">
                <div class="col-6">
                    <div class="page-header">
                        <h4 class="page-title">{{ trans('new_image') }}</h4>
                    </div>
                </div>
            </div>
            <!--page-header closed-->
            <div class="section-body">
                <!--row open-->
                <div class="row">
                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ trans('new_image') }}</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.images.store') }}" method="post" enctype="multipart/form-data" id="uploadForm" class="form-horizontal">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="image" class="col-md-3 col-form-label"> {{ trans('image') }}</label>
                                        <div class="col-md-9">
                                            <div class="form-group upload-btn-wrapper1 files color  mb-lg-0">
                                                <input type="file" class="form-control1" name="image[]" id="images" multiple >
                                            </div>

                                            <div id="images-to-upload">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 mt-2 row justify-content-end text-left">
                                        <div class="col-md-9 float-left">
                                            <button type="submit" class="btn btn-edit">{{ trans('save') }}</button>
                                            <input type="reset" class="btn btn-danger mt-1" value="{{ trans('cancel') }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>


        var fileCollection = new Array();
        $('#images').on('change',function(e){
            var files = e.target.files;
            $.each(files, function(i, file){
                fileCollection.push(file);
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(e){
                    var template = ''+
                        '<img class="img-uplode" src="'+e.target.result+'" width="100" height="100">'+
                        ''+
                        '';
                    $('#images-to-upload').append(template);
                };
            });
        });

    </script>
@endsection
