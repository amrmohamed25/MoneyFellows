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
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h1>Join a Category</h1>
                            <form method="POST" action="/store">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" name="name" value="<?php echo e($user->name); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" name="email" value="<?php echo e($user->email); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="current_name">Category Name</label>
                                    <input class="form-control" name="current_name" value="<?php echo e($current->name); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="current_id" value="<?php echo e($current->id); ?>" readonly
                                           hidden>
                                </div>
                                <div class="form-group">
                                    <label for="money">Category Money</label>
                                    <input class="form-control" name="money" value="<?php echo e($current->money); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="no_of_members">Category Members</label>
                                    <input class="form-control" name="no_of_members"
                                           value="<?php echo e($current->users()->count()); ?>/<?php echo e($current->no_of_members); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="months">Months</label>
                                    <input class="form-control" name="months" value="<?php echo e($current->months); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="months_left_to_be_paid">Please Choose when do you want to recieve the
                                        money <strong>(Months from now)</strong></label>
                                    <select class="form-control" name="months_left_to_be_paid">
                                        <?php $__currentLoopData = $numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option><?php echo e($number); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">

                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div> <!-- end of col -->
                        <h4>Hint:Category will start when it reach the number of members</h4>
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div> <!-- end of header-content -->
            
        </header> <!-- end of header -->
        <!-- end of header -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/amr/Drive/Training/RMZ/moneyfellows.github.io/resources/views/user.blade.php ENDPATH**/ ?>