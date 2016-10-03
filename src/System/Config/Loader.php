<?php

namespace Core\System\Config;

/**
 * Class Loader
 * @package Core\System\Config
 */
class Loader
{
    const EXTENSION_JSON = 'json';

    /**
     * Loads all config files from the path
     *
     * @param string $path
     * @return array
     */
    public static function load($path)
    {
        $configContainer = [];

        foreach (new \DirectoryIterator($path) as $fileInfo) {
            if ($fileInfo->isDot()) {
                continue;
            }
            if ($fileInfo->getExtension() == self::EXTENSION_JSON) {
                $json = file_get_contents($fileInfo->getRealPath());

                $configName = $fileInfo->getBasename('.' . $fileInfo->getExtension());
                $configContainer[$configName] = json_decode($json, true);
            }
        }

        return $configContainer;
    }
}
