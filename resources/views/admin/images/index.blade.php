@extends('admin.layout')

@section('content')
    <!--app-content open-->
    <div class="app-content">
        <section class="section">
            <!--page-header open-->
            <div class="row">
                <div class="col-6">
                    <div class="page-header">
                        <h4 class="page-title"> {{trans('images')}}</h4>

                    </div>
                </div>

            </div>
            <!--page-header closed-->

            <div class="section-body">

                <!--row open-->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">

                                    <div class="col-md-2">

                                            <span style="" class="table-add ">
                                                <a href="{{ route('admin.images.create') }}" class="btn btn-add btn-block">{{ trans('new_image') }}</a>
                                            </span>

                                    </div>

                                </div>


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
                                <div class="table-responsive">
                                    <table id="example-2"
                                           class="table table-striped table-bordered border-t0 text-nowrap w-100">
                                        <thead>
                                        <tr>

                                            <th class="wd-15p">{{ trans('id') }}</th>
                                            <th class="wd-20p">{{ trans('image') }}</th>
                                           <!--  <th class="wd-20p">{{ trans('status') }}</th> -->
                                            <th class="wd-20p"> {{trans('actions')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($list as $image)

                                            <tr>
                                                <td>{{ $image->id }}</td>


                                                <td><img style="width: 100px" src="{{ asset($image->image) }}"></td>

                                       <!--          <td>
                                                    <label class="custom-switch">
                                                        <input type="checkbox" name="active" id="active"
                                                               data-model="{{  get_class($image) }}"
                                                               data-id="{{ $image->id }}"
                                                               value="{{ $image->active }}"
                                                               {{ $image->active ? 'checked' : '' }} class="custom-switch-input">
                                                        <span class="custom-switch-indicator publish"></span>
                                                    </label>
                                                </td>
 -->

                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <button type="button"
                                                                    class="btn btn-sm btn-info m-b-5 m-t-5 dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                <i class="fa-cog fa"></i>
                                                            </button>
                                                            <div class="dropdown-menu">


                                                                    <button type="button" class="dropdown-item has-icon"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModalLong{{ $image->id }}">
                                                                        <i class="fa fa-trash"></i> {{trans('remove')}}
                                                                    </button>

                                                            </div>
                                                        </div>
                                                    </td>

                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center">
                                    {{ $list->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row closed-->
            </div>


        </section>

        <!--app-content closed-->
    @foreach ($list as $image)
        <!-- Message Modal -->
            <div class="modal fade" id="exampleModalLong{{ $image->id }}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{trans('delete')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.images.destroy', ['category' => $image]) }}" method="Post">
                            @method('DELETE')
                            @csrf
                            <div class="modal-body">
                                <p class="mb-0">{{trans('delete_confirmation_message')}}</p>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"> {{trans('delete')}}</button>

                                <button type="button" class="btn btn-success"
                                        data-dismiss="modal">{{trans('close')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Message Modal closed -->
        @endforeach

    </div>

@stop

