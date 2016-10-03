<?php include $rootPath . '/view/header.php' ?>

    <div class="row">

        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $post->title ?></h2>
                <p class="blog-post-meta"><?php echo date('l, F d y h:i', strtotime($post->created)) ?> by <a href="#"><?php echo $post->author ?></a></p>
                <p><?php echo $post->text ?></p>
                <a href="/post/<?php echo $post->id ?>/edit">Edit</a>
                <a href="/post/delete/<?php echo $post->id ?>">Delete</a>
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <?php include $rootPath . '/view/about.php' ?>

    </div><!-- /.row -->

<?php include $rootPath . '/view/footer.php' ?>