@extends('Index')

@section('Products')

<div class="section">
  @if (session('success'))
  <div class="alert">
    {{ session('success') }}
    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>
  @endif

  @if (session('error'))
  <div class="alert error">
    {{ session('error') }}
    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>
  @endif

  <div class="containerPro">
    <div class="products-container">
      @foreach ($produks as $produk)
      <div class="product" data-name="p-{{ $loop->index }}">
        @if ($produk->foto)
        <img src="{{ asset('images/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}">
        @else
        <img src="{{ asset('/aset/tomat-pic.jpg') }}" alt="{{ $produk->nama_produk }}">
        @endif
        <h2>{{ $produk->nama_produk }}</h2>
        <div class="price">
          <p>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  @foreach ($produks as $produk)
  <div class="products-modal" id="modal-{{ $loop->index }}">
    <div class="modal-content">
      <span class="close">&times;</span>
      @if ($produk->foto)
      <img src="{{ asset('images/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}">
      @else
      <img src="{{ asset('/aset/tomat-pic.jpg') }}" alt="{{ $produk->nama_produk }}">
      @endif
      <h2>{{ $produk->nama_produk }}</h2>
      <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <span>( 250 )</span>
      </div>
      <p>{!! $produk->deskripsi !!}</p>
      <div class="price">
        <p>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
      </div>
      <div class="buttons">
        <a href="#" class="buy">buy now</a>
        <a href="{{ route('orders.add', $produk->id) }}" class="cart">Add to cart</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const products = document.querySelectorAll('.product');
    const modals = document.querySelectorAll('.products-modal');
    const closeButtons = document.querySelectorAll('.close');

    products.forEach((product, index) => {
      product.addEventListener('click', () => {
        const modal = document.getElementById(`modal-${index}`);
        if (modal) {
          modal.style.display = 'flex';
        }
      });
    });

    closeButtons.forEach((button, index) => {
      button.addEventListener('click', () => {
        const modal = document.getElementById(`modal-${index}`);
        if (modal) {
          modal.style.display = 'none';
        }
      });
    });

    window.addEventListener('click', (event) => {
      modals.forEach(modal => {
        if (event.target == modal) {
          modal.style.display = 'none';
        }
      });
    });
  });
</script>
@endsection