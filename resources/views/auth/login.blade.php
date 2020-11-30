@extends('partials.layout')

@section('content')
<div class="text-center">
    <form class="form-signin" method="post" enctype="multipart/form-data" role="form" action="/login">
        <h1 class="h3 mb-3 font-weight-normal">Log in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>
@endsection
