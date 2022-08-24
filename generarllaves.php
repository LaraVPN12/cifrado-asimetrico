<?php
//Argumentos para generar ambas llaves
$configuration = array(
    "config" => "C:/xampp/php/extras/openssl/openssl.cnf",
    'private_key_bits' => 2048,
    'default_md' => "sha256",
);
//Creacion de llaves
$generate = openssl_pkey_new($configuration);
//Exportamos el contenido de la llave primaria a la variable llamada keypriv
openssl_pkey_export($generate, $keypriv, NULL, $configuration);
//Obtenemos los detalles para general la llave publica
$keypub = openssl_pkey_get_details($generate);
//Crea el archivo .key de la llave privada
file_put_contents('private.key',$keypriv);
//Crea el archivo .key de la llave publica
file_put_contents('public.key',$keypub['key']);
echo "<br/>LLAVES GENERADAS CORRECTAMENTE"
?>