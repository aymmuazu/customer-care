@extends('layouts.app')
@section('title', 'PIN Management System')
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
       <h2 class="pt-4 mb-4">Personal Identification Number Creation</h2>
       <form action="{{route('pin')}}" method="POST" class="offset-mb-4 col-sm-5" style="padding: 25px; border-radius: 10px; background: #eff2f4; box-shadow: 0px 0px 7px #c0c0c0;">
           @csrf
           <div class="form-group mb-3">
               <label for="pin" class="lablel">PIN</label>
               <input type="text" placeholder="*********" value="{{old('pin')}}" name="pin" class="form-control @error('pin') is-invalid @enderror">
               <label for="" class="pt-2"><b>Suggestion: </b></label>
               <?php echo rand(); rand(100000, 100000);?>
               @error('pin')
                   <div class="invalid-feedback">
                       {{$message}}
                   </div>
               @enderror
           </div>
            <div class="form-group pt-4">
                <button class="btn btn-primary ">Create PIN <span class="fa fa-sign-in-alt"></span></button>
            </div>
       </form>
       <div class="pt-4">
            <h2 class="pt-3 mb-3">Available PINS</h2>
            <table class="table">
                <thead>
                  <th>S/N</th>
                  <th>PINS</th>
                </thead>
                <tbody>
                   @foreach ($pins as $pin)
                   <tr>
                      <td>{{ $pin->id }}</td>
                      <td>{{ $pin->pin }}</td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
       </div>
    
   </div>
@endsection
