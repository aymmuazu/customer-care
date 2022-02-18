@extends('layouts.app')
@section('title', 'Customer-Register')
@section('content')
   <div class="container pt-5 mb-5">
       @if (session()->has('error'))
        <div class="alert alert-warning">
            😥{{ session('error') }} 
        </div>
       @elseif(session()->has('info'))
        <div class="alert alert-info">
            👋{{ session('info') }} 
        </div>
       @endif
       <h2 class="pt-4 mb-4">Customers Registration System</h2>

       <form action="{{route('customers.index.register')}}" method="POST" class="offset-mb-4 col-sm-5" style="padding: 25px; border-radius: 10px; background: #eff2f4; box-shadow: 0px 0px 7px #c0c0c0;">
           @csrf

           <div class="form-group mb-3">
            <label for="name" class="lablel">Name</label>
            <input type="text" placeholder="Adamu Bala" value="{{old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror">

            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
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
                <button class="btn btn-primary ">Register <span class="fa fa-sign-in-alt"></span></button>
            </div>
       </form>
       <div class="pt-4">
            Already have an account <a href="{{route('customers.index')}}" class="mb-4 pt-5">Login</a>
       </div>
   </div>
@endsection
