<?php

namespace Core\Model\Adapter;

/**
 * Class Pdo
 * @package Core\Model\Adapter
 */
class Pdo
{
    protected static $defaultOptions = [
        \PDO::ATTR_PERSISTENT => true,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ];

    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * @var \PDOStatement
     */
    protected $statement;

    /**
     * @var array
     */
    protected $config;

    /**
     * Pdo constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Connects to the db
     */
    public function connect()
    {
        $this->pdo = new \PDO(
            $this->config['dsn'],
            $this->config['username'],
            $this->config['password'],
            self::$defaultOptions
        );
    }

    /**
     * Creates prepared statement
     *
     * @param string $query
     * @return $this
     */
    public function query($query)
    {
        $this->statement = $this->getPdo()->prepare($query);

        return $this;
    }

    /**
     * Binds values to the patterns
     *
     * @param int $position
     * @param string $value
     * @param int $type
     * @return $this
     */
    public function bind($position, $value, $type = null)
    {
        if (is_null($type)) {
            $type = $this->identifyValueType($value);
        }

        $this->statement->bindValue($position, $value, $type);

        return $this;
    }

    /**
     * Returns the result of the query
     *
     * @return array
     */
    public function fetchAll()
    {
        $this->execute();
        return $this->statement->fetchAll();
    }

    /**
     * Execute function
     *
     * @return bool
     */
    public function execute()
    {
        return $this->statement->execute();
    }

    /**
     * Returns the result of the query
     *
     * @return mixed
     */
    public function fetchOne()
    {
        $this->execute();
        return $this->statement->fetch();
    }

    /**
     * Returns the count of result rows from the latest select query
     *
     * @return int
     */
    public function count()
    {
        $result = $this->pdo->query('SELECT FOUND_ROWS() count')->fetch();
        return $result['count'];
    }

    /**
     * Pdo getter
     *
     * @return \PDO
     */
    protected function getPdo()
    {
        if (!$this->pdo) {
            $this->connect();
        }

        return $this->pdo;
    }

    /**
     * Value type detector function
     *
     * @param mixed $value
     * @return int
     */
    protected function identifyValueType($value)
    {
        switch (true) {
            case is_int($value):
                $type = \PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = \PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = \PDO::PARAM_NULL;
                break;
            default:
                $type = \PDO::PARAM_STR;
        }

        return $type;
    }
}
