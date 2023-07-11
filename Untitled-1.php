<?php

class Controller{
    public $user;

    public function __construct(Type $user = null) {
        $this->user = $user;
    }


    
}