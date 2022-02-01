<?php
function base_url()
{
    return BASE_URL;
}
// Muestra la informacion formateada
function dep($data)
{
    $format = print_r('<pre>');
    $format = print_r($data);
    $format = print_r('</pre>');
    return $format;
}


function media()
{

    return BASE_URL . '/Assets';
}

// Funcion para requerir el HEADER
function headerAdmin($data = '')
{
    $view_header = "Views/Template/header_admin.php";
    include($view_header);
}
// Funcion para requerir el footer
function footerAdmin($data = '')
{
    $view_footer = 'Views/Template/footer_admin.php';
    include($view_footer);
}

function footerAdminLogin($data = '')
{
    $view_footer = 'Views/Template/auth/login_admin_footer.php';
    include($view_footer);
}

function headerAdminLogin($data = '')
{
    $view_hader = 'Views/Template/auth/login_admin_header.php';
    include($view_hader);
}

function footerClienteLogin($data = '')
{
    $view_footer = 'Views/Template/auth/login_cliente_footer.php';
    include($view_footer);
}

function headerClienteLogin($data = '')
{
    $view_hader = 'Views/Template/auth/login_cliente_header.php';
    include($view_hader);
}

// Funcion para requerir el HEADER TIENDA
function headerTienda($data = "")
{
    $view_header = "Views/Template/header_tienda.php";
    include($view_header);
}
// Funcion para requerir el footer TIENDA
function footerTienda($data = '')
{
    $view_footer = 'Views/Template/footer_tienda.php';
    include($view_footer);
}

function getModal(string $nameModal, $data)
{
    $view_modal = "Views/Template/modals/$nameModal.php";
    include $view_modal;
}
function getFile(string $url, $data = '')
{
    ob_start();
    require_once("Views/$url.php");
    $file = ob_get_clean();
    return $file;
}

//Envio de correos
function sendEmail($data, $template)
{
    $asunto = $data['asunto'];
    $emailDestino = $data['email'];
    $empresa = NOMBRE_EMPRESA;
    $remitente = EMAIL_REMITENTE;
    $emailCopia = !empty($data['emailCopia']) ? $data['emailCopia'] : '';
    //ENVIO DE CORREO
    $de = "MIME-Version: 1.0\r\n";
    $de .= "Content-type: text/html; charset=UTF-8\r\n";
    $de .= "From: {$empresa} <{$remitente}>\r\n";
    $de .= "Bcc: $emailCopia\r\n";
    ob_start();
    require_once('Views/Template/Email/' . $template . ".php");
    $mensaje = ob_get_clean();
    $send = mail($emailDestino, $asunto, $mensaje, $de);
    return $send;
}


/* function sendEmailLocal($data,$template){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 1;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smt.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'darioflores170@gmail.com';                     //SMTP username
        $mail->Password   = 'darkmax1';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('darioflores170@gmail.com', 'Servidor Local');
        $mail->addAddress($data['email']);     

        if(!empty($data['emailCopia'])){
            $mail->addBCC($data['emailCopia']);
        }

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $data['asunto'];

        ob_start();
        require_once('Views/Template/Email/'.$template.".php");
        $mensaje = ob_get_clean();

        $mail->Body    = $mensaje;
    
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} */

function getPermisos(int $idmodulo)
{
    require_once('Models/PermisosModel.php');
    $objPermisos = new PermisosModel();
    if (!empty($_SESSION['userData-admin'])) {
        $idrol = $_SESSION['userData-admin']['idrol'];
        $arrPermisos = $objPermisos->permisosModulo($idrol);
        $permisos = '';
        $permisosMod = '';
        if (count($arrPermisos) > 0) {
            $permisos = $arrPermisos;
            $permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : '';
        }
        $_SESSION['permisos'] = $permisos;
        $_SESSION['permisosMod'] = $permisosMod;
    }
}

function sessionUserAdmin(int $idpersona)
{
    if (!class_exists('Mysql')) {
        require_once('Libraries/Core/Mysql.php');
    }
    $con = new Mysql();
    $sql = "SELECT p.idpersona,
                    p.nombres,
                    p.apellidos,
                    r.nombrerol,
                    p.telefono,
                    r.idrol,
                    p.email_user,
                    p.imagen
            FROM persona p
            INNER JOIN rol r
            ON p.rolid = r.idrol
            WHERE p.idpersona = $idpersona";
    $request = $con->select($sql);
    $_SESSION['userData-admin'] = $request;
}



