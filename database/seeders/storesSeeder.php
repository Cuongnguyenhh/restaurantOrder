<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class storesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            $name = 'Nhà hàng số ' . $i;
            $address = 'Địa chỉ số ' . $i;
            $phone = '0912345678' . $i;
            $open_time = '10:00';
            $close_time = '22:00';

            $store = [
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'open_time' => $open_time,
                'close_time' => $close_time,
            ];

            // Insert store and get the inserted ID
            $storeID = DB::table('stores')->insertGetId($store);

            // Add table seeder
            for ($j = 1; $j <= 15; $j++) {
                $table = [
                    'name' => 'Bàn số' . $j,
                    'capacity' => rand(2, 10),
                    'status' => 'open',
                    'type' => 'outdoor',
                    'location' => 'first floor',
                    'description' => 'A nice table with a view',
                    'store_id' => $storeID, // Assign the store ID
                ];

                DB::table('tables')->insert($table);
            }
            //Add dishes Seeder


            // Create dishes for this store
            for ($k = 1; $k <=10; $k++) {
                $name = 'Món ăn số ' . $k;
                $description = 'Mô tả món ăn số ' . $k;
                $price = rand(100000, 500000);
                $image = 'https://via.placeholder.com/150x150';

                $dish = [
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'image' => $image,
                    'store_id' => $storeID,
                ];

                DB::table('dishes')->insert($dish);
            }
        }
    }
}
