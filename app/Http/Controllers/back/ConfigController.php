<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Config;
use File;

class ConfigController extends Controller
{
    public function index()
    {
        $crumbs=[
            'Parametrlər'=>route('admin.config')
        ];
        $title='Parametrlər';
        $config=Config::first();
        return view('back.config',compact('title','crumbs','config'));
    }

    public function update($id)
    {
        $config=Config::find($id);
        $config->location=request('location');
        $config->email=request('email');
        $config->mobil_1=request('mobil_1');
        $config->mobil_2=request('mobil_2');
        $config->facebook=request('facebook');
        $config->instagram=request('instagram');
        $config->youtube=request('youtube');

        if (request()->hasFile('photo')) {
            $photo = request()->file('photo');

            if ($photo->isValid()) {
                $file_name =rand(0, 999) . time() . '.' . $photo->extension();
                $photo->move('uploads/logo', $file_name);
                $last_image_path = public_path("/uploads/logo/$config->logo"); // Value is not URL but directory file path
                if(File::exists($last_image_path)) {
                    File::delete($last_image_path);
                }
                $config->logo=$file_name;
            }

        }

        $config->save();

        return redirect()
            ->route('admin.config')
            ->with('type','success')
            ->with('mesaj','Dəyişikliklər yerinə yetirildi');
    }
}
