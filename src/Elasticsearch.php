<?php


namespace tp5er\think\elasticsearch;

use Elasticsearch\Client;
use think\Facade;

/**
 * Class Elasticsearch
 * @package tp5er\think\elasticsearch
 * @mixin Manager
 * @method static version();
 * @method static Client connection($name = null);
 * @method static array bulk(array $params = [])
 * @method static array clearScroll(array $params = [])
 * @method static array closePointInTime(array $params = [])
 * @method static array count(array $params = [])
 * @method static array create(array $params = [])
 * @method static array delete(array $params = [])
 * @method static array deleteByQuery(array $params = [])
 * @method static array deleteByQueryRethrottle(array $params = [])
 * @method static array deleteScript(array $params = [])
 * @method static array exists(array $params = []): bool
 * @method static array existsSource(array $params = []): bool
 * @method static array explain(array $params = [])
 * @method static array fieldCaps(array $params = [])
 * @method static array get(array $params = [])
 * @method static array getScript(array $params = [])
 * @method static array getScriptContext(array $params = [])
 * @method static array getScriptLanguages(array $params = [])
 * @method static array getSource(array $params = [])
 * @method static array index(array $params = [])
 * @method static array info(array $params = [])
 * @method static array mget(array $params = [])
 * @method static array msearch(array $params = [])
 * @method static array msearchTemplate(array $params = [])
 * @method static array mtermvectors(array $params = [])
 * @method static array openPointInTime(array $params = [])
 * @method static array ping(array $params = []): bool
 * @method static array putScript(array $params = [])
 * @method static array rankEval(array $params = [])
 * @method static array reindex(array $params = [])
 * @method static array reindexRethrottle(array $params = [])
 * @method static array renderSearchTemplate(array $params = [])
 * @method static array scriptsPainlessExecute(array $params = [])
 * @method static array scroll(array $params = [])
 * @method static array search(array $params = [])
 * @method static array searchMvt(array $params = [])
 * @method static array searchShards(array $params = [])
 * @method static array searchTemplate(array $params = [])
 * @method static array termsEnum(array $params = [])
 * @method static array termvectors(array $params = [])
 * @method static array update(array $params = [])
 * @method static array updateByQuery(array $params = [])
 * @method static array updateByQueryRethrottle(array $params = [])
 * @method static \Elasticsearch\Namespaces\AsyncSearchNamespace asyncSearch()
 * @method static \Elasticsearch\Namespaces\AutoscalingNamespace autoscaling()
 * @method static \Elasticsearch\Namespaces\CatNamespace cat()
 * @method static \Elasticsearch\Namespaces\CcrNamespace ccr()
 * @method static \Elasticsearch\Namespaces\ClusterNamespace cluster()
 * @method static \Elasticsearch\Namespaces\DanglingIndicesNamespace danglingIndices()
 * @method static \Elasticsearch\Namespaces\DataFrameTransformDeprecatedNamespace dataFrameTransformDeprecated()
 * @method static \Elasticsearch\Namespaces\EnrichNamespace enrich()
 * @method static \Elasticsearch\Namespaces\EqlNamespace eql()
 * @method static \Elasticsearch\Namespaces\FeaturesNamespace features()
 * @method static \Elasticsearch\Namespaces\FleetNamespace fleet()
 * @method static \Elasticsearch\Namespaces\GraphNamespace graph()
 * @method static \Elasticsearch\Namespaces\IlmNamespace ilm()
 * @method static \Elasticsearch\Namespaces\IndicesNamespace indices()
 * @method static \Elasticsearch\Namespaces\IngestNamespace ingest()
 * @method static \Elasticsearch\Namespaces\LicenseNamespace license()
 * @method static \Elasticsearch\Namespaces\LogstashNamespace logstash()
 * @method static \Elasticsearch\Namespaces\MigrationNamespace migration()
 * @method static \Elasticsearch\Namespaces\MlNamespace ml()
 * @method static \Elasticsearch\Namespaces\MonitoringNamespace monitoring()
 * @method static \Elasticsearch\Namespaces\NodesNamespace nodes()
 * @method static \Elasticsearch\Namespaces\RollupNamespace rollup()
 * @method static \Elasticsearch\Namespaces\SearchableSnapshotsNamespace searchableSnapshots()
 * @method static \Elasticsearch\Namespaces\SecurityNamespace security()
 * @method static \Elasticsearch\Namespaces\ShutdownNamespace shutdown()
 * @method static \Elasticsearch\Namespaces\SlmNamespace slm()
 * @method static \Elasticsearch\Namespaces\SnapshotNamespace snapshot()
 * @method static \Elasticsearch\Namespaces\SqlNamespace sql()
 * @method static \Elasticsearch\Namespaces\SslNamespace ssl()
 * @method static \Elasticsearch\Namespaces\TasksNamespace tasks()
 * @method static \Elasticsearch\Namespaces\TextStructureNamespace textStructure()
 * @method static \Elasticsearch\Namespaces\TransformNamespace transform()
 * @method static \Elasticsearch\Namespaces\WatcherNamespace watcher()
 * @method static \Elasticsearch\Namespaces\XpackNamespace xpack()
 */
class Elasticsearch extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeClass()
    {
        return 'elasticsearch';
    }
}