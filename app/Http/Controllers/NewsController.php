<?php

namespace App\Http\Controllers;

use App\Models\Links\ListLinks;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->data = new ScrapeController();
    }
    public function home()
    {
        $url = 'https://elpais.com/noticias/nicaragua/';
        return view('news', $this->data->getDataNews($url));
    }

    public function newsCountry($country)
    {
        $url = ListLinks::$links[$country];
        return view('news', $this->data->getDataNews($url));
    }

    public function info($country, $date, $title)
    {
        $url = 'https://elpais.com/' . $country . '/' . $date . '/' . $title;
        return view('info', $this->data->getInfoNews($url));
    }
}