function sessionUserCliente(int $idpersona)
{
    if (!class_exists('Mysql')) {
        require_once('Libraries/Core/Mysql.php');
    }
    $con = new Mysql();
    $sql = "SELECT p.rutausuario,
                    p.idpersona,
                    p.usuario,
                    p.nombres,
                    p.apellidos,
                    r.nombrerol,
                    p.telefono,
                    r.idrol,
                    p.email_user,
                    p.imagen,
                    p.extrajson,
                    p.socialmedia,
                    p.custombg
            FROM agentsandclients p
            INNER JOIN rol r
            ON p.rolid = r.idrol
            WHERE p.idpersona = $idpersona AND p.status != 0";
    $request = $con->select($sql);
    $_SESSION['userData-cliente'] = $request;
}

function cleanArrayData(array $array)
{
    $arrayReturn = [];

    foreach ($array as $key => $value) {
        $arrayReturn[$key] = strClean($value);
    }

    return $arrayReturn;
}

function getFormPropertys($data = [])
{
    $formulario = 'Views/Template/search_propertys.php';
    include($formulario);
}


function uploadImage(array $data, string $name, $action = '')
{
    //Ruta de la carpeta donde se guardarán las imagenes
    $rutaUpload = 'Assets/images/uploads/' . $name;
    $tmp_name = $data['tmp_name'];
    $type = $data['type'];
    $size = $data['size'];
    //Parámetros optimización, resolución máxima permitida
    $max_ancho = 1280;
    $max_alto = 900;
    if ($action == 'profile') {
        $max_ancho = 300;
        $max_alto = 300;
    }

    if ($type === 'image/png' || $type === 'image/jpeg' || $type === 'image/gif') {
        $medidasimagen = getimagesize($tmp_name);
        //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
        if ($medidasimagen[0] < 1280 && $size < 100000) {
            move_uploaded_file($tmp_name, $rutaUpload);
        } else {
            if ($type === 'image/jpeg') {

                $original = imagecreatefromjpeg($tmp_name);
            } else if ($type === 'image/png') {
                $original = imagecreatefrompng($tmp_name);
            } else if ($type === 'image/gif') {

                $original = imagecreatefromgif($tmp_name);
            }

            list($ancho, $alto) = getimagesize($tmp_name);

            $x_ratio = $max_ancho / $ancho;
            $y_ratio = $max_alto / $alto;

            if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                $ancho_final = $ancho;
                $alto_final = $alto;
            } elseif (($x_ratio * $alto) < $max_alto) {
                $alto_final = ceil($x_ratio * $alto);
                $ancho_final = $max_ancho;
            } else {
                $ancho_final = ceil($y_ratio * $ancho);
                $alto_final = $max_alto;
            }

            $lienzo = imagecreatetruecolor($ancho_final, $alto_final);
            $color = imagecolorallocatealpha($lienzo, 255, 255, 255, 1);

            imagefill($lienzo, 0, 0, $color);
            imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);

            //imagedestroy($original);

            if ($type === 'image/jpeg') {
                imagejpeg($lienzo, $rutaUpload);
                return true;
            } else if ($type === 'image/png') {
                imagepng($lienzo, $rutaUpload);
                return true;
            } else if ($type === 'image/gif') {
                imagegif($lienzo, $rutaUpload);
                return true;
            }
        }
    } else return false;
}

function uploadImageNoCompress(array $data, string $name)
{
    $url_temp = $data['tmp_name'];
    $destino    = 'Assets/images/uploads/' . $name;
    $move = move_uploaded_file($url_temp, $destino);
    return $move;
}

function deleteFile(string $name)
{
    $linkFile = 'Assets/images/uploads/' . $name;
    if (file_exists($linkFile)) {
        unlink($linkFile);
    }
}
// Eliminar exceso de espacio entre palabras para evitar inyecciones sql y ataques
function strClean($strCadena)
{
    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $strCadena);
    $string = trim($string); // Eliminar espacios en blanco al inicio y al final
    $string = stripslashes($string); // Elimina las \ invertidas
    $string = str_ireplace('<script>', '', $string);
    $string = str_ireplace('</script>', '', $string);
    $string = str_ireplace('<script src>', '', $string);
    $string = str_ireplace('<script type=>', '', $string);
    $string = str_ireplace('SELECT * FROM ', '', $string);
    $string = str_ireplace('DELETE FROM', '', $string);
    $string = str_ireplace('INSERT INTO', '', $string);
    $string = str_ireplace('SELECT COUNT(*) FROM', '', $string);
    $string = str_ireplace('DROP TABLE', '', $string);
    $string = str_ireplace("OR '1'='1'", '', $string);
    $string = str_ireplace('OR "1"="1" ', '', $string);
    $string = str_ireplace('OR ´1´=´1´', '', $string);
    $string = str_ireplace('is NULL; --', '', $string);
    $string = str_ireplace("is NULL; --", '', $string);
    $string = str_ireplace("LIKE '", '', $string);
    $string = str_ireplace('LIKE "', '', $string);
    $string = str_ireplace("LIKE ´", '', $string);
    $string = str_ireplace("OR 'a'='a'", "", $string);
    $string = str_ireplace('OR "a"="a"', "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("--", '', $string);
    $string = str_ireplace("^", '', $string);
    $string = str_ireplace("[", '', $string);
    $string = str_ireplace("]", '', $string);
    $string = str_ireplace('==', '', $string);

    return $string;
}

