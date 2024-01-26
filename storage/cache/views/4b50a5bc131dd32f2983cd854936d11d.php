
<?php $__env->startSection('title', 'Create Article'); ?>
<?php $__env->startSection('content'); ?>
    <h2><?php echo e($title); ?></h2>
    <?php if($auth): ?>
        <span>you are logged in</span>
    <?php else: ?>
        <span>you are not logged in</span>

    <?php endif; ?>
    <form action="/articles/create?id=12" method="post">
        <input type="text" name="title" placeholder="enter article title ">
        <button type="submit">create</button>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\myFramework\resources\views/articles/create.blade.php ENDPATH**/ ?>