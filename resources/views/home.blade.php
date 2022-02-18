@extends('layouts.app')
@section('title', 'Home')
@section('content')
   <main style="background: url(/assets/bggg.png); ">
        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
    
        <div class="container marketing">

        <div class="row featurette">
            <div class="col-md-7">
            <h2 class="featurette-heading">Get to know your <span class="text-muted">Customers.</span></h2>
            <p class="lead">We’ve refreshed ourselves in the power of understanding your audience. Now, in honor of Get to Know Your Customers Day, here we explore ways you can get under the skin of your consumers and enjoy increased marketing success.

            </p>
            <p>@auth('users')
                <a class="btn btn-lg btn-primary" href="{{route('auth.login')}}" role="button">Dashboard 💨</a>
            @endauth
            @auth('customers')
                <a class="btn btn-lg btn-primary" href="{{route('customers.index')}}" role="button">Dashboard 💨</a>
            @endauth
            
            @guest('customers')
                <a class="btn btn-lg btn-primary" href="{{route('customers.index')}}" role="button">Get Started 👊</a> 
            @endguest</p>
            </div>
            <div class="col-md-5 pt-5">
                <img src="/assets/img/001.png" alt="" style="width: 100%;">
            </div>
        </div>
        <hr class="featurette-divider">
    
        <!-- /END THE FEATURETTES -->
    
        </div><!-- /.container -->
   </main>
@endsection
