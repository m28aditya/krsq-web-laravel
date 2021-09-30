@extends('layouts.auth.main')
@section('content')
<main class="form-signin">
    <form action="/auth" method="POST">
        @csrf
        <h3 class="mb-5 fw-bold text-white">Website Pengisian KRS</h1>
            <img class="mb-4" src="/resource/logo.png" width="90">
            <h1 class="h5 mb-3 fw-normal text-white">Please Sign In</h1>

            @if (session()->has('failed'))
            <div class="alert alert-danger" role="alert">
                {{ session('failed') }}
            </div>
            @endif


            <div class="form-floating mb-2">
                <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
</main>
@endsection