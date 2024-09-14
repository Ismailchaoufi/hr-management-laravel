<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Http;
use App\Services\NewsImageScraper;
use SimplePie;
use Illuminate\Support\Facades\Cache;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NewsController extends Controller
{
    public function index()
    {
        return view('news.index');
    }

    public function events()
    {
        return view('news.events');
    }


   /* public function journals()
    {
        $newskey = env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'sources'=>'bbc-news',
            //'country' => 'ma',
            //'q'=>"ressources humaines" OR "human resources",
            'apiKey' => $newskey
        ]);
        $news = $response->json();
        $newsdata = $news['articles'];

        return view('news.journals', compact('newsdata'));
    }*/
    public function journals()
    {
        $feed = new SimplePie();
        $feed->set_feed_url('https://www.culture-rh.com/feed');
        // Set a custom cache location
        $cacheDir = storage_path('app/simplepie');
        if (!file_exists($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }
        $feed->set_cache_location($cacheDir);
        $feed->init();
        $feed->handle_content_type();

        $items = $feed->get_items(0, 12); // Get the first 10 items

        return view('news.journals', ['items' => $items]);
    }

    public function weather()
    {$apiKey = env('WEATHERSTACK_API_KEY');
        $city = 'Benguerir';

        if (!$apiKey) {
            return view('news.weather', ['error' => 'Clé API manquante.']);
        }

        $response = Http::get("http://api.weatherstack.com/current?access_key={$apiKey}&query={$city}&units=m");
        $weather = $response->json();

        if (isset($weather['current'])) {
            return view('news.weather', compact('weather'));
        } else {
            $error = 'La réponse de l\'API n\'est pas au format attendu.';
            return view('news.weather', compact('error'));
        }
        return view('news.weather');

    }

}

