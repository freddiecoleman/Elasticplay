<?php namespace App\Repositories;

/**
 * Class BookRepository
 * @package App\Repositories
 * @author Freddie Coleman <f.coleman@hotmail.co.uk>
 */
class BookRepository
{

    /**
     * @param array $params
     */
    public function create(Array $params)
    {
        $book = new \Book();
        $book->title = $params['title'];
        $book->body = $params['body'];
        $book->save();
    }
}