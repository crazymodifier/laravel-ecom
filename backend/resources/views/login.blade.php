@extends('layouts.page')

{{-- @section('navbar')
    
@endsection --}}

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="login-form-wrapper">
                    <div class="card bg-light p-4">
                        <div class="card-body">
                            <h3>Login</h3><br>
                            <form action="{{route('authenticate')}}" method="post">
                                @csrf

                                <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4 @error('email') is-invalid @enderror" placeholder="Enter Your Email">
                                @error('email')
                                    <p>{{$message}}</p>
                                @enderror
                                <input type="password" name="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Password">

                                <button class="btn btn-medium border-secondary py-3 px-4 bg-white text-primary " type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection