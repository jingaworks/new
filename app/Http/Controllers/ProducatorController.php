<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProducatorRequest;
use App\Http\Requests\UpdateProducatorRequest;

class ProducatorController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = auth()->user()->producator;

        return view('cont.producator.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = auth()->user()->producator;
        
        if(!$data)
            return redirect()->route('cont.adauga.producator')->with('status', 'Adauga date Companie');

        return view('cont.producator.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDataForm()
    {
        $data = auth()->user()->producator->only(['titular', 'serie', 'numar', 'region', 'place', 'viza', 'phone', 'verified']);

        return ['producator' => $data];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProducatorRequest $request)
    {
        $producator = auth()->user()->producator;

        $producator->update($request->all());

        return ['message' => 'Atestat Producator editat cu succes'];
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
