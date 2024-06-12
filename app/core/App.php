<?php

class App
{
    private $controller = 'home';
    private $method = 'index';
    private $params = [];

    private function strToCapitalize($string)
    {
        $string = str_replace('-', ' ', $string);
        $string = ucwords($string);
        $string = str_replace(' ', '', $string);
        return $string;
    }

    public function __construct()
    {
        $url = $this->parseURL();

        // controller 
        if (isset($url) && isset($url[0]) && file_exists('../app/controllers/' . $this->strToCapitalize($url[0]) . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        } else if (isset($url) && isset($url[0]) && !file_exists('../app/controllers/' . $this->strToCapitalize($url[0]) . '.php')) {
            $this->controller = 'NotFound';
        }

        $this->controller = $this->strToCapitalize($this->controller);

        // init object
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if (isset($url) && isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // running
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}
