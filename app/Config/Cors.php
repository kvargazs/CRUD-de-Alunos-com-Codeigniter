<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Cross-Origin Resource Sharing (CORS) Configuration
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
 */
class Cors extends BaseConfig
{
    /**
     * The default CORS configuration.
     *
     * @var array{
     *      allowedOrigins: list<string>,
     *      allowedOriginsPatterns: list<string>,
     *      supportsCredentials: bool,
     *      allowedHeaders: list<string>,
     *      exposedHeaders: list<string>,
     *      allowedMethods: list<string>,
     *      maxAge: int,
     *  }
     */
    public array $default = [
        /**
         * Origins for the `Access-Control-Allow-Origin` header.
         *
         * E.g.:
         *   - ['http://localhost:3000'] // URL do seu frontend React
         *   - ['https://www.example.com']
         */
        'allowedOrigins' => ['http://localhost:3000'],  // Permitir requisições do seu frontend

        /**
         * Origin regex patterns for the `Access-Control-Allow-Origin` header.
         */
        'allowedOriginsPatterns' => [],

        /**
         * Whether to send the `Access-Control-Allow-Credentials` header.
         */
        'supportsCredentials' => true,  // Permitir cookies/credenciais

        /**
         * Set headers to allow.
         *
         * Incluindo os cabeçalhos que o frontend pode enviar.
         */
        'allowedHeaders' => [
            'Content-Type',
            'Authorization',
            'X-Requested-With',
            'Accept',
            'Origin',
            'X-Custom-Header',  // Se você tiver algum cabeçalho customizado
        ],

        /**
         * Set headers to expose.
         *
         * Para expor os cabeçalhos específicos da resposta.
         */
        'exposedHeaders' => [],

        /**
         * Set methods to allow.
         *
         * Especifica os métodos HTTP permitidos.
         */
        'allowedMethods' => ['GET', 'POST', 'PUT', 'DELETE'],

        /**
         * Set how many seconds the results of a preflight request can be cached.
         */
        'maxAge' => 7200,
    ];
}
