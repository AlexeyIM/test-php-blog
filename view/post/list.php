<?php include $rootPath . '/view/header.php' ?>

    <div class="row">

        <div class="col-sm-8 blog-main">
            <?php foreach ($posts as $post): ?>
                <div class="blog-post">
                    <a href="/post/<?php echo $post->id ?>"><h2 class="blog-post-title"><?php echo $post->title ?></h2></a>
                    <p class="blog-post-meta"><?php echo date('l, F d y h:i', strtotime($post->created)) ?> by <a href="#"><?php echo $post->author ?></a></p>
                    <p><?php echo $post->preview ?></p>
                    <a href="/post/<?php echo $post->id ?>/edit">Edit</a>
                    <a href="/post/delete/<?php echo $post->id ?>">Delete</a>
                </div><!-- /.blog-post -->
            <?php endforeach ?>

            <nav>
                <ul class="pager">
                    <?php if ($showPreviousButton): ?>
                    <li><a href="/page/<?php echo $currentPage + 1 ?>">Previous</a></li>
                    <?php endif ?>
                    <?php if ($showNextButton): ?>
                    <li><a href="/page/<?php echo $currentPage - 1 ?>">Next</a></li>
                    <?php endif ?>
                </ul>
            </nav>

        </div><!-- /.blog-main -->

        <?php include $rootPath . '/view/about.php' ?>

    </div><!-- /.row -->

<?php include $rootPath . '/view/footer.php' ?>