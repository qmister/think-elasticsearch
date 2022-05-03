<?php


namespace tp5er\think\elasticsearch;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use think\helper\Arr;

class Factory
{
    /**
     * @var array
     */
    protected $configMappings = [
        'sslVerification'    => 'setSSLVerification',
        'sniffOnStart'       => 'setSniffOnStart',
        'retries'            => 'setRetries',
        'httpHandler'        => 'setHandler',
        'connectionPool'     => 'setConnectionPool',
        'connectionSelector' => 'setSelector',
        'serializer'         => 'setSerializer',
        'connectionFactory'  => 'setConnectionFactory',
        'endpoint'           => 'setEndpoint',
        'namespaces'         => 'registerNamespace',
    ];

    /**
     * Make the Elasticsearch client for the given named configuration, or
     * the default client.
     *
     * @param array $config
     *
     * @return Client
     */
    public function make(array $config)
    {
        return $this->buildClient($config);
    }

    /**
     * @return string
     */
    public function version()
    {
        return Client::VERSION;
    }

    /**
     * @param array $config
     * @return Client
     */
    public function buildClient(array $config)
    {
        $clientBuilder = ClientBuilder::create();
        $clientBuilder->setHosts($config['hosts']);

        // Configure logging
        if (Arr::get($config, 'logging')) {

            if (!class_exists(StreamHandler::class) || !class_exists(Logger::class)) {
                throw new \RuntimeException('Please composer require monolog/monolog');
            }
            $logObject = Arr::get($config, 'logObject');
            $logPath   = Arr::get($config, 'logPath');
            $logLevel  = Arr::get($config, 'logLevel');
            if ($logObject && $logObject instanceof LoggerInterface) {
                $clientBuilder->setLogger($logObject);
            } elseif ($logPath && $logLevel) {
                $handler   = new StreamHandler($logPath, $logLevel);
                $logObject = new Logger('log');
                $logObject->pushHandler($handler);
                $clientBuilder->setLogger($logObject);
            }
        }

        // Set additional client configuration
        foreach ($this->configMappings as $key => $method) {
            $value = Arr::get($config, $key);
            if (is_array($value)) {
                foreach ($value as $vItem) {
                    $clientBuilder->$method($vItem);
                }
            } elseif ($value !== null) {
                $clientBuilder->$method($value);
            }
        }
        // Build and return the client
        return $clientBuilder->build();
    }
}