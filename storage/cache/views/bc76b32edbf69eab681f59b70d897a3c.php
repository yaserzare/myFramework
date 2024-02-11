

<?php $__env->startSection('content'); ?>
    <h2>User Panel</h2>
    <?php echo e(auth()->user()->name); ?>

    <a href="/auth/logout">logout</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\myFramework\resources\views/panel/index.blade.php ENDPATH**/ ?>