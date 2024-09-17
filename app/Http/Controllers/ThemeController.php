<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ThemeController extends Controller
{
    //
    public function index()
    {
        return view('theme.landing', [
            'services' => Service::latest()->get()
        ]);
    }
}
