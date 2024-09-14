<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use SimplePie;
use Illuminate\Support\Facades\Cache;

class AccueilController extends Controller
{
    public function index()
    {
        $images = [
            asset('images/bg1.jpg'),  // Image stockée localement
            asset('images/bg2.jpg'),
            asset('images/bg3.jpg')
        ];
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


        return view('welcome', compact('images','items'));
    }

    public function actualites()
    {
        return view('news.index');
    }

    public function actualitesEvenements()
    {
        return view('news.events');
    }

    public function actualitesJournaux()
    {
        return view('news.journals');
    }

    public function actualitesMeteo()
    {
        return view('news.weather');
    }

    public function about()
    {
        return view('about.index');
    }

    public function provinceRhamna()
    {
        return view('about.provinceRhamna');
    }

    public function directeurRH()
    {
        return view('about.directeurRH');
    }

    public function divisionRH()
    {
        return view('about.divisionRH');
    }

    public function contact()
    {
        return view('contact');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
