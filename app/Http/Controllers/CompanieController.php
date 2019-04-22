<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanieRequest;
use App\Http\Requests\UpdateCompanieRequest;

class CompanieController extends Controller
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
    public function create()
    {
        //
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
    public function show()
    {
        $data = auth()->user()->producator->companie;

        if(!$data)
            return redirect()->route('cont.adauga.companie')->with('status', 'Adauga date Companie');

        return view('cont.companie.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = auth()->user()->producator->companie;
        return view('cont.companie.edit', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDataForm()
    {
        $data = auth()->user()->producator->companie->only(['name', 'cui', 'phone', 'region', 'place', 'address', 'verified']);

        return ['companie' => $data];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanieRequest $request)
    {
        $companie = auth()->user()->producator->companie;
        if ($companie->verified) {
            $companie->update($request->only(['phone','region','place','address']));
        } else {
            $companie->update($request->all());
        }

        return ['message' => 'Date companie editate cu succes'];
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
