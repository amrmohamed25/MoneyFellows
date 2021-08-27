<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/fontawesome-all.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/swiper.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/magnific-popup.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/styles.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
        <header id="header" class="header">
            <div class="header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-container">
                                <h1 style="margin-top: 100px">Edit Category</h1>
                                <div class="col-lg-12">
                                    <?php if(Session::has('message')): ?>
                                        <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                    <?php endif; ?>
                                </div>
                                <form method="POST" action="/update_category/<?php echo e($category->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="current_name">Category Name</label>
                                        <input class="form-control" name="category_name" value="<?php echo e($category->name); ?>"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="category_id" value="<?php echo e($category->id); ?>"
                                               readonly hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="money">Category Money</label>
                                        <input class="form-control" type="number" name="money" min="1"
                                               value="<?php echo e($category->money); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_of_members">Category Members</label>
                                        <input class="form-control" name="no_of_members" type="number"
                                               min="2" value="<?php echo e($category->no_of_members); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="months">Months</label>
                                        <input class="form-control" type="number" name="months" min="2"
                                               value="<?php echo e($category->months); ?>" required>
                                    </div>
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-dark">Submit</button>
                                    </div>
                                </form>
                            </div> <!-- end of text-container -->
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div> <!-- end of header-content -->
        </header> <!-- end of header -->
        <!-- end of header -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/amr/Drive/Training/RMZ/resources/views/edit-category.blade.php ENDPATH**/ ?>