// Genera tu propia contraseña
function passGenerator($length = 10)
{
    $pass = "";
    $longitudPass = $length;
    $cadena = 'ABDEFGHIJKLMNOPQRSTUVWXYZabcdefghitjklmnopeqrstuvxwyz1234567890';
    $longitudCandena = strlen($cadena);

    for ($i = 1; $i <= $longitudPass; $i++) {
        $pos = rand(0, $longitudCandena - 1);
        $pass .= substr($cadena, $pos, 1);
    }

    return $pass;
}

// Genera un Token
function token()
{
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));

    $token = $r1 . '-' . $r2 . '-' . $r3 . '-' . $r4;

    return $token;
}

function clear_cadena(string $cadena)
{
    //Reemplazamos la A y a
    $cadena = str_replace(
        array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
        array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
        $cadena
    );

    //Reemplazamos la E y e
    $cadena = str_replace(
        array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
        array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
        $cadena
    );

    //Reemplazamos la I y i
    $cadena = str_replace(
        array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
        array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
        $cadena
    );

    //Reemplazamos la O y o
    $cadena = str_replace(
        array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
        array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
        $cadena
    );

    //Reemplazamos la U y u
    $cadena = str_replace(
        array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
        array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
        $cadena
    );

    //Reemplazamos la N, n, C y c
    $cadena = str_replace(
        array('Ñ', 'ñ', 'Ç', 'ç', ',', '.', ';', ':'),
        array('N', 'n', 'C', 'c', '', '', '', ''),
        $cadena
    );

    $cadena = str_replace(',', '', $cadena);
    return $cadena;
}
// Formato para valores monetarios



