<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')

<body>
    <!-- ##### Header Area Start ##### -->
    @include('partials.header')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
     @include('partials.hot_news')
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Featured Post Area Start ##### -->
    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    @include('partials.footer')           
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    
    @include('partials.import')
</body>

</html>