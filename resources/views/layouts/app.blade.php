<!DOCTYPE html>

 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
 <head>
     <meta charset="utf-8" />
     <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/apple-icon.png')}}">
     <link rel="icon" type="image/png" href="{{asset('images/favicon.ico')}}">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>{{config('app.name')}} @yield('title')</title>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <!-- CSS Files -->
     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
     <link href="{{asset('css/light-bootstrap-dashboard.css?v=2.0.0')}}" rel="stylesheet" />
     {{-- <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" /> --}}
     {{-- <link href="{{asset('css/select2-bootstrap.min.css')}}" rel="stylesheet" /> --}}
     <!-- CSS Just for demo purpose, don't include it in your project -->
     <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
     @stack('styles')
 </head>
 
 <body>
     @if(Route::is('login') || Route::is('password.request') || Route::is('password.reset'))
     @include('layouts.auth')
     @else
     @include('layouts.dashboard')
     @endif
     
 </body>
 <!--   Core JS Files   -->
 <script src="{{asset('js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('js/plugins/bootstrap-switch.js')}}"></script>
 <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
 <script src="{{asset('js/plugins/moment.min.js')}}"></script>
<!--  DatetimePicker   -->
<script src="{{asset('js/plugins/bootstrap-datetimepicker.js')}}"></script>

 <script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
 <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
 <script src="{{asset('js/light-bootstrap-dashboard.js?v=2.0.0')}}" type="text/javascript"></script>
 <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
 <script src="{{asset('js/demo.js')}}"></script>
 @stack('scripts')

 </html>
 