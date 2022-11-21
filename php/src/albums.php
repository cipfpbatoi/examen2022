<?php
require '../vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

$client = new Client(HttpClient::create(['timeout' => 60]));
$crawler = $client->request('GET', 'https://www.allmusic.com/artist/the-beatles-mn0000754032/discography');

$songs = [];
$crawler->filter('section.discography table td:nth-child(3)')->each(
        function ($node,$i) use (&$songs) {
            $songs[$node->attr('class')][$i] = $node->text();
        }
    );
$crawler->filter('section.discography table td:nth-child(4)')->each(
    function ($node,$i) use (&$songs) {
        $songs[$node->attr('class')][$i] = $node->text();
    }
);
$crawler->filter('section.discography table td:nth-child(5)')->each(
    function ($node,$i) use (&$songs) {
        $songs[$node->attr('class')][$i] = $node->text();
    }
);
$crawler->filter('section.discography table td:nth-child(2) a img')->each(
    function ($node,$i) use (&$songs) {
        $songs['cover'][$i] = $node->attr('src');
    }
);
$crawler->filter('section.discography table td:nth-child(2) a')->each(
    function ($node,$i) use (&$songs) {
        $songs['link'][$i] = $node->attr('href');
    }
);

return $songs;
