<?php

namespace Circle314\Component\Renderer;

use Circle314\Component\Collection\Native\NativeUnkeyedCollection;

/**
 * Class JSRenderCache
 * @package Circle314\Component\Renderer
 */
abstract class AbstractRenderedJSCache implements RenderedJSCacheInterface
{
    /**
     * @var NativeUnkeyedCollection
     */
    private $cache;

    final public function __construct()
    {
        $this->cache = new NativeUnkeyedCollection();
    }

    final public function retrieveCache($delimiter = PHP_EOL)
    {
        return implode($delimiter, $this->cache()->getArrayCopy());
    }

    final public function clearCache()
    {
        $this->cache->clearCollection();
    }

    /**
     * @param $renderedScript
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     */
    final public function cacheRenderedScript($renderedScript)
    {
        $this->cache()->addCollectionItem($renderedScript);
    }

    final public function cache()
    {
        return $this->cache;
    }
}
