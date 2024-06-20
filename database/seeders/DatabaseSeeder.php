<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    $this->call(UserSeeder::class);

    $this->call(ProdukSeeder::class);

    $users = User::all();
    $products = Produk::all();

    // foreach ($users as $user) {
    //   foreach ($products as $product) {
    //     Order::create([
    //       'user_id' => $user->id,
    //       'product_id' => $product->id,
    //       // Add other fields as necessary
    //     ]);
    //   }
    // }
  }
}
