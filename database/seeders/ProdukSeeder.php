<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\User;

class ProdukSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    for ($i = 1; $i <= 5; $i++) {
      Produk::create([
        'user_id' => User::where('role', 'admin')->first()->id,
        'nama_produk' => 'Produk ' . $i,
        'harga' => floor(rand(10000, 100000) / 1000) * 1000,
        'deskripsi' => 'Deskripsi Produk ' . $i
      ]);
    }
  }
}
