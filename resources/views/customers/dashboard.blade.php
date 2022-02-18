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
                      <a href="{{route('customers.profile')}}" class="btn btn-dark">Update your Profile <span class="fa fa-user-circle"></span></a>
                      <a href="{{route('customers.password')}}" class="btn btn-outline-dark">Change Password <span class="fa fa-key"></span></a>
                      <a href="{{route('customers.logout')}}" class="btn btn-danger">Logout <span class="fa fa-power-off"></span></a>
                    </div>
                </div>
            </div>
          </div>
    </div>
    <div class="">
        <div class="row gutters-sm">
            <div class="col-sm-6 mb-3">
              <div class="card h-100" style="background: #708999; color: #fff;">
                <div class="card-body">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                          <h1 class="display-7 text-center">
                            <div class="pt-5" style="font-size: 100px;">
                              {{ count($complains) }}
                            </div><p></p>
                              Complaints 😕 <p></p>
                              <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalDefault" class="btn btn-dark">Complaints <span class="fa fa-eye"></span></a>
                          </h1>
                          <div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header text-dark">
                                      <h5 class="modal-title" id="exampleModalLabel">Customers</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                    <div class="modal-body text-dark">
                                      <table class="table">
                                        <thead>
                                          <th>S/N</th>
                                          <th>Title</th>
                                          <th>Body</th>
                                          <th>Replies</th>
                                          <th>Actions</th>
                                        </thead>
                                        <tbody>
                                           @foreach ($complains as $complain)
                                           <tr>
                                              <td>COM/ID/088{{ $complain->id }}</td>
                                              <td>{{ $complain->title }}</td>
                                              <td>{{ $complain->body }}</td> 
                                              <td>
                                                @if ($complain->reply == 1)
                                                  <a href="{{route('customers.complaint.replies', ['id' => $complain->id, 'title' => Str::slug($complain->title, '-')])}}" class="btn btn-primary">View</a>
                                                @else
                                                <span class="badge rounded-pill bg-danger">No replies</span>
                                                @endif
                                              </td>
                                              <td><a href="{{route('customers.complaint.delete', ['id' => $complain->id, 'title' => Str::slug($complain->title, '-')])}}" class=""><span class="fa fa-trash"></span></a></td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                              </div>
                          </div>
                          <p></p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            @livewire('complaint')
    </div>
@endsection
