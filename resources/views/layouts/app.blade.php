<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include("toplinks")
</head>
<body>
    <div id="app">
      @include("header")
      <section class="breadcrumb breadcrumb_bg">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="breadcrumb_iner">
                @include('layouts.alerts')
            </div>
          </div>
        </div>
      </section>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include("footer")
    @include("bottomlinks")
</body>
</html>
