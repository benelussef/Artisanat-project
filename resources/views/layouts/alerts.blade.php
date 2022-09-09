@if ($errors->all())
    @foreach ($errors as $error)
        <div class="alert alert-danger text-center p-3 m-5">
              {{$error}}
        </div>
    @endforeach
@endif

@if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show text-center p-3 m-5">
             <strong>{!! session()->get("success") !!}</strong>
             <button type="button" class="close">
                  <span>&times;</span>
             </button>
        </div>
@endif
@if (session()->has("warning"))
        <div class="alert alert-warning alert-dismissible fade show text-center p-3 m-5">
             <strong>{!! session()->get("warning") !!}</strong>
             <button type="button" class="close">
                  <span>&times;</span>
             </button>
        </div>
@endif
@if (session()->has("errorLink"))
        <div class="alert alert-danger alert-dismissible fade show text-center p-3 m-5">
             <strong>{!! session()->get("errorLink") !!}</strong>
             <button type="button" class="close">
                  <span>&times;</span>
             </button>
        </div>
@endif

@if (session()->has("info"))
        <div class="alert alert-info alert-dismissible fade show text-center p-3 m-5">
             <strong>{!! session()->get("info") !!}</strong>
             <button type="button" class="close">
                  <span>&times;</span>
             </button>
        </div>
@endif
