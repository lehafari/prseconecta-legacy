<?php

use Stripe\Stripe;

require 'Libraries/stripe-php/init.php';
const BASE_URL = 'http://localhost/prseconecta';
//Zona Horaria
date_default_timezone_set('America/Caracas');

// Datos de conexion a base de Datos
const DB_HOST = 'localhost';
const DB_NAME = 'prseconecta';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_CHARSET = 'utf8';


// Deliminadores decimal y millar Ej. 24,189.00

const SPD = '.';
const SPM = ',';

//Simbolo de MONEDA
const SMONEY = '$';
const CURRENCY = 'USD';

// API PAYPAL
// SANDBOX -- PRUEBA
const URLPAYPAL = "https://api-m.sandbox.paypal.com";
const IDCLIENTE = 'Aabe_1Izx0fKrneg0p0nN7BIRrFNHsiVpWZJoXCfvSHzANOnFAtvhYp99i5mNhv9eJP3azGRA99SYDaY';
const SECRET = 'ENb9nRBje0xoqXzvz6HL_4dRe-0Go4-My5e_kKgWNl2ozbptjXO-5KD1QovcYNSRjjQEVBgAiqve31K8';
// LIVE
//const IDCLIENTE = '';
//const SECRET = '';
//const URLPAYPAL = "https://api-m.paypal.com";

// Crear variables constantes
//Datos envio de correo
const NOMBRE_REMITENTE = 'prseconecta';
const EMAIL_REMITENTE = 'no-reply@ecozapas.com';
const NOMBRE_EMPRESA = 'Prseconecta - Comercial';
const WEB_EMPRESA = BASE_URL;
const DESCRIPCION_EMPRESA = 'La mejor tienda en Linea de bisuteria.';
const SHAREDHASH = '';
const DESCRIPCION = 'Descripcion';
//Datos Empresa
const DIRECCION = 'Puerto Rico';
const TELEMPRESA1 = '+58 414-4432779';
const TELEMPRESA2 = '+58 424-3288227';

const EMAIL_EMPRESA = 'supportvescorpio@gmail.com';
const EMAIL_PEDIDOS = 'pedidosvescorpio@gmail.com';
const EMAIL_SUSCRIPCION = 'supportvescorpio@gmail.com';
const EMAIL_CONTACTO = 'supportvescorpio@gmail.com';

// ROLES
const RADMINISTRADOR = 1;
const RCLIENTES = 2;
const RAGENTES = 3;
// MODULOS
const MDASHBOARD = 1;
const MUSUARIOS = 2;
const MAGENTS = 3;
const MCLIENTS = 4;
const MCUSTOMFORMS = 5;
const MPAGES = 6;
const MPROPERTYS = 7;
const MCONFIGURACION = 8;

// PAGINAS

const PHOME = 1;
const PBANNER = 2;
const PTERMSCONDITIONS = 3;

// Datos para Encriptar / Desencriptar
const KEY = 'darkmax1';
const METHODENCRIPT = 'AES-128-ECB';

const INSTAGRAM = 'https://www.instagram.com/vescorpio/?hl=es-la';
const WHATSSAP = 'https://wa.me/584144432779';


// PAGINACIONES
const AGENTESPORPAGINA = 5;
const KEYGOOGLEMAPS = 'AIzaSyD_vs8Hz6TrqMf-x2rDctAW7K97weB5RFI';

// PACKAGES

const PAQUETE_REGULAR_GRATUITO = 1;
const PAQUETE_DESTACADO = 2;
const PAQUETE_SUPER_DESTACADO = 3;

const STRIPE_PUBLISHABLE_KEY = 'pk_test_51KEohaKFKZ9RdanrZVhq6IgL6zVMfDbbSE3EuMYN2dxNsEgHWUr24mGUjkFTsBXE8QJoaZk33M16oFxL0sFp8Fb600LYDJsyOT';
const STRIPE_SECRET_KEY = 'sk_test_51KEohaKFKZ9RdanruQmn2ptyrm0qhu4obgBxz3fEkEPNT1EOtdTfRopD83yGMS8xZdI4UhrV7zlgGgcZH5XAM41t00AhFiNqjs';
\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);