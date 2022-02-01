<?php

if (!class_exists('Mysql')) {
  require_once('Libraries/Core/Mysql.php');
}

trait TPropiedades
{
  public function getPropiedadesByAgente(int $idagente)
  {
    $con = new Mysql();
    $sql = "SELECT pro.idpropiedad,pro.titulo,
                    pro.personaid,pro.ruta,
                    pro.precio,pro.statuspackage, 
                    pro.direccion_localizacion,pro.subtipoid,
                    pro.fecha_carga,
                    pro.formbuilderjson,
                    pro.packageid,
                    per.email_user,
                    per.idpersona,
                    per.rutausuario,
                    per.rolid,
                    t.title AS tipo
            FROM propiedades pro 
            INNER JOIN tipos t
            ON pro.tipoid = t.idtipo 
            INNER JOIN agentsandclients per
            ON per.idpersona = pro.personaid
            WHERE pro.status = 1 AND pro.personaid = $idagente 
            AND (pro.statuspackage = 'Pagado' OR pro.statuspackage = 'Gratuito') 
            ORDER BY pro.idpropiedad DESC";
    $request = $con->select_all($sql);
    if (!empty($request)) {
      $requestCount = count($request);
      for ($i = 0; $i < $requestCount; $i++) {
        $request[$i]['portada'] = [];
        $request[$i]['subtipo'] = [];
        $sql = "SELECT * FROM imagenespropiedad WHERE propiedadid =  {$request[$i]['idpropiedad']}";
        $requestImagen = $con->select($sql);
        if (!empty($requestImagen)) {
          $request[$i]['portada'] = $requestImagen['rutaimagen'];
        }
        $sql = "SELECT titulo,top_overview_field FROM subtipos WHERE idsubtipo = {$request[$i]['subtipoid']}";
        $requestSubtipo = $con->select($sql);
        if ($request[$i]['subtipoid'] == 1) {
          $requestSubtipo['titulo'] = '';
        }
        $request[$i]['subtipo'] = $requestSubtipo;
      }
    }
    return $request;
  }

  public function getPropiedades($idpackage = 0)
  {
    $con = new Mysql();
    $sql = "SELECT  pro.idpropiedad,
                    pro.titulo,
                    pro.personaid,pro.ruta,
                    pro.precio,pro.statuspackage, 
                    pro.direccion_localizacion,pro.subtipoid,
                    pro.formbuilderjson,
                    pro.fecha_carga,
                    pro.packageid,
                    pro.finish_at,
                    per.email_user,
                    per.idpersona,
                    per.rutausuario,
                    per.rolid,
                    t.title AS tipo
            FROM propiedades pro 
            INNER JOIN tipos t
            ON pro.tipoid = t.idtipo 
            INNER JOIN agentsandclients per 
            ON per.idpersona = pro.personaid
            WHERE pro.status = 1 AND (statuspackage = 'Pagado' OR statuspackage = 'Gratuito') AND pro.packageid = $idpackage ORDER BY pro.idpropiedad DESC";
    $request = $con->select_all($sql);
    if (!empty($request)) {
      $requestCount = count($request);
      for ($i = 0; $i < $requestCount; $i++) {
        $hoy = date("Y-m-d h:i:s");
        if (empty($request[$i]['finish_at']) || $hoy <= $request[$i]['finish_at']) {
          $request[$i]['subtipo'] = [];
          $sql = "SELECT * FROM imagenespropiedad WHERE propiedadid =  {$request[$i]['idpropiedad']}";
          $requestImagen = $con->select_all($sql);
          $request[$i]['imagenes'] = $requestImagen;
          $sql = "SELECT titulo,top_overview_field FROM subtipos WHERE idsubtipo = {$request[$i]['subtipoid']}";
          $requestSubtipo = $con->select($sql);
          if (!empty($requestSubtipo)) {
            if ($request[$i]['subtipoid'] == 1) {
              $requestSubtipo['titulo'] = '';
            }
            $request[$i]['subtipo'] = $requestSubtipo;
          }
        } else {
          $sql = "UPDATE propiedades SET finish_at = ?, statuspackage = ? 
                  WHERE idpropiedad = {$request[$i]['idpropiedad']} ";
          $arrData = [NULL, 'No pagado'];
          $con->update($sql, $arrData);
          unset($request[$i]);
        }
      }
    }
    return $request;
  }

