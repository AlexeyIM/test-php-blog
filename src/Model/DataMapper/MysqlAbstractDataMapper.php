<?php

namespace Core\Model\DataMapper;

use Core\Model\AbstractDataMapper;
use Core\Model\Adapter\Pdo;

/**
 * Class MysqlAbstractDataMapper
 * @package Core\Model\DataMapper
 */
abstract class MysqlAbstractDataMapper extends AbstractDataMapper
{
    /**
     * @var Pdo
     */
    protected $adapter;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string
     */
    protected $tableName;

    /**
     * MysqlAbstractDataMapper constructor.
     * @param $adapter
     * @throws \Exception
     */
    public function __construct($adapter)
    {
        $this->adapter = $adapter;

        if (!$this->tableName) {
            throw new \Exception('Table name can\'t be empty');
        }
    }

    /**
     * Returns one row by primary key
     *
     * @param int $id
     * @return mixed
     */
    public function findByPrimaryKey($id)
    {
        $result = $this->adapter->query("SELECT * FROM `{$this->tableName}` WHERE {$this->primaryKey} = ? LIMIT 1")
            ->bind(1, $id)
            ->fetchOne();

        $model = $this->createModel();
        return $this->hydrate($model, $result);
    }

    /**
     * Returns result set
     *
     * @param $limit
     * @param int $offset
     * @return array
     */
    public function getList($limit, $offset = 0)
    {
        $result = $this->adapter->query("SELECT SQL_CALC_FOUND_ROWS * FROM `{$this->tableName}` LIMIT ?, ?")
            ->bind(1, $offset)
            ->bind(2, $limit)
            ->fetchAll();

        return $this->hydrateResultSet($result);
    }

    /**
     * Returns true if deleted successfully
     *
     * @param int $id
     * @return bool
     */
    public function deleteByPrimaryKey($id)
    {
        $result = $this->adapter->query("DELETE FROM `{$this->tableName}` WHERE {$this->primaryKey} = ? LIMIT 1")
            ->bind(1, $id)
            ->execute();

        return $result;
    }

    /**
     * Count of latest select query result
     *
     * @return int
     */
    public function returnCount()
    {
        return $this->adapter->count();
    }

    /**
     * Returns hydrated models
     *
     * @param array $result
     * @return array
     */
    protected function hydrateResultSet($result)
    {
        $models = [];

        if (is_array($result) && !empty($result)) {
            foreach ($result as $row) {
                $model = $this->createModel();
                $models[] = $this->hydrate($model, $row);
            }
        }

        return $models;
    }
}
