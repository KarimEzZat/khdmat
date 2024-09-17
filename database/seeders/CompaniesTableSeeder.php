<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Company::create([
            'name' => 'شركة خــدماتــــــ',
            'location' => 'السعودية',
            'photo' => 'about.jpg',
            'short_description' => '',
            'description' => '',
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'phone' => '966546653976'
        ]);
    }
}
