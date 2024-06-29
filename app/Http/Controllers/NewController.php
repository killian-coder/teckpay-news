<?php

namespace App\Http\Controllers;
use App\Services\NewsAPIService;
use Illuminate\Http\Request;

class NewController extends Controller {

    protected $newsAPIService;

    public function __construct( NewsAPIService $newsAPIService ) {
        $this->newsAPIService = $newsAPIService;
    }

    public function showTopHeadlinesForm() {

        $news = $this->newsAPIService->topHeadlines( 'us', '' );
        return view( 'news.top_headlines', compact( 'news' ) );
    }

    public function topHeadlines( Request $request ) {
        $country = $request->input( 'country', 'us' );
        $category = $request->input( 'category' );

        $news = $this->newsAPIService->topHeadlines( $country, $category );

        return view( 'news.show_news', [ 'news' => $news ] );
    }

    public function showEverythingForm() {

        return view( 'news.welcome' );
    }

    public function everything( Request $request ) {
        $query = $request->input( 'q' );
        $from = $request->input( 'from' );
        $to = $request->input( 'to' );
        $sortBy = $request->input( 'sortBy', 'publishedAt' );

        $news = $this->newsAPIService->everything( $query, $from, $to, $sortBy );

        return view( 'news.show_news', [ 'news' => $news ] );
    }

    public function showSourcesForm() {
        return view( 'news.sources' );
    }

    public function sources( Request $request ) {
        $country = $request->input( 'country' );
        $language = $request->input( 'language', 'en' );
        $category = $request->input( 'category' );

        $sources = $this->newsAPIService->sources( $country, $language, $category );

        return view( 'news.show_sources', [ 'sources' => $sources ] );
    }

    public function searchNews( Request $request ) {
        $query = $request->input( 'q' );
        $news = $this->newsAPIService->everything( $query, null, null, 'publishedAt' );

        return response()->json( $news );
    }
}