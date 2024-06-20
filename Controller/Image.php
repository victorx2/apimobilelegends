<?php 




require_once "ApiFetcher";

class Image extends ApiFetcher{



    
    const HERO_HEAD_PREFIX = 'HeroHead';
    const IMAGES_ENDPOINT = 'https://mapi.mobilelegends.com/api/icon';


    protected $images = [];


    public function find($key): string
    {
        if (empty($this->images)) {
            $this->images = $this->getArray(self::IMAGES_ENDPOINT);
        }

        if (! isset($this->images[$key])) {
            throw new ImageNotFoundException("Image {$key} was not found");
        }

        return $this->images[$key];
    }

    public function heroAvatar($id): string
    {
        $heroId = self::HERO_HEAD_PREFIX . str_pad($id, 3, 0, STR_PAD_LEFT);
        return $this->find($heroId . '.png');
    }


}




