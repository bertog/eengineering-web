<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{

    public function upload()
    {
        return view('brands.upload');
    }

    public function manager()
    {
        return view('brands.brands_manager');
    }
}
