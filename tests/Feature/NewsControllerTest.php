<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\NewsAPIService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsControllerTest extends TestCase {
    use RefreshDatabase;

    //Mock Data from the API

    private function mockNewsData() {
        return [
            'status' => 'ok',
            'totalResults' => 2,
            'articles' => [
                [
                    'source' => [ 'id' => null, 'name' => 'Source 1' ],
                    'author' => 'Author 1',
                    'title' => 'Title 1',
                    'description' => 'Description 1',
                    'url' => 'https://example.com/article1',
                    'urlToImage' => 'https://example.com/image1.jpg',
                    'publishedAt' => '2023-01-01T00:00:00Z',
                    'content' => 'Content 1',
                ],
                [
                    'source' => [ 'id' => null, 'name' => 'Source 2' ],
                    'author' => 'Author 2',
                    'title' => 'Title 2',
                    'description' => 'Description 2',
                    'url' => 'https://example.com/article2',
                    'urlToImage' => 'https://example.com/image2.jpg',
                    'publishedAt' => '2023-01-02T00:00:00Z',
                    'content' => 'Content 2',
                ],
            ],
        ];
    }

    //Source  Mock Data

    public function testShowTopHeadlinesForm() {
        $mockNewsAPIService = $this->createMock( NewsAPIService::class );
        $mockNewsAPIService->expects( $this->once() )
        ->method( 'topHeadlines' )
        ->with( 'us', '' )
        ->willReturn( $this->mockNewsData() );

        $this->app->instance( NewsAPIService::class, $mockNewsAPIService );

        $response = $this->get( '/' );

        $response->assertStatus( 200 );
        $response->assertViewHas( 'news', $this->mockNewsData() );
    }

    public function testTopHeadlines() {
        $mockNewsAPIService = $this->createMock( NewsAPIService::class );
        $mockNewsAPIService->expects( $this->once() )
        ->method( 'topHeadlines' )
        ->with( 'us', 'technology' )
        ->willReturn( $this->mockNewsData() );

        $this->app->instance( NewsAPIService::class, $mockNewsAPIService );

        $response = $this->post( '/top-headlines', [ 'country' => 'us', 'category' => 'technology' ] );

        $response->assertStatus( 200 );
        $response->assertViewHas( 'news', $this->mockNewsData() );
    }

}