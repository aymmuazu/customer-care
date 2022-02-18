@extends('layouts.app')
@section('title', 'Login')
@section('content')
   <div class="container pt-5 mb-5">
       @if (session()->has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            ⚠️ {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       @elseif(session()->has('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            🙌 {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       @endif
       <h2 class="pt-4 mb-4">Login System for Customer Managers</h2>
       <form action="{{route('auth.login')}}" method="POST" class="offset-mb-4 col-sm-5" style="padding: 25px; border-radius: 10px; background: #eff2f4; box-shadow: 0px 0px 7px #c0c0c0;">
           @csrf
           <div class="form-group mb-3">
               <label for="email" class="lablel">Email</label>
               <input type="text" placeholder="example@example.com" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror">

               @error('email')
                   <div class="invalid-feedback">
                       {{$message}}
                   </div>
               @enderror
           </div>
           <div class="form-group">
                <label for="password" class="lablel">Password</label>
                <input type="password" placeholder="*******" name="password" class="form-control @error('password') is-invalid @enderror">
        
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group pt-4">
                <button class="btn btn-primary ">Login <span class="fa fa-sign-in-alt"></span></button>
            </div>
       </form>
       <div class="pt-4">
            Not yet have an account <a href="{{route('auth.register')}}" class="mb-4 pt-5">Register</a>
       </div>
   </div>
@endsection
