<?php

namespace App\Controller;

use App\Model\DataMapper\PostDataMapper;
use App\Model\Post;
use Core\Controller\AbstractController;
use Core\Http\Request;
use Core\Http\Response;

/**
 * Class PostController
 * @package App\Controller
 */
class PostController extends AbstractController
{
    const POSTS_PER_PAGE = 5;

    /**
     * Post listing page action
     *
     * @param int $page
     * @return Response
     */
    public function listAction($page = 1)
    {
        $mapper = $this->createPostMapper();
        $posts = $mapper->getPostList(self::POSTS_PER_PAGE, ($page - 1) * self::POSTS_PER_PAGE);

        // prepare pagination variables
        $count = $mapper->returnCount();
        $showPreviousButton = $count > self::POSTS_PER_PAGE && ($count - $page * self::POSTS_PER_PAGE > 0);
        $showNextButton = $count > self::POSTS_PER_PAGE && $page > 1;

        return $this->render('/view/post/list.php', [
            'pageTitle' => 'List of posts',
            'posts' => $posts,
            'showPreviousButton' => $showPreviousButton,
            'showNextButton' => $showNextButton,
            'currentPage' => $page,
        ]);
    }

    /**
     * View a post page action
     *
     * @param int $postId
     * @return Response
     */
    public function viewAction($postId)
    {
        $post = $this->createPostMapper()->findByPrimaryKey($postId);

        if (!$post->id) {
            return $this->redirectToList();
        }

        return $this->render('/view/post/view.php', ['pageTitle' => $post->title, 'post' => $post]);
    }

    /**
     * Add new post page action
     *
     * @return Response
     */
    public function addAction()
    {
        $mapper = $this->createPostMapper();
        $model = $mapper->createModel();

        if ($this->getRequest()->getServer()->get('REQUEST_METHOD') == Request::HTTP_METHOD_POST) {
            return $this->editPost($mapper, $model);
        }

        return $this->render('/view/post/add.php', ['pageTitle' => 'Add a new post', 'post' => $model]);
    }

    /**
     * Edit the post page action
     *
     * @param int $postId
     * @return Response
     */
    public function editAction($postId)
    {
        $mapper = $this->createPostMapper();
        $model = $mapper->findByPrimaryKey($postId);

        if ($this->getRequest()->getServer()->get('REQUEST_METHOD') == Request::HTTP_METHOD_POST) {
            return $this->editPost($mapper, $model);
        }

        return $this->render('/view/post/add.php', ['pageTitle' => 'Edit the post', 'post' => $model]);
    }

    /**
     * Delete the post page action
     *
     * @param int $id
     * @return Response
     */
    public function deleteAction($id)
    {
        $mapper = $this->createPostMapper();

        if ($this->getRequest()->getServer()->get('REQUEST_METHOD') == Request::HTTP_METHOD_POST) {
            $mapper->deleteByPrimaryKey($id);
            return $this->redirectToList();
        }

        return $this->render('/view/post/delete.php', ['pageTitle' => 'Delete the post', 'id' => $id]);
    }

    /**
     * Common logic for adding/editing a post
     *
     * @param PostDataMapper $mapper
     * @param Post $model
     * @return Response
     */
    protected function editPost(PostDataMapper $mapper, Post $model)
    {
        $content = $this->getRequest()->getContent();
        foreach ($content as $key => $parameter) {
            if (property_exists($model, $key)) {
                $model->{$key} = htmlspecialchars($parameter, ENT_QUOTES, 'UTF-8');
            }
        }
        $mapper->save($model);

        return $this->redirectToList();
    }

    /**
     * Mapper factory method
     *
     * @return PostDataMapper
     */
    protected function createPostMapper()
    {
        return new PostDataMapper($this->getContainer('mysql'));
    }

    /**
     * Redirect helper
     *
     * @return Response
     */
    protected function redirectToList()
    {
        $response = new Response();
        $response->setRedirect('/');

        return $response;
    }
}
