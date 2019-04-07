<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProducatorRequest;
use App\Http\Requests\CreateCompanieRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        
        return ['message' => 'Atestatul de Producator adaugat cu succes!'];
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
