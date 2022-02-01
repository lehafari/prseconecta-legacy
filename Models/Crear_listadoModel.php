<?php

class Crear_listadoModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getPackages(string $idpackages)
  {
    $sql = "SELECT title,idpackage,orden,
                        billingperiod,billingfrequency,
                        packageinformation,packagepricelisting,
                        packagepriceads 
                FROM package WHERE idpackage IN($idpackages)";
    $request = $this->select_all($sql);
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
    $sql = "SELECT idtipo,title FROM tipos WHERE status != 0";
    $request = $this->select_all($sql);
    return $request;
  }

  public function getEtiquetas()
  {
    $sql = "SELECT idtag,titulotag FROM tags WHERE status != 0";
    $request = $this->select_all($sql);
    return $request;
  }

  public function getSubtipos(int $idtipo)
  {
    $sql = "SELECT idsubtipo,titulo FROM subtipos WHERE idtipo = $idtipo AND status != 0";
    $request = $this->select_all($sql);
    return $request;
  }

  public function getSubtipo(int $idsubtipo)
  {
    $sql = "SELECT * FROM subtipos WHERE idsubtipo = $idsubtipo AND status != 0";
    $request = $this->select($sql);
    if (!empty($request)) {
      $sql = "SELECT * FROM formbuilder WHERE idsubtipo = $idsubtipo AND status = 1";
      $request['formbuilder'] = $this->select_all($sql);
    }
    return $request;
  }

  public function getFormFields(int $idsubtipo)
  {
    $sql = "SELECT field_name,idform,placeholder,type,valores
    FROM formbuilder 
    WHERE idsubtipo = $idsubtipo AND status != 0";
    $request = $this->select_all($sql);
    return $request;
  }

  public function getPackage(int $idpackage)
  {
    $sql = "SELECT * FROM package WHERE idpackage = $idpackage";
    $request = $this->select($sql);
    return $request;
  }

  public function insertPropiedad(
    int $personaid,
    int $package,
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
    string $statusPackage,
    string $listing_type
  ) {
    $sql = "INSERT INTO propiedades(
      personaid,
      packageid,
      titulo,
      ruta,

      contenido,
      precio,
      tipoid,

      subtipoid,
      etiqueta,
      formbuilderjson,

      caracteristicasjson,
      detallesadicionalesjson,
      videoLink,

      audioVideoLink,
      tour360link,
      direccion_localizacion,
      codigopostal_localizacion,

      areacapital_localizacion,
      municipal_localizacion,
      latitud_mapa,

      longitud_mapa,
      vistacalle_mapa,
      documentoPdf,
      
      status,
      statusPackage,
      listing_type
    ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $arrData = [
      $personaid,
      $package,
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

      $status,
      $statusPackage,
      $listing_type
    ];

    $request = $this->insert($sql, $arrData);
    return $request;
  }

  public function insertPayment(
    int $propiedadID,
    int $idpersona,
    string $stripeBillingName,
    string $stripeBillingAddressLine1,
    string $stripeBillingAddressZip,
    string $stripeBillingAddressCity,
    string $stripeBillingAddressCountry,
    string $stripeBillingAddressCountryCode,
    string $dataJsonStripe
  ) {
    $sql = "INSERT INTO payments(idpropiedad,
                        personaid,
                        stripeBillingName,
                        stripeBillingAddressLine1,
                        stripeBillingAddressZip,
                        stripeBillingAddressCity,
                        stripeBillingAddressCountry,
                        stripeBillingAddressCountryCode,
                        stripeJsonPayment
    ) VALUES(?,?,?,?,?,?,?,?,?)";
    $arrData = [
      $propiedadID,
      $idpersona,
      $stripeBillingName,
      $stripeBillingAddressLine1,
      $stripeBillingAddressZip,
      $stripeBillingAddressCity,
      $stripeBillingAddressCountry,
      $stripeBillingAddressCountryCode,
      $dataJsonStripe
    ];
    $this->insert($sql, $arrData);
    $sql = "UPDATE propiedades 
            SET statusPackage = ?, finish_at = DATE_ADD(NOW(),INTERVAL 31 DAY) 
            WHERE idpropiedad = $propiedadID AND personaid = $idpersona";
    $this->update($sql, ['Pagado']);
    return true;
  }

  public function insertImagen(int $idpropiedad, string $nombreImagen)
  {
    $sql = "INSERT INTO imagenespropiedad(propiedadid,rutaimagen) VALUES(?,?)";
    $arrData = [$idpropiedad, $nombreImagen];
    $request = $this->insert($sql, $arrData);
    return $request;
  }

  public function getPropiedadByRout(int $idpropiedad, string $rutaPropiedad, int $idpersona)
  {
    $sql = "SELECT pro.titulo,pro.idpropiedad,pro.ruta,pro.listing_type,pack.idpackage,
    pack.title AS nombrepaquete, pack.packagepricelisting, pack.packagepriceads
    FROM propiedades pro 
    INNER JOIN package pack
    ON pro.packageid = pack.idpackage
    WHERE pro.idpropiedad = $idpropiedad AND pro.ruta = '$rutaPropiedad' AND pro.personaid = $idpersona";
    $request = $this->select($sql);
    return $request;
  }
}