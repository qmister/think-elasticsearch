<?php


return [

    /**
     * You can specify one of several different connections when building an
     * Elasticsearch client.
     *
     * Here you may specify which of the connections below you wish to use
     * as your default connection when building an client. Of course you may
     * use create several clients at once, each with different configurations.
     */

    'defaultConnection' => 'default',

    /**
     * These are the connection parameters used when building a client.
     */

    'connections' => [

        'default' => [
            /**
             * Hosts
             *
             * This is an array of hosts that the client will connect to. It can be a
             * single host, or an array if you are running a cluster of Elasticsearch
             * instances.
             * This is the only configuration value that is mandatory.
             * Presently using "extended" host configuration method
             */
            'hosts' => [
                [
                    'host'   => env('ELASTICSEARCH_HOST', 'localhost'),
                    'port'   => env('ELASTICSEARCH_PORT', 9200),
                    'scheme' => env('ELASTICSEARCH_SCHEME', null),
                    'user'   => env('ELASTICSEARCH_USER', null),
                    'pass'   => env('ELASTICSEARCH_PASS', null),
                ],
            ],
            /**
             * SSL
             *
             * If your Elasticsearch instance uses an out-dated or self-signed SSL
             * certificate, you will need to pass in the certificate bundle.  This can
             * either be the path to the certificate file (for self-signed certs), or a
             * package like https://github.com/Kdyby/CurlCaBundle.  See the documentation
             * below for all the details.
             *
             * If you are using SSL instances, and the certificates are up-to-date and
             * signed by a public certificate authority, then you can leave this null and
             * just use "https" in the host path(s) above and you should be fine.
             *
             */

            'sslVerification'    => null,
            /**
             * Retries
             *
             * By default, the client will retry n times, where n = number of nodes in
             * your cluster. If you would like to disable retries, or change the number,
             * you can do so here.
             *
             */
            'retries'            => null,
            /**
             * The remainder of the configuration options can almost always be left
             * as-is unless you have specific reasons to change them.  Refer to the
             * appropriate sections in the Elasticsearch documentation for what each option
             * does and what values it expects.
             */

            /**
             * Sniff On Start
             */
            'sniffOnStart'       => false,

            /**
             * HTTP Handler
             */
            'httpHandler'        => null,
            /**
             * Connection Pool
             */
            'connectionPool'     => null,
            /**
             * Connection Selector
             */
            'connectionSelector' => null,
            /**
             * Serializer
             */
            'serializer'         => null,
            /**
             * Connection Factory
             */
            'connectionFactory'  => null,
            /**
             * Endpoint
             */
            'endpoint'           => null,
            'namespaces'         => [],

            /**
             * Logging composer require monolog/monolog
             */
            'logging'            => false,
            // If you have an existing instance of Monolog you can use it here.
            // 'logObject' => \Log::getMonolog(),
            'logPath'            => app()->getRuntimePath() . 'log' . DIRECTORY_SEPARATOR . 'elasticsearch.log',
            'logLevel'           => Monolog\Logger::INFO,
        ],

    ],
];
