<form action="" method="post" >
                            <div class="form-group">
                                <label for="cat_title">Edit Category</label>
                                <input value="<?php if(isset($categoryEdit['cat_title'])) : echo $categoryEdit['cat_title']; endif; ?>" type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="Update" value="Update Category">
                            </div>
                        </form>