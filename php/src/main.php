<?php
session_start();
require('./../vendor/autoload.php');
use App\Objectes\Album;

if (!isset($_SESSION['nick'])){
    header("Location:login.html");
}
$nick = $_SESSION['nick'];
$albums = unserialize($_SESSION['albums']);
$album = $_SESSION['album'];
?>
<!DOCTYPE>
<html lang="es">
<head>
    <title>Pagina Inici</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous">
<body>
<?php
    include_once('header.php');
    echo $albums[$album];
?>

