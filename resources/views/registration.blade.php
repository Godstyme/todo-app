@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-lg-5 offset-lg-3 col-md-5 offset-md-4 px-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p class="text-center fw-bolder">Register in to your account</p>
                <form class="row g-3" action="registration" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="inputEmail" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputEmail" placeholder="Enter your name" name="name" value="{{old('name')}}">
                      </div>
                    <div class="col-md-12">
                      <label for="inputEmail4" class="form-label">Email</label>
                      <input type="email" class="form-control" id="inputEmail4" placeholder="Enter your email" name="email" value="{{old('email')}}">
                    </div>
                    <div class="col-md-12">
                      <label for="inputPassword4" class="form-label">Password</label>
                      <input type="password" class="form-control" id="inputPassword4" placeholder="Enter your password..." name="password">
                    </div>
                    <div class="py-2">

                    </div>
                    <div class="d-grid gap-2 col-md-12 mx-auto my-1">
                        <button class="btn btn-primary" type="submit">Sign Up</button>
                    </div>
                </form>
                <div class="py-2">
                    <p>Have an account ? &nbsp;&nbsp;<span><a href="{{url('login')}}">Login</a></span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
