<?php

namespace Apsl\Inf\Lab01\Controller;

class HashGenerator
{
    public function generateHash() : string
    {
        return sha1(time());
    }

}