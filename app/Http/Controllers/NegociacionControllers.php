<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NegociacionControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedor = DB::table('users')
            ->select('users.*')
            ->where('users.nit', Auth::user()->nit)
            ->get();

            $negociacion = DB::table('negociacions')
            ->select('negociacions.*')
            ->where('negociacions.nit', Auth::user()->nit)
            ->get();

        return view('informacionG.negociacion.index', [
            'proveedor'  => $proveedor[0],
            'negociacions'  => $negociacion,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
