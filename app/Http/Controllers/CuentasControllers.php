<?php

namespace App\Http\Controllers;

use App\Models\Cuentas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class CuentasControllers extends Controller
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

        $cuentas = DB::table('cuentas')
            ->select('cuentas.*')
            ->where('nit', Auth::user()->nit)
            ->get();

        return view('informacionG.cuentasB.index', [
            'proveedor' => $proveedor[0],
            'cuentas' => $cuentas,
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

        $validadorCuenta = DB::table('cuentas')
            ->select('cuentas.*')
            ->where('numero_cuenta', $request->numeroCuenta)
            ->get();


        if ($validadorCuenta == '[]') {
            // Guardar certificado PDF 
            $pdfCertificado = $request->file('certificado');
            $pdfCertificado_name = 'certificado' . $request->numeroCuenta . '.pdf';
            $destinationPath = base_path('storage/app/public/pdf');
            $pdfCertificado->move($destinationPath, $pdfCertificado_name);

            $file = storage_path() . '/app/public/pdf/certificado' . $request->numeroCuenta . '.pdf';
            $certificado = base64_encode(file_get_contents($file));

            Cuentas::updateOrCreate([
                'numero_cuenta'   => $request->numeroCuenta,
            ], [
                'proveedor_id' => Auth::user()->id,
                'nit' => Auth::user()->nit,
                'banco'     => $request->banco,
                'numero_convenio'   =>  $request->numeroConvenio,
                'titular_cuenta'   => $request->titularCuenta,
                'tipo_cuenta'   =>  $request->tipoCuenta,
                'formato'   =>  $request->formatoCuenta,
                'observaciones'   =>  $request->tipoDocumento,
                'cuenta_base64'   =>  $certificado,

            ]);

            FacadesAlert::success('Cuenta Bancaria Agregada');
            return back();
        } else {
            FacadesAlert::error('Error Cuenta Bancaria', 'ya existe el numero de la cuenta bancaria');
            return back();
        }
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
        $cuentas = DB::table('cuentas')
            ->select('cuentas.*')
            ->where('nit', Auth::user()->nit)
            ->get();

        $bancos = DB::table('bancos')
            ->select('bancos.*')
            ->get();

        if ($proveedor[0]->estado == 'CREACION BASICA') {

            return view('informacionG.cuentasB.show', [
                'proveedor' => $proveedor[0],
                'cuentas' => $cuentas,
                'bancos' => $bancos,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $pdf = $request->all();

        $validadorCuenta = DB::table('cuentas')
            ->select('cuentas.*')
            ->where('id', $id)
            ->get();

        if (array_key_exists('certificado', $pdf)) {
            // Guardar certificado PDF 
            $pdfCertificado = $request->file('certificado');
            $pdfCertificado_name = 'certificado' . $request->numeroCuenta . '.pdf';
            $destinationPath = base_path('storage/app/public/pdf');
            $pdfCertificado->move($destinationPath, $pdfCertificado_name);

            $file = storage_path() . '/app/public/pdf/certificado' . $request->numeroCuenta . '.pdf';
            $certificado = base64_encode(file_get_contents($file));
        } else {
            $certificado = $validadorCuenta[0]->cuenta_base64;
        }


        Cuentas::updateOrCreate([
            'id'   => $id,
        ], [
            'numero_cuenta'   => $request->numeroCuenta,
            'proveedor_id' => Auth::user()->id,
            'nit' => Auth::user()->nit,
            'banco'     => $request->banco,
            'numero_convenio'   =>  $request->numeroConvenio,
            'titular_cuenta'   => $request->titularCuenta,
            'tipo_cuenta'   =>  $request->tipoCuenta,
            'formato'   =>  $request->formatoCuenta,
            'observaciones'   =>  $request->tipoDocumento,
            'cuenta_base64'   =>  $certificado,

        ]);

        FacadesAlert::success('Cuenta Bancaria Actualizada');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cuenta = Cuentas::find($id);
        $cuenta->delete();

        FacadesAlert::success('Cuenta Bancaria Eliminada');
        return back();
    }
}
