<div class="col-sm-6 mb-3">
    <h2 class="font-bolder mb-3" style="font-weight: bolder;">Add Complaints</h2>
    @if(session()->has('complaint'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          👋 {{ session('complaint') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="#" wire:submit.prevent="store" class="offset-mb-4 col-sm" style="padding: 25px; border-radius: 10px; background: #eff2f4; box-shadow: 0px 0px 7px #c0c0c0;">
      @csrf
      <div class="form-group mb-3">
          <label for="title" class="lablel">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" wire:model="title">

          @error('title')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
      </div>
      <div class="form-group">
          <textarea name="body" rows="7" class="form-control @error('body') is-invalid @enderror" placeholder="Enter your complain" wire:model="body"></textarea>
       @error('body')
           <div class="invalid-feedback">
               {{ $message }}
           </div>
       @enderror
       </div>
       <div class="form-group pt-4">
           <button class="btn btn-primary ">Add Complaints 😨</button>
       </div>
  </form>
</div>