<?php

use App\Repositories\BookRepository;

Book::created(
    function($book) {
        $client = new Elasticsearch\Client();
        $client->index(
            [
                'index' => 'elasticplay',
                'type' => 'book',
                'id' => $book->id,
                'body' => $book->toArray()
            ]
        );
    }
);

Book::updated(
    function($book) {
        $client = new Elasticsearch\Client();
        $client->index(
            [
                'index' => 'elasticplay',
                'type' => 'book',
                'id' => $book->id,
                'body' => $book->toArray()
            ]
        );
    }
);

Book::deleted(
    function($book) {
        $client = new Elasticsearch\Client();
        $client->delete(
            [
                'index' => 'elasticplay',
                'type' => 'book',
                'id' => $book->id
            ]
        );
    }
);

Route::get(
    '/',
    function() {
        $book = new BookRepository();
        $book->create(
            [
                'title' => 'test2',
                'body' => 'hello2'
            ]
        );
    }
);
