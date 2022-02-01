<?php

class Mis_propiedadesModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getPropiedades(int $idpersona)
  {
    $sql = "SELECT pro.idpropiedad,pro.titulo,pro.finish_at,DATE_FORMAT(pro.finish_at,'%d/%m/%Y') AS fecha_vencimiento,
                  pro.personaid,pro.ruta,
                  pro.precio,pro.statuspackage, pro.direccion_localizacion,pro.subtipoid,
                  pro.formbuilderjson,
                  pro.status,
                  pro.packageid,
                  t.title AS tipo
            FROM propiedades pro 
            INNER JOIN tipos t
            ON pro.tipoid = t.idtipo 
            WHERE pro.personaid = $idpersona ORDER BY pro.idpropiedad DESC";
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

  public function getPropiedad(int $idpropiedad, int $idpersona, bool $check = true)
  {
    $sql = "SELECT pro.idpropiedad,pro.titulo,
            pro.personaid,pro.ruta,
            pro.precio,pro.statuspackage, pro.direccion_localizacion,pro.subtipoid,
            pro.packageid,pro.contenido,pro.tipoid,pro.etiqueta,pro.formbuilderjson,pro.caracteristicasjson,
            pro.detallesadicionalesjson,pro.videoLink,pro.audioVideoLink,
            pro.direccion_localizacion,pro.codigopostal_localizacion,
            pro.areacapital_localizacion, pro.municipal_localizacion,pro.latitud_mapa,
            pro.longitud_mapa,pro.vistacalle_mapa,pro.listing_type,pro.tour360link,documentoPdf,
            t.title AS tipo
            FROM propiedades pro 
            INNER JOIN tipos t
            ON pro.tipoid = t.idtipo 
            WHERE pro.idpropiedad = $idpropiedad AND pro.personaid = $idpersona";
    $request = $this->select($sql);
    if (!empty($request) && $check) {
      $request['subtipo'] = '';
      $sql = "SELECT * FROM imagenespropiedad WHERE propiedadid =  {$idpropiedad}";
      $requestImagen = $this->select_all($sql);
      $request['imagenes'] = $requestImagen;

      $sql = "SELECT idsubtipo,titulo FROM subtipos WHERE idtipo = {$request['tipoid']} AND status != 0";
      $request['valoresTipoSubtipos'] = $this->select_all($sql);

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

  public function selectImagen(int $idimagen)
  {
    $sql = "SELECT * FROM imagenespropiedad WHERE id = $idimagen";
    $request = $this->select($sql);
    return $request;
  }

  public function insertImagen(int $idpropiedad, string $nombreImagen)
  {
    $sql = "INSERT INTO imagenespropiedad(propiedadid,rutaimagen) VALUES(?,?)";
    $arrData = [$idpropiedad, $nombreImagen];
    $request = $this->insert($sql, $arrData);
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
    $this->delete("DELETE FROM vistospropiedades WHERE idpropiedad = $idpropiedad");

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

  public function getFormFieldsById(int $idsubtipo)
  {
    $sql = "SELECT field_name,idform,placeholder,type,valores,name
    FROM formbuilder 
    WHERE idsubtipo = $idsubtipo AND status != 0";
    $request = $this->select_all($sql);
    return $request;
  }

  public function getFormFieldsByIds(string $ids)
  {
    $sql = "SELECT field_name,idform
            FROM formbuilder 
            WHERE idform IN ($ids) AND status != 0";
    $request = $this->select_all($sql);
    return $request;
  }

  public function updatePropiedad(
    int $personaid,
    string $titulo,
    string $contenido,
    string $rutaPropiedad,
    float $precio,
    string $tipo,
    string $subtipo,
    string $etiqueta,
    string $formBuilder,
    string $caracteristicas,
    string $detallesAdicionales,
    string $videoLink,
    string $audioVideoLink,
    string $tour360Link,
    string $direccion_localizacion,
    string $codigopostal_localizacion,
    string $areacapital_localizacion,
    string $municipal_localizacion,
    string $latitud_mapa,
    string $longitud_mapa,
    int $vistacalle_mapa,
    string $documentoPdf,
    int $status,
    int $idpropiedad
  ) {
    $sql = "UPDATE propiedades SET
      titulo = ?,
      ruta = ?,

      contenido = ?,
      precio = ?,
      tipoid = ?,

      subtipoid = ?,
      etiqueta = ?,
      formbuilderjson = ?,

      caracteristicasjson = ?,
      detallesadicionalesjson = ?,
      videoLink = ?,

      audioVideoLink = ?,
      tour360link = ?,
      direccion_localizacion = ?,
      codigopostal_localizacion = ?,

      areacapital_localizacion = ?,
      municipal_localizacion = ?,
      latitud_mapa = ?,

      longitud_mapa = ?,
      vistacalle_mapa = ?,
      documentoPdf = ?,
      
      status = ? WHERE personaid = $personaid AND idpropiedad = $idpropiedad";

    $arrData = [
      $titulo,
      $rutaPropiedad,

      $contenido,
      $precio,
      $tipo,

      $subtipo,
      $etiqueta,
      $formBuilder,

      $caracteristicas,
      $detallesAdicionales,
      $videoLink,

      $audioVideoLink,
      $tour360Link,
      $direccion_localizacion,
      $codigopostal_localizacion,

      $areacapital_localizacion,
      $municipal_localizacion,
      $latitud_mapa,

      $longitud_mapa,
      $vistacalle_mapa,
      $documentoPdf,

      $status
    ];

    $request = $this->update($sql, $arrData);
    return $request;
  }

  public function cambiarEstadoPropiedad(int $status, int $idpropiedad, int $personaid)
  {
    $sql = "UPDATE propiedades SET status = ? WHERE idpropiedad = $idpropiedad AND personaid = $personaid";
    $arrData = [$status];
    $request = $this->update($sql, $arrData);
    return $request;
  }

  public function getPackages(string $idpaquetes)
  {
    $sql = "SELECT title,idpackage,orden,
                billingperiod,billingfrequency,
                packageinformation,packagepricelisting,
                packagepriceads 
            FROM package WHERE idpackage IN($idpaquetes)";
    $request = $this->select_all($sql);
    return $request;
  }

  public function setNewPackage(int $idpackage, int $idpropiedad, int $personaid)
  {
    $sql = "UPDATE propiedades 
            SET packageid = ?, statusPackage = ? 
            WHERE idpropiedad = $idpropiedad AND personaid = $personaid";
    $request = $this->update($sql, [$idpackage, 'No Pagado']);
    return $request;
  }
}