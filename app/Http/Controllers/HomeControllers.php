<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Contactos;
use App\Models\Cuentas;
use App\Models\Negociacion;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class HomeControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ultimoR = User::latest('fecha_modificacion')->first();
        $date = date_create($ultimoR['fecha_modificacion']);
        $result = date_format($date, 'Y-m-d\TH:i:s');

        $date2 = strtotime('+1 second', strtotime($ultimoR['fecha_modificacion']));
        $result2 = date('Y-m-d\TH:i:s', $date2);

        //$url = 'http://181.49.246.202:8582';
        $url = 'http://172.16.0.217:8582';

        $response = Http::post($url . '/api/login/authenticate?user=BabyAdmin&pass=rG!3*-.20mKi9)=');

        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer ' . $response->json()
        ])->post($url . '/api/supplier/consultarproveedoresfechanew?empresa=1&fecha=' . $result2);
        $proveedores = json_decode($response2->getBody());
        $proveedores = json_encode($proveedores);

        if ($proveedores[0] == '[') {

            $proveedores = json_decode($proveedores);

            foreach ($proveedores as $proveedor) {



                DB::table('users')->where('nit', $proveedor->Nit)->delete();

                $clave = str_replace(' ', '', $proveedor->Clave);

                $proveedorAdd = User::updateOrCreate([
                    'nit'   => $proveedor->Nit,
                ], [
                    'name'   => $proveedor->RazonSocial,
                    'razon_social'   => $proveedor->RazonSocial,
                    'representante_legal'   => $proveedor->RepresentanteLegal,
                    'marca'   => $proveedor->Marca,
                    'telefono_representante'     => $proveedor->CelularEmpresa,
                    'celular_representante'     => $proveedor->CelularEmpresa,
                    'email'     => $proveedor->Email,
                    'email_alternativo'     => $proveedor->EmailAlternativo,
                    'password'     => Hash::make($clave),
                    'direccion_principal'   =>  $proveedor->DireccionEmpresa,
                    'ciudad_principal'   => $proveedor->Ciudad,
                    'nota_estado'   => $proveedor->NotaEstado,
                    'fecha_modificacion' => now()->createFromFormat("d/m/Y H:i:s", $proveedor->FechaModificacion),
                    'fecha_creacion' => now()->createFromFormat("d/m/Y H:i:s", $proveedor->FechaCreacion),
                    'estado' => $proveedor->Estado,
                    'fecha_comparativa' => (string) $proveedor->FechaModificacion,
                ]);

                $proveedorAdd = User::updateOrCreate([
                    'nit'   => $proveedor->Nit,
                ], [
                    'rut' => (string) $proveedor->FotoRut,
                ]);


                $proveedorAdd = User::updateOrCreate([
                    'nit'   => $proveedor->Nit,
                ], [

                    'camara_comercio' => (string) $proveedor->FotoCComercio,
                ]);


                Negociacion::updateOrCreate([
                    'nit'   => $proveedor->Nit,
                ], [
                    'proveedor_id'   => $proveedorAdd->id,
                    'regimen_impuestos_venta'   => $proveedor->RegimenImpuestosVenta,
                    'iva_incluido'   => $proveedor->IvaIncluido,
                    'por_descuento'   => $proveedor->PorDescuento,
                    'plazo_descuento'   => $proveedor->PlazoDescuento,
                    'detalles_descuento'   => $proveedor->DetallesDescuento,
                    'dto_pie_factura'     => $proveedor->DtoPieFactura,
                    'genera_guia'     => $proveedor->GeneraGuia,
                    'flete_100_proveedor'     => $proveedor->Flete100Proveedor,
                    'flete_100_empresa'     => $proveedor->Flete100Empresa,
                    'flete_50_50'     => $proveedor->Flete50_50,
                    'plazo_garantia_tienda'     => $proveedor->PlazoGarantiaTienda,
                    'condiciones_garantia_tienda'     => $proveedor->CondicionesGarantiaTienda,
                    'plazo_garantia_cliente'     => $proveedor->PlazoGarantiaCliente,
                    'condiciones_garantia_cliente'     => $proveedor->CondicionesGarantiaCliente,
                    'tipo_retiro'     => $proveedor->TipoRetiro,
                    'nombre_transportadora'     => $proveedor->NombreTransportadora,
                    'convenio_transportadora'     => $proveedor->ConvenioTransportadora,

                ]);


                foreach ($proveedor->Contactos as $contacto) {
                    Contactos::updateOrCreate([
                        'contacto_id'   => $contacto->CODCONTACTO,

                    ], [
                        'nit'   => $contacto->NITPROVEEDOR,
                        'proveedor_id'   => $proveedorAdd->id,
                        'nombre_contacto'   => $contacto->NOMBRECONTACTO,
                        'celular_contacto'   => $contacto->CELULARCONTACTO,
                        'email_contacto'   => $contacto->EMAILCONTACTO,
                        'departamento'     => $contacto->DEPARTAMENTO,
                        'fecha_creacion'     => $contacto->FECHACREACION,
                        'fecha_modificacion'     => $contacto->FECHAMODIFICADO,
                    ]);
                }

                foreach ($proveedor->Cuentas as $cuenta) {

                    Cuentas::updateOrCreate([
                        'cuenta_id'   => $cuenta->CODBANCARIO,

                    ], [
                        'nit'   => $cuenta->NITPROVEEDOR,
                        'proveedor_id'   => $proveedorAdd->id,
                        'banco'   => $cuenta->BANCO,
                        'numero_cuenta'   => $cuenta->NUMEROCUENTA,
                        'numero_convenio'   => $cuenta->NUMCONVENIO,
                        'titular_cuenta'   => $cuenta->NOMBRETITULARCUENTA,
                        'tipo_cuenta'     => $cuenta->TIPOCUENTA,
                        'formato'     => $cuenta->FORMATO,
                        'observaciones'     => $cuenta->OBSERVACIONES,
                        'cuenta_base64'     => $cuenta->IMGCUENTA,
                        'fecha_creacion'     => $cuenta->FECHACREACION,
                        'fecha_modificacion'     => $cuenta->FECHAMODIFICADO,
                    ]);

                    Cuentas::updateOrCreate([
                        'cuenta_id'   => $cuenta->CODBANCARIO,

                    ], [
                        'cuenta_base64'     => $cuenta->IMGCUENTA,
                    ]);
                }
            }
        }


        return view('dashboard');
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
