<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PhoneNumber;

class PhoneNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    	$countries = [
    		['number'=>'+212520123456'],
    		['number'=>'216651588'],
    		['number'=>'520123456'],
    		['number'=>'+2563515156'],
    		['number'=>'+25821123456'],
    		['number'=>'+201091701810'],
    	];
    	foreach ($countries as $key => $value) {
    		# code...
        	PhoneNumber::create($value);
    	}
    }
}
