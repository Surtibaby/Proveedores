<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class DatosBasicosControllers extends Controller
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

        $contactoVenta = DB::table('contactos')
            ->select('contactos.*')
            ->where('contactos.departamento', 'VENTAS')
            ->where('contactos.nit', Auth::user()->nit)
            ->get();

        $contactoCartera = DB::table('contactos')
            ->select('contactos.*')
            ->where('contactos.departamento', 'CARTERA')
            ->where('contactos.nit', Auth::user()->nit)
            ->get();

        $contactoBodega = DB::table('contactos')
            ->select('contactos.*')
            ->where('contactos.departamento', 'BODEGA')
            ->where('contactos.nit', Auth::user()->nit)
            ->get();

        if ($contactoVenta == '[]') {
            $contactoVenta = '{"nombre_contacto":"Sin datos","celular_contacto":"Debe actulizar datos","email_contacto":"Sin datos","direccion_contacto":"Sin datos"}';
            $contactoVenta = json_decode($contactoVenta);
        } else {
            $contactoVenta = $contactoVenta[0];
        }

        if ($contactoCartera == '[]') {
            $contactoCartera =  '{"nombre_contacto":"Sin datos","celular_contacto":"Debe actulizar datos","email_contacto":"Sin datos","direccion_contacto":"Sin datos"}';
            $contactoCartera = json_decode($contactoCartera);
        } else {
            $contactoCartera = $contactoCartera[0];
        }

        if ($contactoBodega == '[]') {
            $contactoBodega =  '{"nombre_contacto":"Sin datos","celular_contacto":"Debe actulizar datos","email_contacto":"Sin datos","direccion_contacto":"Sin datos"}';
            $contactoBodega = json_decode($contactoBodega);
        } else {
            $contactoBodega = $contactoBodega[0];
        }

        return view('informacionG.datosB.index', [
            'proveedor' => $proveedor[0],
            'contactoVenta' => $contactoVenta,
            'contactoCartera' => $contactoCartera,
            'contactoBodega' => $contactoBodega,
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
        if ($request->camaraComercio == null) {
        } else {
            // Guardar Camara de comercio PDF 
            $pdfRut = $request->file('camaraComercio');
            $pdfRut_name = 'camara_comercio' . Auth::user()->nit . '.pdf';
            $destinationPath = base_path('storage/app/public/pdf');
            $pdfRut->move($destinationPath, $pdfRut_name);

            $file = storage_path() . '/app/public/pdf/camara_comercio' . Auth::user()->nit . '.pdf';
            $camara_comercio = base64_encode(file_get_contents($file));

            User::updateOrCreate([
                'nit'   => Auth::user()->nit,
            ], [
                'camara_comercio'   =>  $camara_comercio,
            ]);
        }



        Contactos::updateOrCreate(
            ['nit' => Auth::user()->nit, 'departamento' => 'BODEGA'],
            [
                'proveedor_id' => Auth::user()->id,
                'nit' => Auth::user()->nit,
                'nombre_contacto'     => $request->nombreContactoBodega,
                'celular_contacto'     => $request->celularContactoBodega,
                'direccion_contacto'   =>  $request->direccionContactoBodega,
                'email_contacto'   =>  $request->emailContactoBodega,
                'departamento'   => 'BODEGA',
            ]
        );


        Contactos::updateOrCreate(
            ['nit' => Auth::user()->nit, 'departamento' => 'CARTERA'],
            [
                'proveedor_id' => Auth::user()->id,
                'nit' => Auth::user()->nit,
                'nombre_contacto'     => $request->nombreContactoCartera,
                'celular_contacto'     => $request->celularContactoCartera,
                'direccion_contacto'   =>  $request->direccionContactoCartera,
                'email_contacto'   =>  $request->emailContactoCartera,
                'departamento'   => 'CARTERA',
            ]
        );

        Contactos::updateOrCreate(
            ['nit' => Auth::user()->nit, 'departamento' => 'VENTAS'],
            [
                'proveedor_id' => Auth::user()->id,
                'nit' => Auth::user()->nit,
                'nombre_contacto'     => $request->nombreContactoVenta,
                'celular_contacto'     => $request->celularContactoVenta,
                'direccion_contacto'   =>  $request->direccionContactoVenta,
                'email_contacto'   =>  $request->emailContactoVenta,
                'departamento'   => 'VENTAS',
            ]
        );

        FacadesAlert::success('Datos Preguardados', 'Asegúrate de verificar la siguiente información antes de actualizar todos los datos.');
        return redirect(url('cuentas-bancarias/g4s89gs6'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {



        $proveedor = DB::table('users')
            ->select('users.*')
            ->where('users.nit', Auth::user()->nit)
            ->get();

        if ($proveedor[0]->estado == 'CREACION BASICA') {


            $ciudades = DB::table('ciudades')
                ->select('ciudades.*')
                ->get();

            $contactoVenta = DB::table('contactos')
                ->select('contactos.*')
                ->where('contactos.departamento', 'VENTAS')
                ->where('contactos.nit', Auth::user()->nit)
                ->get();

            $contactoCartera = DB::table('contactos')
                ->select('contactos.*')
                ->where('contactos.departamento', 'CARTERA')
                ->where('contactos.nit', Auth::user()->nit)
                ->get();

            $contactoBodega = DB::table('contactos')
                ->select('contactos.*')
                ->where('contactos.departamento', 'BODEGA')
                ->where('contactos.nit', Auth::user()->nit)
                ->get();

            if ($contactoVenta == '[]') {
                $contactoVenta = '{"nombre_contacto":"null","celular_contacto":"null","email_contacto":"null","direccion_contacto":"null"}';
                $contactoVenta = json_decode($contactoVenta);
            } else {
                $contactoVenta = $contactoVenta[0];
            }

            if ($contactoCartera == '[]') {
                $contactoCartera =  '{"nombre_contacto":"null","celular_contacto":"null","email_contacto":"null","direccion_contacto":"null"}';
                $contactoCartera = json_decode($contactoCartera);
            } else {
                $contactoCartera = $contactoCartera[0];
            }

            if ($contactoBodega == '[]') {
                $contactoBodega =  '{"nombre_contacto":"null","celular_contacto":"null","email_contacto":"null","direccion_contacto":"null"}';
                $contactoBodega = json_decode($contactoBodega);
            } else {
                $contactoBodega = $contactoBodega[0];
            }

            return view('informacionG.datosB.show', [
                'proveedor' => $proveedor[0],
                'ciudades' => $ciudades,
                'contactoVenta' => $contactoVenta,
                'contactoCartera' => $contactoCartera,
                'contactoBodega' => $contactoBodega,
            ]);
        } else {
            FacadesAlert::error('Error, No puede actualizar los datos', 'Póngase en contacto con nuestra asesora');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
