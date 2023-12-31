<?php include('includes/admin_header.php') ?>

<?php include('includes/admin_functions.php') ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/admin_nav.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                        <?php echo $error; ?>
                        <form action="" method="post" >
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                            
                        <?php if(isset($_GET['edit'])) : include('includes/update_categories.php');endif; ?>

                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($categories as $category) : ?>
                                    <tr>
                                        <td><?php echo $category['cat_id']; ?></td>
                                        <td><?php echo $category['cat_title']; ?></td>
                                        <td><a href="categories.php?delete=<?php echo $category['cat_id']; ?>">DELETE</a></td>
                                        <td><a href="categories.php?edit=<?php echo $category['cat_id']; ?>">EDIT</a></td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>


<?php include('includes/admin_footer.php') ?>





