@extends('layouts.app')
@section('title', 'Profile-Customers')
@section('content')
   <div class="container pt-5 mb-5">
       @if (session()->has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          😥 {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

       @elseif(session()->has('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          👋 {{ session('info') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      @elseif(session()->has('login'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          🙌 {{ session('login') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       @endif
       <h3 class="mb-5">Profile <span class="fa fa-user-circle"></span></h3>
         <!-- Breadcrumb -->
         <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          <div class="row gutters-sm">
            <div class="col-md mb-5 bg-dark" style="box-shadow: 0px 10px 10px #c0c0c0;">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if (auth()->user()->image == NULL)
                        <img src="/assets/user.png" alt="{{auth()->user()->name}}" class="rounded-circle" style="border: 3  px solid #000;" width="100">
                    @else
                        <img src="/assets/uploads/{{auth()->user()->image}}" alt="{{auth()->user()->name}}" class="rounded-circle" style="border: 3  px solid #000;" width="100">
                    @endif
                    <div class="mt-3">
                      <h4>{{auth()->user()->name}}</h4>
                      <p class="text-secondary mb-1">{{auth()->user()->email}}</p>
                      <p class="text-muted font-size-sm">Joined {{auth()->user()->created_at->diffForHumans()}}</p>
                      <a href="{{route('auth.login')}}" class="btn btn-dark">Update your Profile <span class="fa fa-user-circle"></span></a>
                      <a href="{{route('customers.password')}}" class="btn btn-outline-dark">Change Password <span class="fa fa-key"></span></a>
                      <a href="{{route('customers.logout')}}" class="btn btn-danger">Logout <span class="fa fa-power-off"></span></a>
                    </div>
                </div>
            </div>
          </div>
    </div>
    <form action="{{route('customers.profile')}}" enctype="multipart/form-data" method="POST" class="mb-4" style="padding: 25px; border-radius: 10px; background: #eff2f4; box-shadow: 0px 0px 7px #c0c0c0;">
      <div class="form-group mb-3">
          <label for="exampleInputName">Name</label>
          <input type="text" name="name" value="{{auth()->user()->name}}"  class="form-control  @error('name') is-invalid @enderror">
          @error('name')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
      </div>
      <div class="form-group mb-3">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" readonly> 
        @error('email')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Image</label>
        <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror">
        @error('image')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
      </div>
      @csrf
      <div class="pt-3">
          <button type="submit" class="btn btn-dark">Update Profile <span class="fa fa-user-circle"></span> </button>
      </div>
      <p></p>
    </form>
@endsection
