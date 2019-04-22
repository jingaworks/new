<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class AtestatController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setAtestat(Request $request)
    {
        $titular = $request->titular;
        $serie = $request->serie;
        $numar = $request->numar;
        $region = $request->region;
        $place = $request->place;

        $img = Image::make(storage_path('app/base/atestat.jpg'));

        $img->text($serie, 530, 407, function($font) {
            $font->file(storage_path('app/base/EuropeanTypewriter.ttf'));
            $font->align('center');
            $font->valign('top');
            $font->size(45);
        });
        $img->text($numar, 725, 407, function($font) {
            $font->file(storage_path('app/base/EuropeanTypewriter.ttf'));
            $font->align('center');
            $font->valign('top');
            $font->size(45);
        });
        $img->text($place, 575, 270, function($font) {
            $font->file(storage_path('app/base/giconfl.ttf'));
            $font->align('center');
            $font->valign('top');
            $font->size(55);
        });

        $img->text($region, 925, 270, function($font) {
            $font->file(storage_path('app/base/giconfl.ttf'));
            $font->align('center');
            $font->valign('top');
            $font->size(55);
        });

        $img->text($titular, 800, 565, function($font) {
            $font->file(storage_path('app/base/giconfl.ttf'));
            $font->align('center');
            $font->valign('top');
            $font->size(50);
        });

        $img->text($region, 490, 615, function($font) {
            $font->file(storage_path('app/base/giconfl.ttf'));
            $font->align('center');
            $font->valign('top');
            $font->size(48);
        });

        $img->text($place, 875, 615, function($font) {
            $font->file(storage_path('app/base/giconfl.ttf'));
            $font->align('center');
            $font->valign('top');
            $font->size(48);
        });
        
        $img->text($titular, 340, 915, function($font) {
            $font->file(storage_path('app/base/giconfl.ttf'));
            $font->align('center');
            $font->valign('top');
            $font->size(48);
        });

        $img->text($region, 859, 915, function($font) {
            $font->file(storage_path('app/base/giconfl.ttf'));
            $font->align('center');
            $font->valign('top');
            $font->size(48);
        });

        $img->text($place, 1200, 915, function($font) {
            $font->file(storage_path('app/base/giconfl.ttf'));
            $font->align('center');
            $font->valign('top');
            $font->size(48);
        });

        $user = $request->user();
        $img->save(storage_path('app/public/atestate/' . $user->id . '.jpg'));
    
        return ['link' => $user->id . '.jpg'];
    }

}
