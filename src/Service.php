<?php


namespace tp5er\think\elasticsearch;

use Elasticsearch\Client;

class Service extends \think\Service
{
    public function register()
    {
        $this->app->bind('elasticsearch.factory', Factory::class);

        $this->app->bind('elasticsearch', function () {
            return new Manager($this->app, $this->app['elasticsearch.factory']);
        });

        $this->app->bind(Client::class, function () {
            return $this->app->make('elasticsearch')->connection();
        });
    }
}