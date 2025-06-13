<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CardInfo extends Component
{

    public $boton;

    public function render()
    {
        $proveedor = DB::table('users')
            ->select('users.*')
            ->where('users.nit', Auth::user()->nit)
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
            $contactosValidador = 1;
        } else {
            $contactosValidador = 0;
        }

        if (count($cuentas) > 0) {
            $cuentasValidador = 1;
        } else {
            $cuentasValidador = 0;
        }

        $validadorDatos = $cuentasValidador + $contactosValidador;

        return view('livewire.card-info', [
            'proveedor' => $proveedor[0],
            'contactosValidador' => $contactosValidador,
            'cuentasValidador' => $cuentasValidador,
            'validadorDatos' => $validadorDatos,
        ]);
    }
}
