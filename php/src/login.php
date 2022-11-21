<?php
require_once ('./../vendor/autoload.php');
session_start();

use App\Objectes\Album;
use App\Util\LogFactory;



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $album = include_once('albums.php');
    $log = LogFactory::getLogger('accesos');
    for ($i = 0; $i < count($album['title']); $i++) {
        $title = strtolower(eliminar_tildes($album['title'][$i]));
        $albums[$title] = new Album(
            $album['title'][$i],
            $album['year'][$i],
            $album['label'][$i],
            $album['cover'][$i],
            $album['link'][$i]
        );
    }

    extract($_POST);

    if (in_array($password, array_keys($albums))) {
        $_SESSION['nick'] = $nick;
        $_SESSION['albums'] = serialize($albums);
        $_SESSION['album'] = $password;
        $log->info('Acces Nick', ['nick' => $nick, 'album' => $password]);
        header('Location:main.php');
    } else {
        header("Location:login.html");
        $log->warning('Acces incorrecte', ['nick' => $nick]);
    }
} else {
    header('Location:login.html');
}
