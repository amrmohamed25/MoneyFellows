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
                            <h1>User Page</h1>
                        </div> <!-- end of col -->
                        <div class="col-lg-12">
                            <?php if(Session::has('message')): ?>
                                <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                            <?php endif; ?>
                        </div>
                        <?php if(Auth::user()->currents->count()==0): ?>
                            <div class="col-lg-12">
                                <h1>You didn't register any category yet</h1>
                            </div>
                        <?php endif; ?>
                    </div> <!-- end of row -->
                </div>
            </div>
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('slot'); ?>
    <?php if(Auth::user()->currents->count()!=0): ?>
        <div class="slider-2" style="background: none;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 style="text-align: center">Your Categories</h1>
                        <div class="outer">
                            <table class="table table-hover bg-light">
                                <thead>
                                <tr>
                                    <th scope="col">Current ID</th>
                                    <th scope="col">Current Name</th>
                                    <th scope="col">Money</th>
                                    <th scope="col">Months to be paid</th>
                                    <th scope="col">Is Started</th>
                                    <th scope="col">Is paid</th>
                                    <th scope="col">Due Date</th>

                                    <th scope="col">Functions</th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php $__currentLoopData = Auth::user()->currents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e($current->id); ?></td>
                                        <td><?php echo e($current->name); ?></td>
                                        <td><?php echo e($current->pivot->money); ?></td>

                                        <td><?php echo e($current->pivot->months_left_to_be_paid); ?></td>
                                        <?php if($current->due_date==null): ?>
                                            <td>No</td>
                                        <?php else: ?>
                                            <td>Yes</td>
                                        <?php endif; ?>

                                        <?php if($current->pivot->is_paid==0): ?>
                                            <td>No</td>
                                        <?php else: ?>
                                            <td>Yes</td>
                                        <?php endif; ?>
                                        <td><?php echo e($current->due_date); ?></td>
                                        <td>
                                            <div class="button-wrapper">
                                                <?php if($current->pivot->is_paid==0 &&$current->due_date!=null): ?>
                                                    <a class="btn-solid-pay page-scroll"
                                                       href="<?php echo e(url('/pay/'.$current->id)); ?>">Pay</a>
                                                <?php endif; ?>
                                                <a class="btn-solid-reg page-scroll"
                                                   href="<?php echo e(url('/edit/'.$current->id)); ?>">Edit</a>
                                                <a class="btn-solid-leave page-scroll"
                                                   href="<?php echo e(url('/delete/'.$current->id)); ?>">Leave</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Training\RMZ\moneyfellows.github.io\resources\views/gam3yatk.blade.php ENDPATH**/ ?>