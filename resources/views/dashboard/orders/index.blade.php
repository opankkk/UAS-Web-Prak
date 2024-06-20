@extends('dashboard.layouts.main')

@section('container')

<h2>Orders</h2>

@foreach ($orders as $userId => $userOrders)
<h3>User Name: {{ $userOrders->first()->user->name }}</h3>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Order ID</th>
      <th>Item</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
  </thead>
  @foreach ($userOrders as $order)

  <tbody>
    <tr>
      <td>{{ $order->id }}</td>
      <td>{{ $order->product->nama_produk }}</td>
      <td align="right">{{ 'Rp ' . number_format($order->product->harga, 0, ',', '.') }}</td>
      <td>
        <form action="{{ route('ordersadmin.destroy', $order->id) }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
            <span data-feather="x-circle"></span>
          </button>
        </form>
      </td>
    </tr>
  </tbody>
  @endforeach

</table>
<table class="table table-bordered">
  <tfoot>
    <tr>
      <th colspan="2">Total</th>
      <td align="right">
        @php
        $total = 0;
        foreach ($userOrders as $order) {
        $total += $order->product->harga;
        }
        echo '<strong>Rp ' . number_format($total, 0, ',', '.') . '</strong>';
        @endphp
      </td>
    </tr>
  </tfoot>
</table>
@endforeach

@endsection