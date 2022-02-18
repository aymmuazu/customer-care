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
                      <a href="{{route('user.logout')}}" class="btn btn-danger">Logout <span class="fa fa-power-off"></span></a>
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
                            <span style="font-size: 100px;">
                              {{ count($complains) }}
                            </span><p></p>
                              Complains 😕 <p></p>
                              @if (count($complains) >= 1)
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalDefault2" class="btn btn-dark">View <span class="fa fa-eye"></span></a>
                              @endif
                          </h1>
                          <div class="modal fade" id="exampleModalDefault2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                              <div class="modal-content">
                                 <div class="modal-header text-dark">
                                      <h5 class="modal-title" id="exampleModalLabel">Customers</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                    <div class="modal-body text-dark">
                                      <table class="table">
                                        <thead>
                                          <th>S/N</th>
                                          <th>TITLE</th>
                                          <th>BODY</th>
                                          <th>TIMESTAMPS</th>
                                          <th>REPLY</th>
                                          <th>REPLY STATUS</th>
                                        </thead>
                                        <tbody>
                                           @foreach ($complains as $complain)
                                           <tr>
                                              <td>COM/ID/088{{ $complain->id }}</td>
                                              <td>{{ $complain->title }}</td>
                                              <td>{{ $complain->body }}</td> 
                                              <td>{{ $complain->created_at->diffForHumans()}}</td> 
                                              <td><a href="{{route('complain.reply', ['id' => $complain->id, 'title' => Str::slug($complain->title, '-')])}}" class=""><span class="fa fa-reply"></span></a></td>
                                              <td>  

                                                @if ($complain->reply == 0)
                                                  <span class="badge rounded-pill bg-danger">Not replied</span> 
                                                @else
                                                  <span class="badge rounded-pill bg-success">Replied</span>
                                                @endif
                                                
                                              </td>
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
            <div class="col-sm-6 mb-3">
                <div class="card h-100">
                  <div class="card-body" style="background: #708999; color: #fff;">
                      <div class="jumbotron jumbotron-fluid">
                          <div class="container">
                            <h1 class="display-7 text-center">
                              <span style="font-size: 100px;">
                                {{ count($customers) }}
                              </span><p></p>
                                Customers 😍 <p></p>
                               @if (count($customers) >= 1)
                                   <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">
                                    View Customers <span class="fa fa-eye"></span>
                                  </button>
                               @endif
                            </h1>
                            <p></p>
                          </div>
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
                                              <th>NAME</th>
                                              <th>EMAIL</th>
                                            </thead>
                                            <tbody>
                                               @foreach ($customers as $customer)
                                               <tr>
                                                  <td>COM/ID/088{{ $customer->id }}</td>
                                                  <td>{{ $customer->name }}</td>
                                                  <td>{{ $customer->email }}</td> 
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
                      </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
@endsection
