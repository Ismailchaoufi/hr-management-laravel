<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class NewsImageScraper
{
    public function scrapeImage($url)
    {
        try {
            $response = Http::get($url);
            $html = $response->body();

            $crawler = new Crawler($html);

            $ogImage = $crawler->filter('meta[property="og:image"]')->attr('content');
            if ($ogImage) {
                return $ogImage;
            }

            $firstImage = $crawler->filter('img')->first()->attr('src');
            if ($firstImage) {
                return $this->makeAbsoluteUrl($firstImage, $url);
            }

            return null;
        } catch (\Exception $e) {
            \Log::error("Erreur lors du scraping de l'image: " . $e->getMessage());
            return null;
        }
    }

    private function makeAbsoluteUrl($relativeUrl, $baseUrl)
    {
        if (filter_var($relativeUrl, FILTER_VALIDATE_URL)) {
            return $relativeUrl;
        }

        $urlParts = parse_url($baseUrl);
        $scheme   = isset($urlParts['scheme']) ? $urlParts['scheme'] . '://' : '';
        $host     = isset($urlParts['host']) ? $urlParts['host'] : '';

        if (substr($relativeUrl, 0, 1) === '/') {
            return $scheme . $host . $relativeUrl;
        }

        return $scheme . $host . '/' . ltrim($relativeUrl, '/');
    }
}