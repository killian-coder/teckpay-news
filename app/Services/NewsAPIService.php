<?php

namespace App\Services;

use GuzzleHttp\Client;

class NewsAPIService {
    protected $client;

    public function __construct() {
        $this->client = new Client( [
            'base_uri' => 'https://newsapi.org/v2/',
            'headers' => [
                'Authorization' => 'Bearer ' . env( 'NEWSAPI_KEY' ),
            ]
        ] );
    }

    public function topHeadlines( $country = 'us', $category = null ) {
        $response = $this->client->get( 'top-headlines', [
            'query' => [
                'country' => $country,
                'category' => $category,
            ]
        ] );

        return json_decode( $response->getBody()->getContents(), true );
    }

    public function everything( $query, $from = null, $to = null, $sortBy = 'publishedAt' ) {
        $response = $this->client->get( 'everything', [
            'query' => [
                'q' => $query,
                'from' => $from,
                'to' => $to,
                'sortBy' => $sortBy,
            ]
        ] );

        return json_decode( $response->getBody()->getContents(), true );
    }

    public function sources( $country = null, $language = 'en', $category = null ) {
        $response = $this->client->get( 'sources', [
            'query' => [
                'country' => $country,
                'language' => $language,
                'category' => $category,
            ]
        ] );

        return json_decode( $response->getBody()->getContents(), true );
    }
}