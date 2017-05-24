<?php

namespace Circle314\Renderer;

interface RenderedJSCacheInterface
{
    public function cacheRenderedScript($renderedScript);
    public function clearCache();
    public function retrieveCache($delimiter = PHP_EOL);
}

?>