@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-lg-5 offset-lg-3 col-md-5 offset-md-4 px-5">
                <p class="text-center">Register in to the App</p>
                <form class="row g-3" action="" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="inputEmail" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputEmail" placeholder="Enter your name">
                      </div>
                    <div class="col-md-12">
                      <label for="inputEmail4" class="form-label">Email</label>
                      <input type="email" class="form-control" id="inputEmail4" placeholder="Enter your email">
                    </div>
                    <div class="col-md-12">
                      <label for="inputPassword4" class="form-label">Password</label>
                      <input type="password" class="form-control" id="inputPassword4" placeholder="Enter your password...">
                    </div>
                    <div class="d-grid gap-2 col-md-12 mx-auto my-4">
                        <button class="btn btn-primary" type="submit">Sign Up</button>
                    </div>
                </form>
                <div>
                    <p>Have an account? <span><a href="">Login</a></span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
