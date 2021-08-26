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
            <div id="pricing" class="cards-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="height: 300px;position: relative;">
                            <h2>Multiple Pricing Options</h2>
                            <p class="p-heading p-large">We've prepared pricing plans for all budgets so you can get
                                started right
                                away. They're great for small companies and large organizations</p>
                        </div> <!-- end of col -->
                        <div class="col-lg-12">
                            <?php if(Session::has('message')): ?>
                                <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div> <!-- end of row -->
                </div>
            </div>
        </div> <!-- end of header-content -->

    </header> <!-- end of header -->
    <!-- end of header -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('slot'); ?>
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="slider-2" style="background: none;padding-bottom: 0px;">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-container">
                            <div class="swiper-container card-slider" style="position: relative;bottom: 200px ">
                                <div class="swiper-wrapper">
                                    <!-- Card-->
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index%4==0): ?>
                                            <div class="swiper-slide">
                                                <!-- Slide -->
                                                <?php endif; ?>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-title"><?php echo e($category->name); ?></div>
                                                        <div class="card-subtitle">Category
                                                            ID: <?php echo e($category->id); ?></div>
                                                        <hr class="cell-divide-hr">
                                                        <div class="price">
                                                            <span class="currency">EGP</span><span
                                                                class="value"><?php echo e($category->money); ?></span>
                                                            <div class="frequency">monthly</div>
                                                        </div>
                                                        <hr class="cell-divide-hr">
                                                        <ul class="list-unstyled li-space-lg">
                                                            <li class="media">
                                                                <i class="fas fa-check"></i>
                                                                <div class="media-body">Category
                                                                    Months: <?php echo e($category->months); ?></div>
                                                            </li>
                                                            <li class="media">
                                                                <i class="fas fa-check"></i>
                                                                <div class="media-body">Category
                                                                    Members: <?php echo e($category->no_of_members); ?></div>
                                                            </li>
                                                        </ul>
                                                        <div class="button-wrapper">
                                                            <?php if(Auth::id()!=null): ?>
                                                                <a class="btn-solid-reg page-scroll"
                                                                   href="<?php echo e(url('/join/'.$category->id)); ?>">REQUEST</a>
                                                            <?php else: ?>
                                                                <a class="btn-solid-reg page-scroll"
                                                                   href="<?php echo e(url('/login')); ?>">REQUEST</a>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                </div> <!-- end of card -->
                                                <!-- end of card -->
                                                <?php if($loop->index==3||($loop->index%4==0 && $loop->index!=0 && $loop->index!=4)||$loop->last): ?>
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/amr/Drive/Training/RMZ/resources/views/dashboard.blade.php ENDPATH**/ ?>