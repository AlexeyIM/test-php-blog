<?php

namespace Core\Model;

/**
 * Class AbstractDataMapper
 * @package Core\Model
 */
abstract class AbstractDataMapper
{
    /**
     * @return object
     */
    abstract public function createModel();

    /**
     * Fills model's fields by row values
     *
     * @param object $model
     * @param array $row
     * @return object
     */
    protected function hydrate($model, $row)
    {
        if (!is_array($row) || empty($row)) {
            return $model;
        }

        foreach ($row as $column => $value) {
            if (property_exists($model, $column)) {
                $model->{$column} = $value;
            }
        }

        return $model;
    }

    /**
     * Model to array converter
     *
     * @param object $model
     * @return array
     */
    public static function extract($model)
    {
        return get_object_vars($model);
    }
}
