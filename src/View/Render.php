<?php

namespace Core\View;

/**
 * Class Render
 * @package Core\View
 */
class Render
{
    /**
     * @var string
     */
    protected $rootPath;

    /**
     * Render constructor.
     * @param $rootPath
     */
    public function __construct($rootPath)
    {
        $this->rootPath = $rootPath;
    }

    /**
     * Exploding the variables inside the closure scope
     *
     * @param string $filePath
     * @param array $data
     * @return mixed
     */
    public function process($filePath, $data)
    {
        $data['rootPath'] = $this->rootPath;
        $data['filePath'] = $filePath;

        $closure = function ($fileName, array $variables) {
            extract($variables, EXTR_REFS);
            ob_start();

            try {
                require $fileName;
            } catch (\Exception $e) {
                ob_end_clean();
                throw $e;
            }

            return ob_get_clean();
        };

        return $closure($this->rootPath . $filePath, $data);
    }
}
