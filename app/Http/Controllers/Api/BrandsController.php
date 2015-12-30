<?php

namespace App\Http\Controllers\Api;

use App\Brand;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    public function index()
    {
        return Brand::all();
    }

    public function visible()
    {
        return Brand::Visible()->get();
    }

    public function update(Brand $brand, Request $request)
    {   
        $brand->alternate = $request->alternate;
        $brand->visible = $request->visible;

        $brand->save();

        return ['message' => 'Brand update successful !'];
    }

    public function upload(Request $request)
    {
        Brand::create([
            'logo' => $this->UploadAndNameImage($request),
            'visible' => false
        ]);

    }

    private function UploadAndNameImage(Request $request)
    {
        $file = $request->file('file');

        $file->move('images/brands', $file->getClientOriginalName());

        return $file->getClientOriginalName();
    }
}
