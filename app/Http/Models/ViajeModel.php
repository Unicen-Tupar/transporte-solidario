<?php

namespace App\Http\Models;

use PDO;

class ViajeModel extends Model
{


    /**
     * Create a new Navigation Model instance.
     *
     * @return void
     */
    public function __construct()
    {
      parent::__construct();
    }
    public function getViajes() {
      $consulta_return=[];

      $viajes=[];

      $sel_ong=$this->db->prepare("SELECT name FROM users u, viajesolidario v where not (u.name='admin') AND (v.habilitado) GROUP BY name");
      $sel_ong->execute();
      $ongs=$sel_ong->fetchAll(PDO::FETCH_ASSOC);
      $consulta_return['ongs']=$ongs;

      $sel_fre=$this->db->prepare("SELECT frecuencia FROM viajesolidario where (habilitado) GROUP BY frecuencia");
      $sel_fre->execute();
      $frecuencias=$sel_fre->fetchAll(PDO::FETCH_ASSOC);
      $consulta_return['frecuencias']=$frecuencias;

      $sel_dest=$this->db->prepare("SELECT destino FROM viajesolidario where (habilitado) GROUP BY destino");
      $sel_dest->execute();
      $destinos=$sel_dest->fetchAll(PDO::FETCH_ASSOC);
      $consulta_return['destinos']=$destinos;

      $select = $this->db->prepare("SELECT * FROM viajesolidario where habilitado");
      $select->execute();
      $auxViajes=$select->fetchAll(PDO::FETCH_ASSOC);
      foreach ($auxViajes as $key => $viaje) {
        $select2=$this->db->prepare("SELECT name, telefono, email, img_path FROM users where id LIKE ? ");
        $select2->execute(array($viaje['id_ong']));
        $usONG=$select2->fetchAll(PDO::FETCH_ASSOC);
        $viaje['name']=$usONG[0]['name'];
        $viaje['telefono']=$usONG[0]['telefono'];
        $viaje['email']=$usONG[0]['email'];
        $viaje['img_path']=$usONG[0]['img_path'];
        $viajes[]=$viaje;
      }
      $consulta_return['viajes']=$viajes;

      return $consulta_return;



      /*
      $viajes_return=[];
      $select = $this->db->prepare("SELECT * FROM viajesolidario ");
      $select->execute();
      $viajes=$select->fetchAll(PDO::FETCH_ASSOC);
      foreach ($viajes as $key => $viaje) {
        $select2=$this->db->prepare("SELECT name, telefono, email, img_path FROM users where id LIKE ? ");
        $select2->execute(array($viaje['id_ong']));
        $usONG=$select2->fetchAll(PDO::FETCH_ASSOC);
        $viaje['name']=$usONG[0]['name'];
        $viaje['telefono']=$usONG[0]['telefono'];
        $viaje['email']=$usONG[0]['email'];
        $viaje['img_path']=$usONG[0]['img_path'];
        $viajes_return[]=$viaje;
      }

      return $viajes_return;
    */
    }
}


/*
$consulta_return=[];

$viajes=[];

$sel_ong=$this->db->prepare("SELECT name FROM viajesolidario GROUP BY name")
$sel_ong->execute();
$ongs=$sel_ong->fetchAll(PDO::FETCH_ASSOC);
$consulta_return['ongs']=$ongs;

$sel_fre=$this->db->prepare("SELECT frecuencia FROM viajesolidario GROUP BY frecuencia")
$sel_fre->execute();
$frecuencias=$sel_fre->fetchAll(PDO::FETCH_ASSOC);
$consulta_return['frecuencias']=$frecuencias;

$sel_dest=$this->db->prepare("SELECT destino FROM viajesolidario GROUP BY destino")
$sel_dest->execute();
$destinos=$sel_dest->fetchAll(PDO::FETCH_ASSOC);
$consulta_return['destinos']=$destinos;

$select = $this->db->prepare("SELECT * FROM viajesolidario ");
$select->execute();
$auxViajes=$select->fetchAll(PDO::FETCH_ASSOC);
foreach ($auxViajes as $key => $viaje) {
  $select2=$this->db->prepare("SELECT name, telefono, email, img_path FROM users where id LIKE ? ");
  $select2->execute(array($viaje['id_ong']));
  $usONG=$select2->fetchAll(PDO::FETCH_ASSOC);
  $viaje['name']=$usONG[0]['name'];
  $viaje['telefono']=$usONG[0]['telefono'];
  $viaje['email']=$usONG[0]['email'];
  $viaje['img_path']=$usONG[0]['img_path'];
  $viajes[]=$viaje;
}
$consulta_return['viajes']=$viajes;

return $consulta_return;


*/
