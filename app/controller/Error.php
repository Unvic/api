<?php

namespace app\controller;

class Error
{
    public function __call( $name, $arguments )
    {
        return show( 4000 );
    }
}

