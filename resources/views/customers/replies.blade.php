@extends('layouts.app')
@section('title', 'Dashboard-Customers')
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
       <h2 class="pt-4 mb-4">Replies 📨</h2>
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
                      <a href="{{route('customers.profile')}}" class="btn btn-dark">Update your Profile <span class="fa fa-user-circle"></span></a>
                      <a href="{{route('customers.password')}}" class="btn btn-outline-dark">Change Password <span class="fa fa-key"></span></a>
                      <a href="{{route('customers.logout')}}" class="btn btn-danger">Logout <span class="fa fa-power-off"></span></a>
                    </div>
                </div>
            </div>
          </div>
    </div>
    <div class="">
        <table class="table">
            <thead>
              <th>S/N</th>
              <th>Title</th>
              <th>Body</th>
              <th>Time</th>
            </thead>
            <tbody>
               @foreach ($replies as $reply)
               <tr>
                  <td>R/U/234{{ $reply->id }}</td>
                  <td>{{ $reply->title }}</td>
                  <td>{{ $reply->body }}</td> 
                  <td>{{ $reply->created_at->diffForHumans()}}</td>
                </tr>
               @endforeach
            </tbody>
          </table>
    </div>
@endsection
