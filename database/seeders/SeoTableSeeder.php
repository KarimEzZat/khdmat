<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;

class SeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Seo::create([
            'author' => 'موقع خدمات',
            'title' => 'موقع خدمات المنازل الشاملة بالسعودية',
            'description' => 'موقع خدمات تقدم خدمات شاملة ومتنوعة بكافة أحياء ومدن المملكة العربية السعودية لمنزل متكامل ومميز',
            'keywords' => '',
            'site_name' => 'موقع خدمات - تقديم خدمات المنازل شاملة بالسعودية',
            'image_alt' => 'موقع خدمات المنازل الشاملة والمميزة بالسعودية',
        ]);
    }
}