  public function getPropiedad(int $idpropiedad)
  {
    $con = new Mysql();
    $sql = "SELECT  pro.idpropiedad,
                    pro.titulo,
                    pro.finish_at,
                    pro.personaid,
                    pro.ruta,
                    pro.precio,pro.statuspackage, 
                    pro.direccion_localizacion,
                    pro.subtipoid,
                    pro.fecha_carga,
                    pro.formbuilderjson,
                    pro.caracteristicasjson,
                    pro.packageid,
                    per.email_user,
                    pro.latitud_mapa,
                    pro.longitud_mapa,
                    per.idpersona,
                    per.rutausuario,
                    per.rolid,
                    t.title AS tipo
            FROM propiedades pro 
            INNER JOIN tipos t
            ON pro.tipoid = t.idtipo 
            INNER JOIN agentsandclients per 
            ON per.idpersona = pro.personaid
            WHERE pro.status = 1 
            AND (statuspackage = 'Pagado' OR statuspackage = 'Gratuito') 
            AND pro.idpropiedad = $idpropiedad ORDER BY pro.idpropiedad DESC";
    $request = $con->select($sql);
    if (!empty($request)) {
      $hoy = date("Y-m-d h:i:s");
      if (empty($request['finish_at']) || $hoy <= $request['finish_at']) {
        $request['subtipo'] = [];
        $sql = "SELECT * FROM imagenespropiedad WHERE propiedadid =  {$request['idpropiedad']}";
        $requestImagen = $con->select_all($sql);
        $request['imagenes'] = $requestImagen;
        $sql = "SELECT titulo,top_overview_field,top_right_overview_field,top_detail_field 
                FROM subtipos WHERE idsubtipo = {$request['subtipoid']}";
        $requestSubtipo = $con->select($sql);
        if (!empty($requestSubtipo)) {
          if ($request['subtipoid'] == 1) {
            $requestSubtipo['titulo'] = '';
          }
          $request['subtipo'] = $requestSubtipo;
        }
        $sql = "SELECT COUNT(*) AS total FROM vistospropiedades WHERE idpropiedad = $idpropiedad";
        $request['vistas'] = $con->select($sql)['total'];

        $sql = "SELECT idpersona,nombres,apellidos,telefono,usuario,email_user,imagen,rolid FROM agentsandclients
                WHERE status = 1 AND idpersona = {$request['personaid']}";
        $request['agente'] = $con->select($sql);
      } else {
        $sql = "UPDATE propiedades SET finish_at = ?, statuspackage = ? 
                        WHERE idpropiedad = {$request['idpropiedad']} ";
        $arrData = [NULL, 'No pagado'];
        $con->update($sql, $arrData);
        $request = NULL;
      }
    }
    return $request;
  }

  public function getSubtiposT(int $idtipo)
  {
    $con = new Mysql();
    $sql = "SELECT idsubtipo,titulo FROM subtipos WHERE idtipo = $idtipo AND status != 0";
    $request = $con->select_all($sql);
    return $request;
  }

  public function insertarVistaPropiedad(int $idpropiedad, string $dispositivo, string $pais, string $browser)
  {
    $con = new Mysql();
    $sql = "INSERT INTO vistospropiedades(idpropiedad,device,country,browser) VALUES(?,?,?,?)";
    $arrData = [$idpropiedad, $dispositivo, $pais, $browser];
    $request = $con->insert($sql, $arrData);
    return $request;
  }
}