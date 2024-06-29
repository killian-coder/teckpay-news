<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\NewsAPIService;
use Mockery;

class NewControllerTest extends TestCase {
    use RefreshDatabase;

    protected $newsAPIServiceMock;

    public function setUp(): void {
        parent::setUp();

        // mock NewsAPIService
        $this->newsAPIServiceMock = Mockery::mock( NewsAPIService::class );

        // Binding the mock
        $this->app->instance( NewsAPIService::class, $this->newsAPIServiceMock );
    }

    public function tearDown(): void {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */

    public function it_displays_top_headlines_form() {
        // Mock response
        $this->newsAPIServiceMock
        ->shouldReceive( 'topHeadlines' )
        ->with( 'us', '' )
        ->andReturn( [ 'articles' => [] ] );

        $response = $this->get( '/news/top-headlines-form' );

        $response->assertStatus( 200 );
        $response->assertViewIs( 'news.top_headlines' );
        $response->assertViewHas( 'news' );
    }

    /** @test */

    public function it_displays_top_headlines() {
        $country = 'us';
        $category = '';

        // Mock the response from the NewsAPIService
        $this->newsAPIServiceMock
        ->shouldReceive( 'topHeadlines' )
        ->with( $country, $category )
        ->andReturn( [ 'articles' => [] ] );

        $response = $this->post( '/news/top-headlines', [
            'country' => $country,
            'category' => $category,
        ] );

        $response->assertStatus( 200 );
        $response->assertViewIs( 'news.show_news' );
        $response->assertViewHas( 'news' );
    }

    /** @test */

    public function it_displays_everything_form() {
        $response = $this->get( '/news/everything-form' );

        $response->assertStatus( 200 );
        $response->assertViewIs( 'news.welcome' );
    }

    /** @test */

    public function it_displays_everything() {
        $query = 'test';
        $from = null;
        $to = null;
        $sortBy = 'publishedAt';

        // Mock the response from the NewsAPIService
        $this->newsAPIServiceMock
        ->shouldReceive( 'everything' )
        ->with( $query, $from, $to, $sortBy )
        ->andReturn( [ 'articles' => [] ] );

        $response = $this->post( '/news/everything', [
            'q' => $query,
            'from' => $from,
            'to' => $to,
            'sortBy' => $sortBy,
        ] );

        $response->assertStatus( 200 );
        $response->assertViewIs( 'news.show_news' );
        $response->assertViewHas( 'news' );
    }

    /** @test */

    public function it_displays_sources_form() {
        $response = $this->get( '/news/sources-form' );

        $response->assertStatus( 200 );
        $response->assertViewIs( 'news.sources' );
    }

    /** @test */

    public function it_displays_sources() {
        $country = 'us';
        $language = 'en';
        $category = '';

        // Mock the response from the NewsAPIService
        $this->newsAPIServiceMock
        ->shouldReceive( 'sources' )
        ->with( $country, $language, $category )
        ->andReturn( [ 'sources' => [] ] );

        $response = $this->post( '/news/sources', [
            'country' => $country,
            'language' => $language,
            'category' => $category,
        ] );

        $response->assertStatus( 200 );
        $response->assertViewIs( 'news.show_sources' );
        $response->assertViewHas( 'sources' );
    }

    /** @test */

    public function it_searches_news() {
        $query = 'test';

        // Mock the response from the NewsAPIService
        $this->newsAPIServiceMock
        ->shouldReceive( 'everything' )
        ->with( $query, null, null, 'publishedAt' )
        ->andReturn( [ 'articles' => [] ] );

        $response = $this->post( '/news/search', [
            'q' => $query,
        ] );

        $response->assertStatus( 200 );
        $response->assertJson( [ 'articles' => [] ] );
    }
}