function formatMoney($cantidad)
{
    $cantidad = number_format($cantidad, 2, SPD, SPM);
    return $cantidad;
}
// TOKEN PAYPAL
function getTokenPayPal()
{
    $payLogin = curl_init(URLPAYPAL . '/v1/oauth2/token');
    curl_setopt($payLogin, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($payLogin, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($payLogin, CURLOPT_USERPWD, IDCLIENTE . ':' . SECRET);
    curl_setopt($payLogin, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
    $result = curl_exec($payLogin);
    $err = curl_error($payLogin);
    curl_close($payLogin);
    if ($err) {
        $request = 'CURL Error #: ' . $err;
    } else {
        $json = json_decode($result);
        $request = $json->access_token;
    }
    return $request;
}

function CurlConnectionGet(string $ruta, string $contentType = null, string $token = null)
{
    $contentType = $contentType != null ? $contentType : 'application/x-www-form-urlencoded';
    if ($token != null) {
        $arrHeader = array(
            'Content-Type:' . $contentType,
            'Authorization: Bearer ' . $token
        );
    } else {
        $arrHeader = array('Content-Type:' . $contentType);
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $ruta);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    if ($err) {
        $request = 'CURL Error #: ' . $err;
    } else {
        $request = json_decode($result);
    }
    return $request;
}

function CurlConnectionPost(string $ruta, string $contentType = null, string $token = null)
{
    $contentType = $contentType != null ? $contentType : 'application/x-www-form-urlencoded';
    if ($token != null) {
        $arrHeader = array(
            'Content-Type:' . $contentType,
            'Authorization: Bearer ' . $token
        );
    } else {
        $arrHeader = array('Content-Type:' . $contentType);
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $ruta);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    if ($err) {
        $request = 'CURL Error #: ' . $err;
    } else {
        $request = json_decode($result);
    }
    return $request;
}



function Meses()
{
    $meses = array(
        'Enero',
        'Febrero',
        'Marzo',
        'Abril',
        'Mayo',
        'Junio',
        'Julio',
        'Agosto',
        'Septiembre',
        'Octubre',
        'Noviembre',
        'Diciembre',
    );
    return $meses;;
}

function tofloat($num)
{
    $dotPos = strrpos($num, '.');
    $commaPos = strrpos($num, ',');
    $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos : ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

    if (!$sep) {
        return floatval(preg_replace('/[^0-9]/', '', $num));
    }

    return floatval(
        preg_replace('/[^0-9]/', '', substr($num, 0, $sep)) . '.' .
            preg_replace('/[^0-9]/', '', substr($num, $sep + 1, strlen($num)))
    );
}

function getInfoPage(int $idpage)
{
    if (!class_exists('Mysql')) {
        require_once('Libraries/Core/Mysql.php');
    }
    $con = new Mysql();
    $sql = "SELECT * FROM pages WHERE idpage = $idpage";
    $request = $con->select($sql);
    return $request;
}

function getImgName($ACTION, $extension = NULL)
{
    if (!class_exists('Mysql')) {
        require_once('Libraries/Core/Mysql.php');
    }
    $con = new Mysql();
    $extensionFinal = !empty($extension) ? ".$extension" : '.jpg';
    $initialName = !empty($extension) ? "{$extension}_" : 'img_';
    $imgRuta = $initialName . md5(date('d-m-Y H:i:s')) . passGenerator() . $extensionFinal;
    $sql = '';

    switch ($ACTION) {
        case 'PROFILE-USER':
            $imgRuta = 'profile-user/' . $imgRuta;
            $sql = "SELECT * FROM persona 
            WHERE imagen = '$imgRuta' AND imagen != NULL";
            break;
        case 'PROFILE-CLIENTE':
            $imgRuta = 'profile-cliente/' . $imgRuta;
            $sql = "SELECT * FROM agentsandclients 
            WHERE imagen = '$imgRuta' AND imagen != NULL";
            break;
        case 'PROFILE-CUSTOM-BG':
            $imgRuta = 'custombg/' . $imgRuta;
            $sql = "SELECT * FROM agentsandclients
                WHERE custombg = '$imgRuta' ";
            break;
        case 'PROPIEDAD-PDF':
            $imgRuta = 'documentospdf/' . $imgRuta;
            $sql = "SELECT * FROM propiedades WHERE documentoPdf = '$imgRuta' AND documentoPdf != NULL";
            break;
        case 'PROPIEDAD-IMAGEN':
            $imgRuta = 'imagenesPropiedad/' . $imgRuta;
            $sql = "SELECT * FROM imagenespropiedad WHERE propiedadid = '$imgRuta'";
            break;
        default:
            break;
    }

    $request = $con->select_all($sql);

    if (empty($request)) {
        return $imgRuta;
    } else {
        getImgName($ACTION);
    }
}

function viewPage(int $idpagina)
{
    require_once('Libraries/Core/Mysql.php');
    $con = new Mysql();
    $sql = "SELECT * FROM post WHERE idpost = $idpagina AND status != 0";
    $request = $con->select($sql);
    if (
        ($request['status'] == 2 and !empty($_SESSION['permisosMod']['u']))
        or  $request['status'] == 1
    ) {
        return true;
    } else {
        return false;
    }
}

function paginaEnMantenimiento()
{
    $paginaenmantenimiento = getFile('Template/mantenimiento');

    echo $paginaenmantenimiento;
}


function human_filesize($bytes, $decimals = 2)
{
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}


function timeago($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed;
    $minutes    = round($time_elapsed / 60);
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400);
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640);
    $years      = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return 'Justo Ahora';
    }
    //Minutes
    else if ($minutes <= 60) {
        if ($minutes == 1) {
            return 'Hace un minuto';
        } else {
            return "$minutes minutos atrás";
        }
    }
    //Hours
    else if ($hours <= 24) {
        if ($hours == 1) {
            return 'Una hora atrás';
        } else {
            return "$hours horas atrás";
        }
    }
    //Days
    else if ($days <= 7) {
        if ($days == 1) {
            return 'Hace un día';
        } else {
            return "$days días atrás";
        }
    }
    //Weeks
    else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            return 'Hace un mes';
        } else {
            return "$weeks semanas atrás";
        }
    }
    //Months
    else if ($months <= 12) {
        if ($months == 1) {
            return 'Hace un mes atrás';
        } else {
            return "$months meses atrás";
        }
    }
    //Years
    else {
        if ($years == 1) {
            return 'Hace un año';
        } else {
            return "$years años atrás";
        }
    }
}

function limpiarArray($array)
{
    $nuevoArray = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $valuekey => $valuevalue) {
                $value[$valuekey] = strClean($valuevalue);
            }
            $nuevoArray[$key] = $value;
        } else {
            $nuevoArray[$key] = strClean($value);
        }
    }
    return $nuevoArray;
}

function getTipos()
{
    if (!class_exists('Crear_listadoModel')) {
        require 'Models/Crear_listadoModel.php';
    }
    $model = new Crear_listadoModel();
    $request = $model->getTipos();
    return $request;
}

