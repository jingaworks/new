<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProducatorRequest;
use App\Http\Requests\CreateCompanieRequest;
use Intervention\Image\ImageManagerStatic as Image;


class RegisterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProducator()
    {
        return view('inregistrare.producator.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateProducatorRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProducator(CreateProducatorRequest $request)
    {
        auth()->user()->producator()->create($request->all());
        
        return redirect()->route('dashboard')->with('status', 'Atestatul de Producator adaugat cu succes!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCompanie()
    {
        return view('inregistrare.companie.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateCompanieRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCompanie(CreateCompanieRequest $request)
    {
        auth()->user()->producator->companie()->create($request->all());
        
        return ['message' => 'Companie adaugata cu succes'];
    }
}
