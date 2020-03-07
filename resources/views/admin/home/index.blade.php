@extends('admin.layout')
@section('content')
<!--app-content open-->
<div class="app-content">x
    <section class="section">
        <!--page-header open-->
        <div class="row">
            <div class="col-6">
                <div class="page-header">
                    <h4 class="page-title">{{trans('home')}}</h4>
                </div>
            </div>


        </div>
        <!--page-header closed-->

        <div class="section-body">


            <!--row open-->
            <div class="row">
                <div class="col-lg-6 col-xl-2 col-sm-12 col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                          <span class="stamp stamp-md bg-primary ml-3">
                            <i class="fa fa-users"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><strong style="font-size:20px;">({{ $usersCount}}) {{trans('users')}}</strong></h4>
                            <h6 class="mb-0"></h6>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-6 col-xl-2 col-sm-12 col-md-6">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                      <span class="stamp stamp-md bg-orange ml-3">
                        <i class="fa fa-cart-arrow-down"></i>
                    </span>
                    <div>
                        <h4 class="m-0"><strong style="font-size:20px;">({{ $categoriesCount}}){{trans('categories')}}</strong></h4>
                        <h6 class="mb-0"></h6>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-xl-2 col-sm-12 col-md-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                  <span class="stamp stamp-md bg-warning ml-3">
                    <i class="fa fa-eye"></i>
                </span>
                <div>
                    <h4 class="m-0"><strong style="font-size:20px;">({{ $sponsorsCount}}) {{trans('sponsors')}}</strong></h4>
                    <h6 class="mb-0"></h6>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-6 col-xl-2 col-sm-12 col-md-6">
        <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-success ml-3">
              <i class="fa fa-file-text"></i>
            </span>
            <div>
            <h4 class="m-0"><strong style="font-size:20px;">({{ $questionsCount}}) {{trans('questions')}}</strong></h4>
                <h6 class="mb-0"></h6>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-6 col-xl-2 col-sm-12 col-md-6">
    <div class="card p-3">
        <div class="d-flex align-items-center">
          <span class="stamp stamp-md bg-success ml-3">
            <i class="fa fa-file-text"></i>
        </span>
        <div>
            <h4 class="m-0"><strong style="font-size:20px;">({{ $brandsCount}}) {{trans('brands')}}</strong></h4>
            <h6 class="mb-0"></h6>
        </div>
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
