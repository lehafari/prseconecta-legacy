<?php

class PropertysModel extends Mysql
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getPropertys()
  {
  }


  public function getPropiedades()
  {
    $sql = "SELECT pro.idpropiedad,pro.titulo,pro.finish_at,DATE_FORMAT(pro.finish_at,'%d/%m/%Y') AS fecha_vencimiento,
                  pro.personaid,pro.ruta,
                  pro.precio,pro.statuspackage, pro.direccion_localizacion,pro.subtipoid,
                  pro.packageid,
                  t.title AS tipo
            FROM propiedades pro 
            INNER JOIN tipos t
            ON pro.tipoid = t.idtipo 
            ORDER BY pro.idpropiedad DESC";
    $request = $this->select_all($sql);

    if (!empty($request)) {
      $requestCount = count($request);
      for ($i = 0; $i < $requestCount; $i++) {
        $request[$i]['portada'] = '';
        $request[$i]['subtipo'] = '';
        $sql = "SELECT * FROM imagenespropiedad WHERE propiedadid =  {$request[$i]['idpropiedad']}";
        $requestImagen = $this->select($sql);
        if (!empty($requestImagen)) {
          $request[$i]['portada'] = $requestImagen['rutaimagen'];
        }
        if ($request[$i]['subtipoid'] != 0) {
          $sql = "SELECT titulo FROM subtipos WHERE idsubtipo = {$request[$i]['subtipoid']}";
          $requestSubtipo = $this->select($sql);
          if (!empty($requestSubtipo)) {
            $request[$i]['subtipo'] = $requestSubtipo['titulo'];
          }
        }

        $hoy = date("Y-m-d h:i:s");
        if (!(empty($request[$i]['finish_at']) || $hoy <= $request[$i]['finish_at'])) {
          $sql = "UPDATE propiedades SET finish_at = ?, statuspackage = ? 
          WHERE idpropiedad = {$request[$i]['idpropiedad']} ";
          $arrData = [NULL, 'No pagado'];
          $this->update($sql, $arrData);
          $request[$i]['finish_at'] = NULL;
          $request[$i]['fecha_vencimiento'] = NULL;
          $request[$i]['statuspackage'] = 'No Pagado';
        }
      }
    }
    return $request;
  }

  public function getPropiedad(int $idpropiedad, bool $check = true)
  {
    $sql = "SELECT pro.idpropiedad,pro.titulo,
            pro.personaid,pro.ruta,
            pro.precio,pro.statuspackage, pro.direccion_localizacion,pro.subtipoid,
            pro.packageid,pro.contenido,pro.tipoid,pro.etiqueta,pro.formbuilderjson,pro.caracteristicasjson,
            pro.detallesadicionalesjson,pro.videoLink,pro.audioVideoLink,
            pro.direccion_localizacion,pro.codigopostal_localizacion,
            pro.areacapital_localizacion, pro.municipal_localizacion,pro.latitud_mapa,
            pro.longitud_mapa,pro.vistacalle_mapa,pro.listing_type,pro.tour360link,
            t.title AS tipo
            FROM propiedades pro 
            INNER JOIN tipos t
            ON pro.tipoid = t.idtipo 
            WHERE pro.status = 1 AND pro.idpropiedad = $idpropiedad";
    $request = $this->select($sql);
    if (!empty($request) && $check) {
      $request['imagenes'] = '';
      $request['subtipo'] = '';
      $sql = "SELECT * FROM imagenespropiedad WHERE propiedadid =  {$idpropiedad}";
      $requestImagen = $this->select_all($sql);
      if (!empty($requestImagen)) {
        $request['imagenes'] = $requestImagen;
      }
      if ($request['subtipoid'] != 0) {
        $sql = "SELECT * FROM subtipos WHERE idsubtipo = {$request['subtipoid']}";
        $requestSubtipo = $this->select($sql);
        $request['subtipo'] = $requestSubtipo;
      } else {
        if ($request['listing_type'] === 'Anunciar') {
          $sql = "SELECT * FROM subtipos WHERE idsubtipo = 1";
          $requestSubtipo = $this->select($sql);
          $request['subtipo'] = $requestSubtipo;
        }
      }
      $sql = "SELECT * FROM formbuilder WHERE idsubtipo = {$request['subtipo']['idsubtipo']}";
      $request['subtipo']['formbuilder'] = $this->select_all($sql);
    }
    return $request;
  }

  public function eliminarImagenPropiedad(int $idimagen)
  {
    $sql = "DELETE FROM imagenespropiedad WHERE id = $idimagen";
    $request = $this->delete($sql);
    return $request;
  }

  public function eliminarPropiedad(int $idpropiedad)
  {
    $sql = "DELETE FROM propiedades WHERE idpropiedad = $idpropiedad";
    $request = $this->delete($sql);
    return $request;
  }


  public function getCharacteristics()
  {
    $sql = "SELECT titulo,idcheck FROM characteristics WHERE status = 2";
    $request = $this->select_all($sql);
    return $request;
  }

  public function getTipos()
  {
    $sql = "SELECT idtipo,title FROM tipos WHERE status != 0 AND idtipo != 1";
    $request = $this->select_all($sql);
    return $request;
  }

  public function getEtiquetas()
  {
    $sql = "SELECT idtag,titulotag FROM tags WHERE status != 0";
    $request = $this->select_all($sql);
    return $request;
  }
  public function getPackage(int $idpackage)
  {
    $sql = "SELECT * FROM package WHERE idpackage = $idpackage";
    $request = $this->select($sql);
    return $request;
  }
}