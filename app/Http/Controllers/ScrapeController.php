<?php

namespace App\Http\Controllers;

use App\Models\Links\ListLinks;
use Goutte\Client;

class ScrapeController extends Controller
{
    public function getInfoNews($url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $urls = array_keys(ListLinks::$links);

        $title = $crawler->filter('.a_t')->text();
        $encabezado = $crawler->filter('.a_t')->text();
        $content = $crawler->filter('h2')->text();
        $logo = $crawler->filter('.ep_i')->attr('src');
        $divWithClass = $crawler->filter('.a_c');

        $pTexts = $divWithClass->filter('p')->each(function ($node) {
            return $node->text();
        });
        $imagen = $crawler->filter('._re')->attr('src');

        return ['title' => $title, 'encabezado' => $encabezado, 'content' => $content, 'imagen' => $imagen, 'pTexts' => $pTexts, 'logo' => $logo, 'urls' => $urls];
    }

    public function getDataNews($url){
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $urls = array_keys(ListLinks::$links);

        $new = $crawler->filter('.c--m');
        $info_news = $new->each(function ($node) {
            $title = $node->filter('.c_t')->filter('a')->text();
            $link = $node->filter('.c_t')->filter('a')->attr('href');
            $image = $node->filter('.c_m_e')->attr('src');
            $content = $node->filter('.c_d')->text();
            $link_clear = str_replace('https://elpais.com/', '', $link);
            $link_explode = explode('/', $link_clear);
            return [
                'title' => $title,
                'link' => [
                    'country' => $link_explode[0],
                    'date' => $link_explode[1],
                    'title' => $link_explode[2],
                ],
                'image' => $image,
                'content' => $content,
            ];
        });
        $title = $crawler->filter('title')->text();
        $logo = $crawler->filter('.ep_i')->attr('src');

        return ['info_news' => $info_news, 'title' => $title, 'logo' => $logo, 'urls' => $urls];
    }
}
