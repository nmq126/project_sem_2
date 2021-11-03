<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.partial.head')
    @yield('style')
</head>
<body id="page-top">
@include('admin.layout.partial.pre-loader')
<div class="page">
    @include('admin.layout.partial.header')
    <div class="page-content d-flex align-items-stretch">
        @include('admin.layout.partial.sidebar')
        <div class="content-inner"  >
            <div class="container-fluid">
                @yield('breadcrumb')
                @yield('content')
            </div>
            @include('admin.layout.partial.footer')
        </div>
    </div>
</div>
@include('admin.layout.partial.script')
@yield('page-script')

</body>
</html>
