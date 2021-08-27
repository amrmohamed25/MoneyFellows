<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">MoneyFellows</a> -->

        <!-- Image Logo -->
        <a href="<?php echo e(url('/')); ?>"><img class="navbar-brand logo-image" src="<?php echo e(asset('images/web_logo.png')); ?>" alt="alternative"></a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo e(url('/#header')); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo e(url('/#features')); ?>">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo e(url('/#pricing')); ?>">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link page-scroll" href="<?php echo e(url('/#about')); ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo e(url('/#contact')); ?>">Contact</a>
                </li>
                <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item"><a href="<?php echo e(url('/gam3yatk')); ?>" class="nav-link page-scroll">Gam3yatk</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo e(url('/dashboard')); ?>"
                                                class="nav-link page-scroll">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <a href="<?php echo e(route('logout')); ?>" class="nav-link page-scroll"
                                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <?php echo e(__('Log Out')); ?>

                                </a>
                            </form>
                        </li>
                        <li class="nav-item" style="position: relative;bottom:5px">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown','data' => ['align' => 'right','width' => '48']]); ?>
<?php $component->withName('jet-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['align' => 'right','width' => '48']); ?>
                                 <?php $__env->slot('trigger'); ?> 
                                    <?php if(Laravel\Jetstream\Jetstream::managesProfilePhotos()): ?>
                                        <button
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                 src="<?php echo e(Auth::user()->profile_photo_url); ?>"
                                                 alt="<?php echo e(Auth::user()->name); ?>"/>
                                        </button>
                                    <?php else: ?>
                                        <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        <?php echo e(Auth::user()->name); ?>


                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </span>
                                    <?php endif; ?>
                                 <?php $__env->endSlot(); ?>

                                 <?php $__env->slot('content'); ?> 
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        <?php echo e(__('Manage Account')); ?>

                                    </div>

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => ''.e(route('profile.show')).'']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('profile.show')).'']); ?>
                                        <?php echo e(__('Profile')); ?>

                                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                                        <?php echo csrf_field(); ?>

                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => ''.e(route('logout')).'','onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('logout')).'','onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']); ?>
                                            <?php echo e(__('Log Out')); ?>

                                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                    </form>
                                 <?php $__env->endSlot(); ?>
                             <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a href="<?php echo e(route('login')); ?>" class="nav-link page-scroll">Log in</a></li>

                        <?php if(Route::has('register')): ?>
                            <li class="nav-item"><a href="<?php echo e(route('register')); ?>"
                                                    class="nav-link page-scroll">Register</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>

            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->





    <!-- Responsive Navigation Menu -->



















































































</nav>
<?php /**PATH /media/amr/Drive/Training/RMZ/resources/views/navigation-menu.blade.php ENDPATH**/ ?>