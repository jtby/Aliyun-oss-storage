<?php

namespace Jacobcyl\AliOSS\Plugins;

use Illuminate\Support\Facades\Log;
use League\Flysystem\Config;
use League\Flysystem\Plugin\AbstractPlugin;

class Put extends AbstractPlugin
{

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'put';
    }

    public function handle($path, $content, array $options = []){
        $config = new Config($options);
        if (method_exists($this->filesystem, 'getConfig')) {
            $config->setFallback($this->filesystem->getConfig());
        }
        
        return (bool)$this->filesystem->getAdapter()->write($path, $content, $config);
    }
}