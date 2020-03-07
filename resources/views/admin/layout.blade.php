<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <!--favicon -->



    <link rel="icon" href="{{url('')}}/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet"/>
    <!--app.css css-->
    <link rel="stylesheet" href="{{ url('assets/css/select2.min') }}">
    <link rel="stylesheet" href="{{ url('assets/css/admin.app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/mystyle.css') }}">
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ url('assets/css/style-ar.css') }}">
    @else
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    @endif

<<<<<<< HEAD
=======
<!--     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
     -->

>>>>>>> master
</head>

<body class="{{ auth()->user() ? 'app':'bg-colour bg-primary' }}">

<!--Header Style -->
<div class="wave -three"></div>

<!--loader -->
<div id="spinner"></div>

<!--app open-->
<div id="app" class="page">
    <div class="main-wrapper">

        <!--nav open-->
        <nav class="navbar  navbar-expand-lg main-navbar mynav">
            <a class="header-brand" href="{{ route('admin.home.index') }}">
                <img src="{{url('')}}/assets/img/finallogo.png" class="header-brand-img" alt="Splite-Admin  logo">
            </a>
<!--             <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle d-none d-lg-block " style="margin-right:400px;">
                        <a href="#" data-toggle="dropdown" class="nav-link  nav-link-lg "><i class=" fa fa-flag-o "></i></a>
                        <div class="dropdown-menu dropdown-menu-lg  dropdown-menu-right">

                            @foreach (Config::get('app.locales') as $lang => $language)
                            @if ($lang != App::getLocale())
                            <a href="{{ route(Route::currentRouteName(), array_merge( request()->route()->parameters(), ['lang' => $lang])) }}" class="dropdown-item d-flex align-items-center">
                                <div>
                                    <strong>{{$language}}</strong>
                                </div>
                            </a>
                            @endif
                            @endforeach

                        </div>
                    </li>
            </ul>     -->
        </nav>
        <!--nav closed-->

        <!--aside open-->
    @if(auth()->user())
        @yield('sidebar', View::make('admin.sidebar'))
    @endif
    <!--aside closed-->

    @yield('content')



    <!--Footer-->
        <footer class="main-footer">
            <div class="text-center">
                جميع الحقوق محفوظة لدى <a href="https://lodex-solutions.com/"> Lodex Solutions</a> &copy; 2019
            </div>
        </footer>
        <!--/Footer-->

    </div>
</div>
<!--app closed-->

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- Popup-chat -->
<a href="#" id="addClass"><i class="ti-comment"></i></a>

<script src="{{ url('assets/js/admin.app.js') }}"></script>

<script src="{{ url('assets/js/select2.full.min') }}"></script>


<script>
    $(document).ready(function () {
        $("input[id='active']").click(function () {
            var url = '{{ route("api.model.active") }}';

            var defaultRadioValue = $(this).val();
            $(this).val(0);
            if (defaultRadioValue == 0) {
                $(this).val(1);
            }

            var dataModel = $(this).attr('data-model');
            var dataId = $(this).attr('data-id');

            $.ajax({
                url: url,
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    'active': $(this).val(),
                    'modelName': dataModel,
                    'modelId': dataId
                },

                success: function (data) {
                    var alertMessage = '{{trans('disabled_successfully')}}';

                    if (data.active == 1) {
                        alertMessage = '{{trans('active_successfully')}}';
                    }
                    toastr.success(alertMessage, '{{trans("success")}}', {
                        positionClass: "toast-bottom-right",
                        closeButton: true
                    })
                },
                error: function () {
                }
            });
        });

    });



</script>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>

@yield('scripts')
{{-- google map scripts --}}
<script src="{{ url('assets/js/googleMap.js') }}"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAndFqevHboVWDN156vJqXk1Y1-D7QR7BE&libraries=places&callback=initAutocomplete"
    async defer></script>
{{--  --}}


</body>

</html>





