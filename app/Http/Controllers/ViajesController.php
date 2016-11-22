<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\viajeModel;

class ViajesController extends Controller
{

    protected $model;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->model = new ViajeModel;
        //
    }

    public function getViaje($id){
      return array(
        'id' => $id,
        'partida' => 'Tandil',
        'destino' => 'Tandil',
        'ONG' => 'Mesa Solidaria'
      );
    }

  public function getViajes(){
          $var=new \stdClass;
          $var->data=$this->model->getViajes();
                      /*  array(array(
            'id' => 1,
            'partida' => 'Tandil',
            'destino' => 'Tandil',
            'ONG' => 'Mesa Solidaria'),
            array(
            'id' => 2,
            'partida' => 'Tandil',
            'destino' => 'Tandil',
            'ONG' => 'Mesa Solidaria')
          );*/
          return json_encode($var);


        }

    // [Auth]
    public function addViaje(Request $request){
      $partida = $request->input('partida');
      //REPOSITORIO
      return array(
        'id' => 'nuevo id',
        'partida' => $partida
      );
    }

    public function getViajesRealizados($orden,$estado){
            $var=new \stdClass;
            $var->data=$this->model->getViajesRealizados($orden,$estado);
            return json_encode($var);

          }
    //
}
