@extends('admin.layout')

@section('content')
    <div class="app-content">
        <section class="section">
            <!--page-header open-->
            <div class="row">
                <div class="col-6">
                    <div class="page-header">
                        <h4 class="page-title">{{ trans('new_setting') }}</h4>
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
                                <h4>{{ trans('setting_data') }}</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data" id="horizontal-validation" class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="ar[description]" class="col-md-3 col-form-label">{{ trans('arabic_description') }}</label>
                                        <div class="col-md-12">
                                            <textarea name="ar[description]" class="textarea" >{{ old('ar.description')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="en[description]" class="col-md-3 col-form-label">{{ trans('english_description') }} </label>
                                        <div class="col-md-12">
                                            <textarea name="en[description]" class="textarea" >{{ old('en.description')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="image" class="col-md-3 col-form-label">{{ trans('image') }} </label>
                                        <div class="col-md-12">
                                            <div class="form-group upload-btn-wrapper1 files color  mb-lg-0">
                                                <input type="file" class="form-control1" name="image">
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
<script>
        $('.textarea').ckeditor(); // if class is prefered.
</script>

@endsection
