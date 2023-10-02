<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('customer_data.json');
        $data = json_decode($json,true);

        foreach ($data as $item) {
            Customer::create($item);
        }
    }
}
