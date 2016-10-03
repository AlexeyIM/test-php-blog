<?php include $rootPath . '/view/header.php' ?>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <form class="form-horizontal" method="post">
                <fieldset>

                    <p>Are you sure you want to delete post #<?php echo $id ?>?</p>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for=""></label>
                        <div class="col-md-4">
                            <button id="" name="" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </fieldset>
            </form><!-- /.blog-add-form -->

        </div><!-- /.blog-main -->

        <?php include $rootPath . '/view/about.php' ?>

    </div><!-- /.row -->

<?php include $rootPath . '/view/footer.php' ?>