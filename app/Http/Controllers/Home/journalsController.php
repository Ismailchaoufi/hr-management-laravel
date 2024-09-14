<?php
namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Http;
use SimplePie;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JournalsController extends Controller
{
    public function journals()
    {
        $feed = new SimplePie();
        $feed->set_feed_url('https://www.hespress.com/feed');
        // Set a custom cache location
        $cacheDir = storage_path('app/simplepie');
        if (!file_exists($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }
        $feed->set_cache_location($cacheDir);
        $feed->init();
        $feed->handle_content_type();

        $items = $feed->get_items(0, 12); // Get the first 10 items

        return view('welcome', ['items' => $items]);
    }
    
}
