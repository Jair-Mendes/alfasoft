@if (isset($errors) && count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Oops!</h4>
            <p>{{ $error }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>{!! session('success') !!}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Oops!</h4>
        <p>{!! session('error') !!}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
