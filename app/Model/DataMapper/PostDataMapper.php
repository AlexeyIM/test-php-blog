<?php

namespace App\Model\DataMapper;

use App\Model\Post;
use Core\Model\DataMapper\MysqlAbstractDataMapper;

/**
 * Class PostDataMapper
 * @package App\Model\DataMapper
 */
class PostDataMapper extends MysqlAbstractDataMapper
{
    /**
     * @var string
     */
    protected $tableName = 'posts';

    /**
     * Factory method
     *
     * @return Post
     */
    public function createModel()
    {
        return new Post();
    }

    /**
     * Post listing query creation
     *
     * @param int $limit
     * @param int $offset
     * @return array
     */
    public function getPostList($limit, $offset = 0)
    {
        $result = $this->adapter->query("SELECT SQL_CALC_FOUND_ROWS * FROM `{$this->tableName}` ORDER BY `created` DESC LIMIT ?, ?")
            ->bind(1, $offset)
            ->bind(2, $limit)
            ->fetchAll();

        return $this->hydrateResultSet($result);
    }

    /**
     * Save model
     *
     * @param Post $model
     * @return bool
     */
    public function save(Post $model)
    {
        if (!$model->id) {
            $this->adapter
                ->query("INSERT INTO `{$this->tableName}` (`title`, `preview`, `text`, `author`, `created`) VALUES(?, ?, ?, ?, ?)")
                ->bind(1, $model->title)
                ->bind(2, $model->preview)
                ->bind(3, $model->text)
                ->bind(4, $model->author)
                ->bind(5, date('Y-m-d H:i:s'));
        } else {
            $this->adapter
                ->query("UPDATE {$this->tableName} SET `title`=?, `preview`=?, `text`=?, `author`=?  WHERE `id`=?")
                ->bind(1, $model->title)
                ->bind(2, $model->preview)
                ->bind(3, $model->text)
                ->bind(4, $model->author)
                ->bind(5, $model->id);
        }

        return $this->adapter->execute();
    }
}
