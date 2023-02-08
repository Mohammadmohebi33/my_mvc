<?php

namespace App\Core;
use function App\helper\site_url;

class Request{

    private $params;
    private $method;
    private $agent;
    private $ip;
    private $url;

    /**
     * @param $params
     * @param $method
     * @param $agent
     * @param $ip
     */
    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->agent = $_SERVER['REMOTE_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->url = strtok($_SERVER['REQUEST_URI'] , "?");
    }

    /**
     * @return false|string
     */
    public function getUrl(): bool|string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getMethod(): mixed
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getAgent(): mixed
    {
        return $this->agent;
    }

    /**
     * @return mixed
     */
    public function getIp(): mixed
    {
        return $this->ip;
    }


    public function input($key)
    {
        return $this->params[$key] ?? null;
    }


    public function isset($key)
    {
        return isset($this->params[$key]);
    }

    public function redirect($route)
    {
        header("Location:" .site_url($route));
    }
}
