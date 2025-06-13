<?php

namespace App\Console\Commands;

use App\Models\Contactos;
use App\Models\Cuentas;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProveedorTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:proveedor-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $ultimoR = User::latest('fecha_modificacion')->first();
        $date = date_create($ultimoR['fecha_modificacion']);
        $result = date_format($date, 'Y-m-d\TH:i:s');

        $date2 = strtotime('+1 second', strtotime($ultimoR['fecha_modificacion']));
        $result2 = date('Y-m-d\TH:i:s', $date2);

        //$url = 'http://181.49.246.202:8582';
        $url = 'http://172.16.0.217:8582';

        try {
            $response = Http::post($url . '/api/login/authenticate?user=BabyAdmin&pass=rG!3*-.20mKi9)=');
            if ($response->successful()) {

                $response2 = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $response->json()
                ])->post($url . '/api/supplier/consultarproveedoresfechanew?empresa=1&fecha=' . $result2);
                $proveedores = json_decode($response2->getBody());
                $proveedores = json_encode($proveedores);
                return $proveedores;
            } else {
            }
        } catch (RequestException $e) {
        } catch (\Exception $e) {
        }

        /////
        if ($proveedores[0] == '[') {
            $proveedores = json_decode($proveedores);
        }

        //return $proveedores;

        foreach ($proveedores as $proveedor) {

            DB::table('users')->where('nit', $proveedor->NITPROVEEDOR)->delete();

            $clave = str_replace(' ', '', $proveedor->CLAVE);
            $proveedorAdd = User::updateOrCreate([
                'nit'   => $proveedor->NITPROVEEDOR,
            ], [
                'name'   => $proveedor->RAZONSOCIAL,
                'razon_social'   => $proveedor->RAZONSOCIAL,
                'representante_legal'   => $proveedor->REPRESENTANTELEGAL,
                'marca'   => $proveedor->MARCA,
                'telefono_representante'     => $proveedor->TELEFONOREPRELEGAL,
                'celular_representante'     => $proveedor->CELULARREPRELEGAL,
                'email'     => $proveedor->EMAILREPRELEGAL,
                'password'     => Hash::make($clave),
                'direccion_principal'   =>  $proveedor->DIRECCIONOFICINAPPAL,
                'ciudad_principal'   => $proveedor->CIUDADOFICINAPPAL,
                'telefono_principal'   => $proveedor->TELEFONOOFICINAPPAL,
                'nota_estado'   => $proveedor->NOTAESTADO,
                'fecha_modificacion' => now()->createFromFormat("d/m/Y H:i:s", $proveedor->FECHADEMODIFICACION),
                'fecha_creacion' => now()->createFromFormat("d/m/Y H:i:s", $proveedor->FECHACREACION),
                'estado' => $proveedor->ESTADO,
                'rut' => $proveedor->FOTORUT,
                'cedula' => $proveedor->FOTOCEDULA,
                'camara_comercio' => $proveedor->FOTOCCOMERCIO,
                'fecha_comparativa' => $proveedor->FECHADEMODIFICACION,
            ]);

            foreach ($proveedor->CONTACTOS as $contacto) {
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

            foreach ($proveedor->CUENTAS as $cuenta) {

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
            }
        }

        $texto = "[" . date("Y-m-d H:i:s") . "]" . ": Ejecutado";
        Storage::append("Logs-" . date("Y-m") . ".txt", $texto);
    }
}
