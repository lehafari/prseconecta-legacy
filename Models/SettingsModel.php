<?php

class SettingsModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    /* MODEL TAGS */

    public function insertTag(string $titulo)
    {
        $sql = "INSERT INTO tags(titulotag) VALUES (?)";
        $arrData = [$titulo];
        $request = $this->insert($sql, $arrData);
        return $request;
    }

    public function editTag(int $id, string $titulo)
    {
        $sql = "UPDATE tags SET titulotag = ? WHERE idtag = $id";
        $arrData = [$titulo];
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function getTag(int $id)
    {
        $sql = "SELECT * FROM tags WHERE idtag  = $id";
        $request = $this->select($sql);
        return $request;
    }

    public function getOrden(int $idorden)
    {
        $sql = "SELECT * FROM sortable WHERE idsortable  = $idorden";
        $request = $this->select($sql);
        return $request;
    }

    public function getTags()
    {
        $request = [];
        $sql = "SELECT idtag,titulotag FROM tags 
              WHERE status = 1 
              ORDER BY idtag DESC";
        $request = $this->select_all($sql);
        return $request;
    }

    public function setOrden(int $idtabla, string $column, string $orden)
    {
        $sql = "UPDATE sortable SET $column = ? WHERE idsortable = $idtabla";
        $arrData = [$orden];
        $this->update($sql, $arrData);
        return true;
    }


    public function delTag(int $idtag)
    {
        $sql = "UPDATE tags SET status = ? 
                WHERE idtag = $idtag";
        $arrData = array(0);
        $requestDelete = $this->update($sql, $arrData);
        return $requestDelete;
    }

    /* MODEL PAGES */
    public function selectPages()
    {
        $sql = "SELECT idpage,imagen,titulo FROM pages";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectPage(int $idpage)
    {
        $sql = "SELECT idpage,imagen,titulo,contenido FROM pages WHERE idpage = $idpage";
        $request = $this->select($sql);
        return $request;
    }

    public function checkImagePages(int $idpage)
    {
        $sql = "SELECT imagen FROM pages WHERE idpage = $idpage";
        $request = $this->select($sql);
        return $request;
    }

    public function updatePage($idpage, $titulo, $contenido, $nombre_foto)
    {
        $sql = "UPDATE pages SET titulo = ?, contenido = ?, imagen = ? WHERE idpage = $idpage";
        $arrData = [$titulo, $contenido, $nombre_foto];
        $request = $this->update($sql, $arrData);
        return $request;
    }

    /* MODEL PACKAGES */
    public function getPackages()
    {
        $sql = "SELECT title,idpackage,orden,
                        billingperiod,billingfrequency,
                        packageinformation,packagepricelisting,
                        packagepriceads 
                FROM package";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getPackage(int $idpackage)
    {
        $sql = "SELECT * FROM package WHERE idpackage = $idpackage";
        $request = $this->select($sql);
        return $request;
    }

    public function setPackage(
        int $idpackage,
        string $titulo,
        string $packageType,
        string $billingPeriod,
        int $billingFrequency,
        int $listingsIncluded,
        int $featuredListingsIncluded,
        int $packagePriceListings,
        int $packagePriceAds,
        string $package_stripe_id,
        int $imagesperlisting,
        string $packageInformation,
        string $orden
    ) {
        $sql = "UPDATE package 
                    SET title = ?, 
                    packagetype = ?, 
                    billingperiod = ?, 
                    billingfrequency = ?, 
                    listingsincluded = ?, 
                    featuredlistingsincluded = ?, 
                    packagepricelisting = ?,
                    packagepriceads = ?,
                    package_stripe_id = ?,
                    imagesperlisting = ?,
                    packageinformation = ?,
                    orden = ?
                    WHERE idpackage = $idpackage";
        $arrData = [
            $titulo,
            $packageType,
            $billingPeriod,
            $billingFrequency,
            $listingsIncluded,
            $featuredListingsIncluded,
            $packagePriceListings,
            $packagePriceAds,
            $package_stripe_id,
            $imagesperlisting,
            $packageInformation,
            $orden
        ];
        $request = $this->update($sql, $arrData);

        return $request;
    }

    /* CRUD AREA CAPITAL | MUNICIPAL */

    public function selectMunicipales()
    {
        $sql = "SELECT * FROM municipal";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getMunicipal($idmunicipal)
    {
        $sql = "SELECT * FROM municipal WHERE idmunicipal = $idmunicipal";
        $request = $this->select($sql);
        return $request;
    }

    public function updateMunicipal(int $idmunicipal, string $tituloMunicipal)
    {
        $sql = "UPDATE municipal SET nombre = ? WHERE idmunicipal = $idmunicipal";
        $arrData = [$tituloMunicipal];
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function insertMunicipal(string $tituloMunicipal)
    {
        $sql = "INSERT INTO municipal(nombre) VALUES(?)";
        $arrData = [$tituloMunicipal];
        $request = $this->update($sql, $arrData);
        return $request;
    }


    public function selectAreaCapitales()
    {
        $sql = "SELECT * FROM areacapital";
        $request = $this->select_all($sql);
        return $request;
    }

    public function delAreaCapital(int $idareacapital)
    {
        $sql = "DELETE FROM areacapital WHERE idareacapital = $idareacapital";
        $request = $this->delete($sql);
        return $request;
    }

    public function getAreasCapital(int $idareacapital)
    {
        $sql = "SELECT * FROM areacapital WHERE idareacapital = $idareacapital";
        $request = $this->select($sql);
        return $request;
    }


    public function updateAreaCapital(int $idareacapital, string $tituloAreaCapital)
    {
        $sql = "UPDATE areacapital SET nombre = ? WHERE idareacapital  = $idareacapital";
        $arrData = [$tituloAreaCapital];
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function insertAreaCapital(string $tituloAreaCapital)
    {
        $sql = "INSERT INTO areacapital(nombre) VALUES(?)";
        $arrData = [$tituloAreaCapital];
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function delMunicipio(int $idmunicipio)
    {
        $sql = "DELETE FROM municipal WHERE idmunicipal = $idmunicipio";
        $request = $this->delete($sql);
        return $request;
    }
}