<?php
class App
{
    protected $controller = 'Gscholar';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        if (!empty($url)) {
            $controllerFileName = '../app/controllers/' . ucfirst($url[0]) . '.php';
            if (file_exists($controllerFileName)) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            } 
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } 
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = rtrim($url, "/");
        $url = ltrim($url, "/");
        if (empty($url)) {
            unset($url);
        }
        if (isset($url)) {
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            return [];
        }
    }
}
?>
