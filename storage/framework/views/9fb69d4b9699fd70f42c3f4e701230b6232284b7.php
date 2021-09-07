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
                            <h1>Admin Page</h1>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('slot'); ?>
<div class="slider-2" style="background: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center">Categories</h1>
                <div class="button-wrapper" style="text-align: center;margin-bottom: 5px">
                    <a class="btn-solid-pay page-scroll"
                       href="<?php echo e(url('/category')); ?>">Create new Category</a>
                </div>
                <div class="outer">
                    <table class="table table-hover bg-light">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Money</th>
                            <th scope="col">Months</th>
                            <th scope="col">Members</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Functions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category->id); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->money); ?></td>
                                <td><?php echo e($category->months); ?></td>
                                <td><?php echo e($category->no_of_members); ?></td>
                                <td><?php echo e($category->created_at); ?></td>
                                <td><?php echo e($category->updated_at); ?></td>
                                <td>
                                    <div class="button-wrapper">
                                        <a class="btn-solid-reg page-scroll"
                                           href="<?php echo e(url('/edit_category/'.$category->id)); ?>">Edit</a>
                                        <a class="btn-solid-leave page-scroll"
                                           href="<?php echo e(url('/delete_category/'.$category->id)); ?>">Delete</a>
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


<div class="slider-2" style="background: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center">Currents</h1>
                <div class="outer">
                    <table class="table table-hover bg-light">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Money</th>
                            <th scope="col">Months</th>
                            <th scope="col">Members</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Functions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $currents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($current->id); ?></td>
                                <td><?php echo e($current->name); ?></td>
                                <td><?php echo e($current->money); ?></td>
                                <td><?php echo e($current->months); ?></td>
                                <td><?php echo e($current->users()->count()); ?>/<?php echo e($current->no_of_members); ?></td>
                                <td><?php echo e($current->due_date); ?></td>
                                <td><?php echo e($current->created_at); ?></td>
                                <td><?php echo e($current->updated_at); ?></td>
                                <td>
                                    <div class="button-wrapper">
                                        <a class="btn-solid-reg page-scroll"
                                           href="<?php echo e(url('/edit/'.$current->id)); ?>">Edit</a>
                                        <a class="btn-solid-leave page-scroll"
                                           href="<?php echo e(url('/delete/'.$current->id)); ?>">Delete</a>
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


<div class="slider-2" style="background: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center">Users</h1>
                <div class="outer">
                    <table class="table table-hover bg-light">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">National ID</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($user->email!='admin@admin.com'): ?>
                                <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->phone_number); ?></td>
                                    <td><?php echo e($user->national_id); ?></td>
                                    <td><?php echo e($user->created_at); ?></td>
                                    <td><?php echo e($user->updated_at); ?></td>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
<div class="slider-2" style="background: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center">Currents & Users</h1>
                <div class="outer">
                    <table class="table table-hover bg-light">
                        <thead>
                        <tr>
                            <th scope="col">Current ID</th>
                            <th scope="col">Current Name</th>
                            <th scope="col">User ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Money</th>
                            <th scope="col">Months to be paid</th>
                            <th scope="col">Is paid</th>
                            <th scope="col">Due Date</th>
                            
                        </tr>
                        </thead>
                        <tbody>


                        <?php $__currentLoopData = $currents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $current->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($user!=null): ?>
                                    <tr>
                                        <td><?php echo e($current->id); ?></td>
                                        <td><?php echo e($current->name); ?></td>
                                        <td><?php echo e($user->id); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->pivot->money); ?></td>
                                        <td><?php echo e($user->pivot->months_left_to_be_paid); ?></td>
                                        <td><?php echo e($user->pivot->is_paid); ?></td>
                                        <td><?php echo e($current->due_date); ?></td>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/amr/Drive/Training/RMZ/moneyfellows.github.io/resources/views/admin.blade.php ENDPATH**/ ?>