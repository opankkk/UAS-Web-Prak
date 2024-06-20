<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;

class ProdukController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $produk = Produk::all();
    return view('Product', [
      'produks' => $produk
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.posts.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreprodukRequest $request)
  {
  }

  /**
   * Display the specified resource.
   */
  public function show(Produk $produk)
  {
    return $produk;
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(produk $produk)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateprodukRequest $request, produk $produk)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(produk $produk)
  {
    //
  }
}
