

<?php $__env->startSection('content'); ?>
    <form action="/auth/login" method="post">
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" value = "<?php echo e($old('email')); ?>">
            <?php if($errors->has('email')): ?>
                <span><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" value = "<?php echo e($old('password')); ?>">
            <?php if($errors->has('password')): ?>
                <span><?php echo e($errors->first('password')); ?></span>
            <?php endif; ?>
        </div>
        <button type="submit">Login</button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\myFramework\resources\views/auth/login.blade.php ENDPATH**/ ?>