
[中文文档](./README.md)

[英文文档](./README_EN.md)

## Installation and Configuration

Install the `tp5er/think-elasticsearch` package via composer:

```shell
composer require tp5er/think-elasticsearch
```

##### Alternative configuration method via .env file

After you publish the configuration file as suggested above, you may configure Elastic Search
by adding the following to laravel `.env` file

```ini
ELASTICSEARCH_HOST=localhost
ELASTICSEARCH_PORT=9200
ELASTICSEARCH_SCHEME=http
ELASTICSEARCH_USER=
ELASTICSEARCH_PASS=
```


## Usage

The `Elasticsearch` facade is just an entry point into the [ES client](https://github.com/elastic/elasticsearch-php),
so previously you might have used:

```php
$data = [
    'body' => [
        'testField' => 'abc'
    ],
    'index' => 'my_index',
    'type' => 'my_type',
    'id' => 'my_id',
];

$client = ClientBuilder::create()->build();
$return = $client->index($data);
```

You can now replace those last two lines with simply:

```php
$return = \tp5er\think\elasticsearch\Elasticsearch::index($data);
```

That will run the command on the default connection.  You can run a command on
any connection (see the `defaultConnection` setting and `connections` array in
the configuration file).

```php
$return = \tp5er\think\elasticsearch\Elasticsearch::connection('connectionName')->index($data);
```

## Bugs, Suggestions and Contributions


