@extends('admin.layout')
<?php use App\Constants\UserTypes;?>
@section('content')
<!--app-content open-->
<div class="app-content">
    <section class="section">
        <!--page-header open-->
        <div class="row">
            <div class="col-6">
                <div class="page-header">
                    <h4 class="page-title">{{ trans('new_user') }}</h4>

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
                                  <h4>{{ trans('new_user') }}</h4>
                              </div>
                              <div class="card-body">
                                 @if(session()->has('success'))
                                 <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                                    <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>×</span>
                                        </button>
                                        <div class="alert-title">{{trans('success')}}</div>
                                        {{ session('success') }}
                                    </div>
                                </div>
                                @endif
                                <form id="horizontal-validation" class="form-horizontal" action="{{ route('admin.users.store') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                      <label for="inputName" class="col-md-3 col-form-label">{{ trans('first_name') }} </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control"
                                        name="first_name" id="first_name"
                                        value="{{old('first_name')}}"
                                        placeholder="{{ trans('first_name') }} ">
                                        @if ($errors->has('first_name'))
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                        @endif

                                    </div>
                                </div>
                                 <div class="form-group row">
                                      <label for="inputName" class="col-md-3 col-form-label">{{ trans('last_name') }} </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control"
                                        name="last_name" id="name"
                                        value="{{old('last_name')}}"
                                        placeholder="{{ trans('last_name') }} ">
                                     <input type="hidden" class="form-control"
                                        name="type" id="name" value="{{UserTypes::ADMIN}}">

                                        @if ($errors->has('last_name'))
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                        @endif

                                    </div>
                                </div>

                            <div class="form-group row">
                              <label for="inputPassword3" class="col-md-3 col-form-label">{{ trans('email') }}</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" name="email"
                                  id="email" value="{{ old('email') }}"
                                  placeholder="{{ trans('email') }}">
                                  @if ($errors->has('email'))
                                  <strong>{{ $errors->first('email') }}</strong>
                                  @endif

                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-md-3 col-form-label">{{ trans('phone') }}</label>
                            <div class="col-md-9">
                               <input type="text" class="form-control"
                               name="phone" id="phone"
                               value="{{ old('phone') }}"
                               placeholder="{{trans('phone')}}"/>
                               @if ($errors->has('phone'))

                               <strong>{{ $errors->first('phone') }}</strong>
                               @endif

                           </div>
                       </div>


                       <div class="form-group row">
                        <label for="inputPassword3" class="col-md-3 col-form-label">{{ trans('password') }}</label>
                        <div class="col-md-9">
                           <input type="password" class="form-control"
                           name="password" id="password"
                           value="{{ old('password') }}"
                           placeholder="{{ trans('password') }}">
                           @if ($errors->has('password'))
                           <strong>{{ $errors->first('password') }}</strong>
                           @endif

                       </div>
                   </div>
                   <div class="form-group mb-0 mt-2 row justify-content-end text-left">
                      <div class="col-md-9 float-left">
                       <input type="submit" class="btn btn-primary mt-1"
                       value="{{ trans('save') }}">
                       <input type="reset" class="btn btn-danger mt-1"
                       value="{{ trans('cancel') }}">
                   </div>
               </div>


           </form>
       </div>
   </div>
</div>
</div>
<!--row closed-->
</div>
</section>
</div>
<!--app-content closed-->
@stop
