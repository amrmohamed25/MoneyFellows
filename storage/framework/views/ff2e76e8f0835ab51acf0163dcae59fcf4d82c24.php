<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" href="<?php echo e(asset('images/logo.png')); ?>" type="image">
    <title>MoneyFellows</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext"
          rel="stylesheet">
<?php echo $__env->yieldContent('style'); ?>



    <?php echo \Livewire\Livewire::styles(); ?>


    <!-- Scripts -->
    <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>
</head>
<body data-spy="scroll" data-target=".fixed-top">
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.banner','data' => []]); ?>
<?php $component->withName('jet-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>


    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('navigation-menu')->html();
} elseif ($_instance->childHasBeenRendered('2huw4l6')) {
    $componentId = $_instance->getRenderedChildComponentId('2huw4l6');
    $componentTag = $_instance->getRenderedChildComponentTagName('2huw4l6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2huw4l6');
} else {
    $response = \Livewire\Livewire::mount('navigation-menu');
    $html = $response->html();
    $_instance->logRenderedChild('2huw4l6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <!-- Page Heading -->

    <?php echo $__env->yieldContent('header'); ?>


<!-- Page Content -->
<?php echo $__env->yieldContent('slot'); ?>


<?php echo $__env->yieldPushContent('modals'); ?>

<?php echo \Livewire\Livewire::scripts(); ?>

<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script> <!-- Bootstrap framework -->
<script src="<?php echo e(asset('js/jquery.easing.min.js')); ?>"></script>
<!-- jQuery Easing for smooth scrolling between anchors -->
<script src="<?php echo e(asset('js/swiper.min.js')); ?>"></script> <!-- Swiper for image and text sliders -->
<script src="<?php echo e(asset('js/jquery.magnific-popup.js')); ?>"></script> <!-- Magnific Popup for lightboxes -->
<script src="<?php echo e(asset('js/validator.min.js')); ?>"></script>
<!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="<?php echo e(asset('js/scripts.js')); ?>"></script> <!-- Custom scripts -->
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /media/amr/Drive/Training/RMZ/moneyfellows.github.io/resources/views/layouts/app.blade.php ENDPATH**/ ?>