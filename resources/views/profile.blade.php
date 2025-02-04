@extends('Index')

@section('Profile')

<style>
  .box {
    position: relative;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
    text-align: center;
  }

  h1.title {
    color: #00541A;
    transition: color 0.3s ease;
    border: 2px solid #00541A;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    background-color: #f0f0f0;
    /* Tambahkan warna latar belakang */
  }

  h1.title:hover {
    color: #009688;
    border-color: #009688;
    background-color: #FEF9D9;
    /* Ubah warna latar belakang saat dihover */
  }


  .btn,
  .option-btn {
    display: inline-block;
    padding: 10px 20px 10px 20px;
    margin-top: 10px;
    border: none;
    color: white;
    text-decoration: none;
    cursor: pointer;
    width: auto;
  }

  .option-btn {
    margin-left: 10px;
  }
</style>

<h1 class="title">User Profile</h1>
<br>

<div class="box-container">
  <div>
    <div class="box">
      <h1>User ID: <span>{{ $user->id }}</span></h1>
      <h1>Username: <span>{{ $user->name }}</span></h1>
      <h1>Email: <span>{{ $user->email }}</span></h1>
      <a href="{{ route('profile.edit', $user) }}" class="btn">Update</a>
    </div>
  </div>
</div>

</div>
@endsection