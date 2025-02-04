@extends('Index')

@section('update')
<style>
  .container {
    background-image:url('../aset/light_bg.png');
    padding: 20px;
    border-radius: 8px;
  }
  
  /* Warna latar belakang untuk card */
  .card {
    background-color: #FEF9D9;
    border: 1px solid #00541A;
    border-radius: 8px;
  }
  
  /* Warna untuk header card */
  .card-header {
    background-color: #00541A;
    color: #FEF9D9;
    font-size: 25;
    font-weight: bold;
    text-align: center;
    padding: 10px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }
  
  /* Warna untuk form labels */
  .col-form-label {
    color: #00541A;
    font-weight: bold;
  }
  
  /* Warna untuk input fields */
  .form-control {
    border: 1px solid #00541A;
    border-radius: 4px;
  }
  
  /* Warna untuk input fields ketika ada error */
  .is-invalid {
    border-color: #FF0000;
  }
  
  /* Warna untuk invalid feedback */
  .invalid-feedback {
    color: #FF0000;
  }
  
  /* Warna untuk tombol submit */
  .btn-primary {
    
    background-color: #00541A;
    border-color: #00541A;
    color: #FEF9D9;
    width: 200px; /* Set the width of the button */
    display: block;
    margin: 20px auto;
    font-size: 15
  }
  
  .btn-primary:hover {
    border-color: #FEF9D9;
    background-color: #F7E652;
    color: black
  }
  
  /* Margins and paddings for form groups */
  .form-group {
    margin-bottom: 15px;
  }
  
  .form-group.row.mb-0 {
    margin-bottom: 0;
  }
  
</style>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Profile</div>

        <div class="card-body">
          <form method="POST" action="{{ route('profile.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="form-group row">
              <label for="name" class="col-md col-form-label text-md-right">Name</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
        </div>

        <div class="form-group row">
          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

          <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
        </div>



        <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
              Update Profile
            </button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection