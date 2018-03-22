<?php

namespace App\Helpers;

class RedisReserveWordProvider implements ReserveWordProviderInterface {

    public function reserveWords()
    {
        return ['hello', 'world'];
    }
}