<?php

 require_once "ApiFetcher.php";

class MobileLegends extends ApiFetcher
{
    protected static $client;


    public static function make(string $fetcher)
    {
        if (!class_exists($fetcher) || ! is_subclass_of($fetcher, ApiFetcher::class)) {
            throw new InvalidArgumentException("Fetcher {$fetcher} is not a valid fetcher or does not exist");
        }

        if (!isset(self::$client)) {
            self::$client = new Client();
        }

        return new $fetcher(self::$client);
    }

}