function getMunicipales()
{
    if (!class_exists('SettingsModel')) {
        require 'Models/SettingsModel.php';
    }
    $model = new SettingsModel();
    $municipales = $model->selectMunicipales();
    return $municipales;
}

function getAreasCapitales()
{
    if (!class_exists('SettingsModel')) {
        require 'Models/SettingsModel.php';
    }
    $model = new SettingsModel();
    $areascapitales = $model->selectAreaCapitales();
    return $areascapitales;
}


function getFormBuilder(int $idformbuilder)
{
    if (!class_exists('Mis_propiedadesModel')) {
        require 'Models/Mis_propiedadesModel.php';
    }
    $objectModel = new Mis_propiedadesModel();
    $request = $objectModel->getFormFieldsById($idformbuilder);
    return $request;
}

function getFormFieldsByIds(string $idsformbuilder)
{
    if (!class_exists('Mis_propiedadesModel')) {
        require 'Models/Mis_propiedadesModel.php';
    }
    $objectModel = new Mis_propiedadesModel();
    $request = $objectModel->getFormFieldsByIds($idsformbuilder);
    return $request;
}

function getCaracteristicas()
{
    if (!class_exists('Mis_propiedadesModel')) {
        require 'Models/Mis_propiedadesModel.php';
    }

    $misPropiedadesModel = new Mis_propiedadesModel();
    $caracteristicas = $misPropiedadesModel->getCharacteristics();
    return $caracteristicas;
}

function getDispositivo()
{
    $tablet_browser = 0;
    $mobile_browser = 0;
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $tablet_browser++;
    }

    if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $mobile_browser++;
    }

    if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
        $mobile_browser++;
    }

    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
    $mobile_agents = array(
        'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
        'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
        'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
        'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
        'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
        'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
        'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
        'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
        'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-'
    );

    if (in_array($mobile_ua, $mobile_agents)) {
        $mobile_browser++;
    }

    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
        $mobile_browser++;
        //Check for tablets on opera mini alternative headers
        $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
            $tablet_browser++;
        }
    }
    if ($tablet_browser > 0) {
        return 'Tablet';
    } else if ($mobile_browser > 0) {
        return 'Teléfono';
    } else {
        return 'PC';
    }
}

function getPaisVisitante()
{
    $ip = $_SERVER['REMOTE_ADDR']; // Esto contendrá la ip de la solicitud.

    // Puedes usar un método más sofisticado para recuperar el contenido de una página web con PHP usando una biblioteca o algo así
    // Vamos a recuperar los datos rápidamente con file_get_contents
    $dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip), true);

    return empty($dataArray["geoplugin_countryName"]) ? 'Venezuela' : $dataArray["geoplugin_countryName"];
}

function getBrowser()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($user_agent, 'MSIE') !== FALSE)
        return 'Internet explorer';
    elseif (strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
        return 'Microsoft Edge';
    elseif (strpos($user_agent, 'Trident') !== FALSE) //IE 11
        return 'Internet explorer';
    elseif (strpos($user_agent, 'Opera Mini') !== FALSE)
        return "Opera Mini";
    elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
        return "Opera";
    elseif (strpos($user_agent, 'Firefox') !== FALSE)
        return 'Mozilla Firefox';
    elseif (strpos($user_agent, 'Chrome') !== FALSE)
        return 'Google Chrome';
    elseif (strpos($user_agent, 'Safari') !== FALSE)
        return "Safari";
    else
        return 'Unknown';
}

function getDestacados()
{
    if (!class_exists('Mysql')) {
        require_once('Libraries/Core/Mysql.php');
    }

    $con = new Mysql();
    $idpackage = PAQUETE_DESTACADO;
    $sql = "SELECT  pro.idpropiedad,
                    pro.titulo,
                    pro.personaid,pro.ruta,
                    pro.precio,pro.statuspackage, 
                    pro.direccion_localizacion,pro.subtipoid,
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
                $request[$i]['subtipo'] = '';
                $sql = "SELECT * FROM imagenespropiedad WHERE propiedadid =  {$request[$i]['idpropiedad']}";
                $requestImagen = $con->select_all($sql);
                $request[$i]['imagenes'] = $requestImagen;
                if ($request[$i]['subtipoid'] != 0) {
                    $sql = "SELECT titulo FROM subtipos WHERE idsubtipo = {$request[$i]['subtipoid']}";
                    $requestSubtipo = $con->select($sql);
                    if (!empty($requestSubtipo)) {
                        $request[$i]['subtipo'] = $requestSubtipo['titulo'];
                    }
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