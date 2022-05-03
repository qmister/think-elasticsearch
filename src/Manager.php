<?php


namespace tp5er\think\elasticsearch;

use Elasticsearch\Client;
use InvalidArgumentException;
use think\App;
use think\helper\Arr;

/**
 * Class Manager
 * @method array bulk(array $params = [])
 * @method array clearScroll(array $params = [])
 * @method array closePointInTime(array $params = [])
 * @method array count(array $params = [])
 * @method array create(array $params = [])
 * @method array delete(array $params = [])
 * @method array deleteByQuery(array $params = [])
 * @method array deleteByQueryRethrottle(array $params = [])
 * @method array deleteScript(array $params = [])
 * @method array exists(array $params = []): bool
 * @method array existsSource(array $params = []): bool
 * @method array explain(array $params = [])
 * @method array fieldCaps(array $params = [])
 * @method array get(array $params = [])
 * @method array getScript(array $params = [])
 * @method array getScriptContext(array $params = [])
 * @method array getScriptLanguages(array $params = [])
 * @method array getSource(array $params = [])
 * @method array index(array $params = [])
 * @method array info(array $params = [])
 * @method array mget(array $params = [])
 * @method array msearch(array $params = [])
 * @method array msearchTemplate(array $params = [])
 * @method array mtermvectors(array $params = [])
 * @method array openPointInTime(array $params = [])
 * @method array ping(array $params = []): bool
 * @method array putScript(array $params = [])
 * @method array rankEval(array $params = [])
 * @method array reindex(array $params = [])
 * @method array reindexRethrottle(array $params = [])
 * @method array renderSearchTemplate(array $params = [])
 * @method array scriptsPainlessExecute(array $params = [])
 * @method array scroll(array $params = [])
 * @method array search(array $params = [])
 * @method array searchMvt(array $params = [])
 * @method array searchShards(array $params = [])
 * @method array searchTemplate(array $params = [])
 * @method array termsEnum(array $params = [])
 * @method array termvectors(array $params = [])
 * @method array update(array $params = [])
 * @method array updateByQuery(array $params = [])
 * @method array updateByQueryRethrottle(array $params = [])
 * @method \Elasticsearch\Namespaces\AsyncSearchNamespace asyncSearch()
 * @method \Elasticsearch\Namespaces\AutoscalingNamespace autoscaling()
 * @method \Elasticsearch\Namespaces\CatNamespace cat()
 * @method \Elasticsearch\Namespaces\CcrNamespace ccr()
 * @method \Elasticsearch\Namespaces\ClusterNamespace cluster()
 * @method \Elasticsearch\Namespaces\DanglingIndicesNamespace danglingIndices()
 * @method \Elasticsearch\Namespaces\DataFrameTransformDeprecatedNamespace dataFrameTransformDeprecated()
 * @method \Elasticsearch\Namespaces\EnrichNamespace enrich()
 * @method \Elasticsearch\Namespaces\EqlNamespace eql()
 * @method \Elasticsearch\Namespaces\FeaturesNamespace features()
 * @method \Elasticsearch\Namespaces\FleetNamespace fleet()
 * @method \Elasticsearch\Namespaces\GraphNamespace graph()
 * @method \Elasticsearch\Namespaces\IlmNamespace ilm()
 * @method \Elasticsearch\Namespaces\IndicesNamespace indices()
 * @method \Elasticsearch\Namespaces\IngestNamespace ingest()
 * @method \Elasticsearch\Namespaces\LicenseNamespace license()
 * @method \Elasticsearch\Namespaces\LogstashNamespace logstash()
 * @method \Elasticsearch\Namespaces\MigrationNamespace migration()
 * @method \Elasticsearch\Namespaces\MlNamespace ml()
 * @method \Elasticsearch\Namespaces\MonitoringNamespace monitoring()
 * @method \Elasticsearch\Namespaces\NodesNamespace nodes()
 * @method \Elasticsearch\Namespaces\RollupNamespace rollup()
 * @method \Elasticsearch\Namespaces\SearchableSnapshotsNamespace searchableSnapshots()
 * @method \Elasticsearch\Namespaces\SecurityNamespace security()
 * @method \Elasticsearch\Namespaces\ShutdownNamespace shutdown()
 * @method \Elasticsearch\Namespaces\SlmNamespace slm()
 * @method \Elasticsearch\Namespaces\SnapshotNamespace snapshot()
 * @method \Elasticsearch\Namespaces\SqlNamespace sql()
 * @method \Elasticsearch\Namespaces\SslNamespace ssl()
 * @method \Elasticsearch\Namespaces\TasksNamespace tasks()
 * @method \Elasticsearch\Namespaces\TextStructureNamespace textStructure()
 * @method \Elasticsearch\Namespaces\TransformNamespace transform()
 * @method \Elasticsearch\Namespaces\WatcherNamespace watcher()
 * @method \Elasticsearch\Namespaces\XpackNamespace xpack()
 */
class Manager
{

    /**
     * @var App
     */
    protected $app;
    /**
     * @var Factory
     */
    protected $factory;
    /**
     * @var array
     */
    private $connections = [];

    /**
     * Manager constructor.
     * @param App $app
     * @param Factory $factory
     */
    public function __construct(App $app, Factory $factory)
    {
        $this->app     = $app;
        $this->factory = $factory;
    }

    /**
     * @return string
     */
    public function version()
    {
        return $this->factory->version();
    }

    /**
     * @param string|null $name
     * @return mixed
     */
    public function connection(string $name = null)
    {
        $name = $name ?: $this->getDefaultConnection();
        if (!isset($this->connections[$name])) {
            $client                   = $this->makeConnection($name);
            $this->connections[$name] = $client;
        }
        return $this->connections[$name];
    }

    /**
     * @return string
     */
    protected function getDefaultConnection()
    {
        return $this->app->config->get('elasticsearch.defaultConnection');
    }

    /**
     * @param string $name
     * @return Client
     */
    public function makeConnection(string $name)
    {
        $config = $this->getConfig($name);
        return $this->factory->make($config);
    }

    /**
     * @param string $name
     * @return mixed
     */
    protected function getConfig(string $name)
    {
        $connections = $this->app->config->get('elasticsearch.connections');
        if (null === $config = Arr::get($connections, $name)) {
            throw new InvalidArgumentException("Elasticsearch connection [$name] not configured.");
        }
        return $config;
    }

    /**
     * Return all of the created connections.
     * @return array
     */
    public function getConnections()
    {
        return $this->connections;
    }

    /**
     * Dynamically pass methods to the default connection.
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        return call_user_func_array([$this->connection(), $method], $parameters);
    }
}