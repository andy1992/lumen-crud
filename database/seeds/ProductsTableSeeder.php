<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;
use App\Models\Product;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        Product::create([
            'product_name'  => 'Samsung Galaxy S8',
            'quantity'      => 25,
            'price'         => 799,
            'description'   => 'Top of the line of Galaxies, with infinity Super AMOLED display',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Product::create([
            'product_name'  => 'LG G6',
            'quantity'      => 20,
            'price'         => 449,
            'description'   => 'Super Compact Flagship with unique dual camera setup',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Product::create([
            'product_name'  => 'Samsung Galaxy Note 8',
            'quantity'      => 60,
            'price'         => 899,
            'description'   => 'Ultimate experience of Samsung, refined with dual camera setup with live focus',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Product::create([
            'product_name'  => 'LG V30',
            'quantity'      => 20,
            'price'         => 799,
            'description'   => 'LG G6 refined with cinematographer like camera setup',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Product::create([
            'product_name'  => 'Google Pixel 2',
            'quantity'      => 15,
            'price'         => 649,
            'description'   => 'Best all rounder camera phone, now getting better with portrait mode',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Product::create([
            'product_name'  => 'Google Pixel 2 XL',
            'quantity'      => 18,
            'price'         => 749,
            'description'   => 'Best all rounder camera phone, gets better with portrait mode and ultra wide screen',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Product::create([
            'product_name'  => 'Huawei P10',
            'quantity'      => 25,
            'price'         => 449,
            'description'   => 'Experience Leica expertise in photography in a compact and thin form factor',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Product::create([
            'product_name'  => 'Xiaomi Mi 6',
            'quantity'      => 0,
            'price'         => 399,
            'description'   => 'Best value to performance phone gets better with dual camera setups',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Product::create([
            'product_name'  => 'Xiaomi Mi Note 3',
            'quantity'      => 2,
            'price'         => 449,
            'description'   => 'Bigger version of Mi 6, with perfection in imaging skills',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Product::create([
            'product_name'  => 'Sony Xperia XZ Premium',
            'quantity'      => 12,
            'price'         => 699,
            'description'   => 'The brilliant 4K screen, combined with flagship-grade camera',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Product::create([
            'product_name'  => 'Sony Xperia XZ Compact',
            'quantity'      => 7,
            'price'         => 599,
            'description'   => 'The king of compact flagship, gets better with 960fps camera',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }
}
