@extends('layouts.app')
@section('title', 'Dashboard')
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
       <h2 class="pt-4 mb-4">Dashboard 💨</h2>
         <!-- Breadcrumb -->
         <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                      <button class="btn btn-outline-dark">Change Password <span class="fa fa-key"></span></button>
                      <a href="{{route('user.logout')}}" class="btn btn-danger">Logout <span class="fa fa-power-off"></span></a>
                    </div>
                </div>
            </div>
          </div>
    </div>
    <div class="">
        @foreach ($complains as $complain)
          <h3 style="font-weight: bold" class="mb-5">Replying Complain - {{$complain->title}} | COM/ID/088{{$complain->id}}</h3>
          <div class="col-sm-6 mb-3">

            @if(session()->has('complaint'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  👋 {{ session('complaint') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('complain.reply', ['id' => $complain->id,  'title' => Str::slug($complain->title, '-')]) }}" method="POST" class="offset-mb-4 col-sm" style="padding: 25px; border-radius: 10px; background: #eff2f4; box-shadow: 0px 0px 7px #c0c0c0;">
              @csrf
              <div class="form-group mb-3">
                  <label for="title" class="lablel">Title</label>
                  <input type="text" name="title" value="{{ old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Your Title">
        
                  @error('title')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
              <div class="form-group">
                <textarea name="body" rows="7" class="form-control @error('body') is-invalid @enderror" placeholder="Enter your complain" wire:model="body">{{ old('body') }}</textarea>
               @error('body')
                   <div class="invalid-feedback">
                       {{ $message }}
                   </div>
               @enderror
               </div>
               <div class="form-group pt-4">
                   <button class="btn btn-primary ">Reply a Complain 😨</button>
               </div>
          </form>
        </div>
        @endforeach
           
    </div>
@endsection
