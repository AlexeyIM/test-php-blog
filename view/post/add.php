<?php include $rootPath . '/view/header.php' ?>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <form class="form-horizontal" method="post">
                <fieldset>

                    <!-- Form Name -->
                    <?php if ($post->id): ?>
                    <legend>Edit post #<?php echo $post->id ?></legend>
                    <?php else: ?>
                    <legend>Add a new post</legend>
                     <?php endif ?>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="title">Title</label>
                        <div class="col-md-8">
                            <input id="title" name="title" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $post->title ?>">
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="preview">Preview text</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="preview" name="preview" required=""><?php echo $post->preview ?></textarea>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="text">Text</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="text" name="text" required=""><?php echo $post->text ?></textarea>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="author">Author name</label>
                        <div class="col-md-8">
                            <input id="author" name="author" type="text" value="<?php echo $post->author ?>" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <input name="id" type="hidden" value="<?php echo $post->id ?>">

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for=""></label>
                        <div class="col-md-8">
                            <button id="" name="" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </fieldset>
            </form><!-- /.blog-add-form -->

        </div><!-- /.blog-main -->

        <?php include $rootPath . '/view/about.php' ?>

    </div><!-- /.row -->

<?php include $rootPath . '/view/footer.php' ?>