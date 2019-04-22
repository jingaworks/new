<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

</head>
<body>

    <div class="d-flex toggled" id="wrapper">

        <!-- Page Content -->
        <div id="page-content-wrapper">

            @include('partials.cont.nav')

            <!-- User menu -->
            @include('partials.cont.user')
            <!-- /User menu -->

            <div class="container-fluid">
            
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                    <!-- template for the modal component -->
                    <script type="text/x-template" id="modal-template">
                    <transition name="modal">
                        <div class="modal-mask">
                        <div class="modal-wrapper">
                            <div class="modal-container">

                            <div class="modal-body">
                                <slot name="body">
                                
                                </slot>
                            </div>

                            <div class="modal-footer">
                                <slot name="footer">
                                    <button class="btn btn-info btn-block" @click="$emit('close')">
                                        Inchide
                                    </button>
                                </slot>
                            </div>
                            </div>
                        </div>
                        </div>
                    </transition>
                </script>
                    
                @yield('content')
            </div>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    @yield('scripts')

</body>
</html>
