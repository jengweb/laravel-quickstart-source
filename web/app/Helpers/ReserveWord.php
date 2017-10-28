<?php

namespace App\Helpers;

class ReserveWord {

    private $provider;

    public function __construct(ReserveWordProviderInterface $reserveWordProvider)
    {
        $this->provider = $reserveWordProvider;
    }

    public function isContainsReserveWord($text)
    {
        $words = $this->provider->reserveWords();
        foreach($words as $word){
            if(strpos($text, $word) > -1){
                return true;
            }
        }

        return false;
    }
}