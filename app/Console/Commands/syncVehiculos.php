<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Vehiculo;
use Carbon\Carbon;


class syncVehiculos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:vehiculos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sincronización entre Quadminds API y Web Service Externo AVL SAN LUIS';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Buscamos los vehiculos
        $vehiculos = DB::table('vehiculos')->get();

        foreach($vehiculos as $vehiculo){

            // Vamos a consultar la API de Quadminds
                $headers = [
                    'accept' => 'application/json',
                    'x-saas-apikey' => 'D0Gi166N20Bqnrp5sA5uUOTqvOgP00x5CkphX2kL',
                ];

                $client = new \GuzzleHttp\Client([
                    'headers' => $headers
                ]);

                $urlApi = 'https://saas.quadminds.com/api/v2/vehicles/'.$vehiculo->quadminds_vehiculo_id;

                $apiRequest = $client->request('GET', $urlApi);

                $vehiculoInfo = json_decode($apiRequest->getBody(), true);
                
            // Prueba de datos
            // echo 'Vehículo '.$vehiculo->patente.' : '.$vehiculoInfo['data']['latitude'] .' , '. $vehiculoInfo['data']['longitude'] .' , '. $vehiculoInfo['data']['locationTimestamp'] .' </br>';
                
            // Guardamos una copia de los datos tomados a Quadminds
                $vehiculoUpdate = Vehiculo::find($vehiculo->id);
                $vehiculoUpdate->timestamp_post = $vehiculoInfo['data']['locationTimestamp'];
                $vehiculoUpdate->lat = $vehiculoInfo['data']['latitude'];
                $vehiculoUpdate->long = $vehiculoInfo['data']['longitude'];
                $vehiculoUpdate->ultimo_post = Carbon::now()->toDateTimeString();
                $vehiculoUpdate->save();

            
            // Vamos a enviar los datos a el Web Service AVL San Luis
                $clientSL = new \GuzzleHttp\Client();

                $fecha = explode("T", $vehiculoInfo['data']['locationTimestamp']);
                $fechaExploded = date("d/m/Y", strtotime($fecha[0]));
                $horaExploded = date("H:i:s", strtotime($fecha[1]));

                $fechaFinal = $fechaExploded .' '.$horaExploded;

                $urlApiSL = 'http://wsexternosavl.sanluis.gob.ar/Servicios/RegistrarPosicion/?fl='. $vehiculo->fl .'&sfl='. $vehiculo->sfl .'&nombre='. $vehiculo->nombre .'&patente='. $vehiculo->patente .'&fecha='. $fechaFinal .'&lat='. $vehiculoInfo['data']['latitude'] .'&lon='. $vehiculoInfo['data']['longitude'];
                
                $apiSLRequest = $clientSL->request('GET', $urlApiSL);
                
                $resultadoSL = json_decode($apiSLRequest->getBody(), true);
                
                $vehiculoUpdate->msjPost =  $resultadoSL['msj'];
                $vehiculoUpdate->save();

                // Prueba de resultado post SL: echo $resultadoSL['msj'] . '</br>';
        }
    }
}
