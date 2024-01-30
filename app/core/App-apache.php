<?php 

class App {
    protected $controller = 'Login';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        if (!empty($url)) {
            $controllerFileName = '../app/controllers/' . ucfirst($url[0]) . '.php';
            if (file_exists($controllerFileName)) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            } else {
                // Handle jika file controller tidak ditemukan
                $this->controllerNotFound();
                return;
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                // Handle jika method tidak ditemukan
                $this->methodNotFound();
                return;
            }
        }

        // params
        if( !empty($url) ) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // $url = 'http://kp-angga.test/home/getDataTable?page=1&length=10&search[value]=&order[0][column]=0&order[0][dir]=asc';
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            // echo "URL parameter is not set.";
            return [];
        }
    }

    protected function controllerNotFound()
    {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>404 Not Found</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        </head>
        <body class="bg-gray-100 h-screen flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">404 Not Found</h1>
                <p class="text-lg text-gray-600">Halaman Tidak Ditemukan!</p>
                
            </div>
        </body>
        </html>';
        http_response_code(404);
        die();
    }

    protected function methodNotFound()
    {
        // Tambahkan log atau tindakan lain yang sesuai dengan kebutuhan Anda
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>404 Not Found</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        </head>
        <body class="bg-gray-100 h-screen flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">404 Not Found</h1>
                <p class="text-lg text-gray-600">Halaman Tidak Ditemukan!</p>
            </div>
        </body>
        </html>';
        http_response_code(404);
        die();
    }

}





