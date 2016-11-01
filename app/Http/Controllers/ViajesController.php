<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
          return array(
            'id' => 1,
            'partida' => 'Tandil',
            'destino' => 'Tandil',
            'ONG' => 'Mesa Solidaria'
          );
        }


    public function addViaje(Request $request){
      $partida = $request->input('partida');
      //REPOSITORIO
      return array(
        'id' => 'nuevo id',
        'partida' => $partida
      );
    }

    //
}
