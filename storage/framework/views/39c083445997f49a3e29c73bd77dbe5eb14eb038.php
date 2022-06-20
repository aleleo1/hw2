<?php $__env->startSection('content'); ?>

  

        <?php if(auth()->guard()->check()): ?>

        <h1>Logged User</h1>

        
       
    <p>Ciao <?php echo e(auth()->user()->nome); ?></p>

        <?php endif; ?>

 

        <?php if(auth()->guard()->guest()): ?>

        <h1>Homepage</h1>

        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>

        <?php endif; ?>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexleon/Desktop/web/hw2/resources/views/home/index.blade.php ENDPATH**/ ?>