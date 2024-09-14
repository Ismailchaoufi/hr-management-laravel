<?php

namespace App\Services;

use Symfony\Component\Panther\PantherTestCase;

class ImageExtractor
{
    public function extractImages($url)
    {
        // Start the Panther web server
        PantherTestCase::startWebServer();

        // Create a Panther client and request the URL
        $client = PantherTestCase::createPantherClient();
        $crawler = $client->request('GET', $url);

        // Extract the first image URL from the page
        $imageUrl = $crawler->filter('img')->first()->attr('src');

        return $imageUrl;
    }
}
