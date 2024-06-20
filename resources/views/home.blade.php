@extends('Index')


@section('home')
    

<div class="home-bg">

    <section class="home">
 
       <div class="content">
         <span>Kualitas Sayur Restoran, Kami yang Menyediakan</span>
         <h3>Sayuran Segar Langsung dari Sumbernya</h3>
         <a href="/about" class="btn">about us</a>
       </div>
 
    </section>
 
 </div>
 
 <section class="home-category">
 
 
    <div class="box-container">
 
       <div class="box">
          <img src="aset/cat-1.png" alt="">
          <h3>fruits</h3>
          <a href="category.php?category=fruits" class="btn">fruits</a>
       </div>
 
       <div class="box">
          <img src="aset/cat-2.png" alt="">
          <h3>meat</h3>
          <a href="category.php?category=meat" class="btn">meat</a>
       </div>
 
       <div class="box">
          <img src="aset/cat-3.png" alt="">
          <h3>vegitables</h3>
          <a href="category.php?category=vegitables" class="btn">vegitables</a>
       </div>
 
       <div class="box">
          <img src="/aset/cat-4.png" alt="">
          <h3>fish</h3>
          <a href="category.php?category=fish" class="btn">fish</a>
       </div>
 
    </div>
 
 </section>


 @endsection