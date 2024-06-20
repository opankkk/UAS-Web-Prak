@extends('dashboard.layouts.orders')

@section('container')

<h2>Orders</h2>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Order ID</th>
      <th>Item</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
    <tr>
      <td>{{ $order->id }}</td>
      <td>{{ $order->product->nama_produk }}</td>
      <td align="right">{{ 'Rp ' . number_format($order->product->harga, 0, ',', '.') }}</td>
      <td>
        <form action="{{ route('orders.destroy', $order->id) }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
            <span data-feather="x-circle"></span>
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<table class="table table-bordered">
  <tfoot>
    <tr>
      <th colspan="2">Total</th>
      <td align="right">
        @php
        $total = 0;
        foreach ($orders as $order) {
        $total += $order->product->harga;
        }
        echo '<strong>Rp ' . number_format($total, 0, ',', '.') . '</strong>';
        @endphp
      </td>
    </tr>
  </tfoot>
</table>

@endsection