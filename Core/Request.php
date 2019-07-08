<?php

class Request{

    public function uri()
    {
        $uri = $_SERVER["REQUEST_URI"];
        $uri = trim(parse_url($uri)["path"],'/');
        return $uri;
    }
    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}