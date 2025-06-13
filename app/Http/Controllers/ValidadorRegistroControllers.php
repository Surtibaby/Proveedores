<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;


class ValidadorRegistroControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $user = DB::table('users')
            ->select('users.*')
            ->where('nit', Auth::user()->nit)
            ->get();

        $cuentas = DB::table('cuentas')
            ->select('cuentas.*')
            ->where('nit', Auth::user()->nit)
            ->get();

        $contactos = DB::table('contactos')
            ->select('contactos.*')
            ->where('nit', Auth::user()->nit)
            ->get();

        if (count($contactos) > 2) {
        } else {
            FacadesAlert::warning('Falta informacion por llenar', 'Sección: Datos Basico');
            return redirect(url('datos-basicos/s54da645d'));
        }

        if (count($cuentas) > 0) {
        } else {
            FacadesAlert::warning('Falta informacion por llenar', 'Sección: Datos Bancarios');
            return redirect(url('cuentas-bancarias/g4s89gs6'));
        }

        if ($user[0]->camara_comercio == null) {
            FacadesAlert::warning('Falta informacion por llenar', 'Camara de Comercio');
            return redirect(url('datos-basicos/s54da645d'));
        }

        User::where('nit', $id)->update([
            'estado' => 'ONLINE',
        ]);

        FacadesAlert::success('Datos gurdados con Exito');
        return redirect(url('datos-basicos'));
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
