<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;

class ProduseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user()->producator->produse()->with('category')->get()->groupBy('category.nume');
        return view('cont.produse.index', compact(['data']));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current = auth()->user()->producator->produse()->pluck('id')->toArray();
        $data = Category::with('subcategorii')->get();
        return view('cont.produse.create', compact(['current', 'data']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {
        $category = Category::findOrfail($request->category);
        $category->subcategorii()->create([
            'nume' => $request->nume,
            'slug' => str_slug($request->nume),
            'descriere' => 'added with Vue',
            'user_id' => auth()->user()->id
        ]);

        return $request->nume . ' a fost adaugat cu succes!';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('cont.produse.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOwn()
    {
        $all = auth()->user()->producator->subcategorii;
        $subcategorii = Subcategory::where('user_id', auth()->user()->id)->doesntHave('producator')->get();
        return view('cont.settings.subcategory', compact(['subcategorii', 'all']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function json()
    {
        $current = auth()->user()->producator->produse;
        $categories = Category::with('subcategorii')->get();
        return ['categories' => $categories, 'current' => $current];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduse(Request $request)
    {
        $user = auth()->user();
        $user->producator->produse()->sync($request->produse);
        if ($request->current) {
            $current = Subcategory::find($request->current)->first();
        }
        
        if (in_array($request->current['_value'], $request->produse))
            return $request->current ? ['new' => true, 'msg' => $current['nume'] . ' a fost adaugat la produsele oferite!'] : '';

        return $request->current ? ['new' => false, 'msg' => $current['nume'] . ' a fost scos din produsele oferite!'] : '';
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
