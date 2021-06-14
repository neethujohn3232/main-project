<?php
session_start();
// require 'vendor/autoload.php';
require 'src/Fernet.php';
require 'src/Exception.php';
require 'src/InvalidTokenException.php';
require 'src/TypeException.php';
require 'src/FernetMsgpack.php';

use Fernet\Fernet;
use Fernet\InvalidTokenException;

// $key = '[Base64url encoded fernet key]'; // or 
$key = Fernet::generateKey();
// $_SESSION['key']=$key;
$fernet = new Fernet($key); // or new FernetMsgpack($key);

$token = $fernet->encode('string message');
echo $token;

try {
    $message = $fernet->decode($token);
} catch (InvalidTokenException $exception) {
    echo 'Token is not valid';
}
?>