

<?php $__env->startSection('content'); ?>
    <form action="/auth/register" method="post">
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="text" name="password">
        </div>
        <div>
            <label for="confirm_password">Confirm Password: </label>
            <input type="text" name="confirm_password">
        </div>
        <button type="submit">Register</button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\myFramework\resources\views/auth/register.blade.php ENDPATH**/ ?>