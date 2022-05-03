## 安装

```shell
composer require tp5er/think-elasticsearch
```

## 基本配置

```ini
ELASTICSEARCH_HOST=localhost
ELASTICSEARCH_PORT=9200
ELASTICSEARCH_SCHEME=http
ELASTICSEARCH_USER=
ELASTICSEARCH_PASS=
```

## 常规使用

> $data = [
>     'body' => [
>         'testField' => 'abc'
>     ],
>     'index' => 'my_index',
>     'type' => 'my_type',
>     'id' => 'my_id',
> ];
>
> $client = ClientBuilder::create()->build();
> $return = $client->index($data);

您现在可以简单地替换最后两行：

```php
$return = \tp5er\think\elasticsearch\Elasticsearch::index($data);
```

这将在默认连接上运行命令。 你可以运行一个命令
任何连接（参见 `defaultConnection` 设置和 `connections` 数组
配置文件）。

```php
$return = \tp5er\think\elasticsearch\Elasticsearch::connection('connectionName')->index($data);
```

