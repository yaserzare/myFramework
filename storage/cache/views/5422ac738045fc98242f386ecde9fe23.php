

<?php $__env->startSection('content'); ?>
    <form action="/auth/register" method="post">
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" value = "<?php echo e($old('name')); ?>">
            <?php if($errors->has('name')): ?>
            <span><?php echo e($errors->first('name')); ?></span>
            <?php endif; ?>
        </div>
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
        <div>
            <label for="confirm_password">Confirm Password: </label>
            <input type="password" name="confirm_password" value = "<?php echo e($old('confirm_password')); ?>">
            <?php if($errors->has('confirm_password')): ?>
                <span><?php echo e($errors->first('confirm_password')); ?></span>
            <?php endif; ?>
        </div>
        <button type="submit">Register</button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\myFramework\resources\views/auth/register.blade.php ENDPATH**/ ?>