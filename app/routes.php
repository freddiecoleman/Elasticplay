<?php

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
        $client->deletex(
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
        $book = new Book();
        $book->title = "test";
        $book->body = "hello";
        $book->save();
    }
);
