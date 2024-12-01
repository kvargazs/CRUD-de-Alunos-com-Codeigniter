<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Cors implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        if ($request->getMethod() === 'OPTIONS') {
            exit(0); // Responde imediatamente às requisições OPTIONS
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
