<link rel="stylesheet" href="css/footer.css">

<footer>
    <?php if(auth()->guard()->check()): ?>



        <div class="footerbar">

            <h4><?php echo e(auth()->user()->nome); ?> <?php echo e(auth()->user()->cognome); ?></h4>
            <p><?php echo e(auth()->user()->matricola); ?></p>
        </div>
    

    <?php endif; ?>



    <?php if(auth()->guard()->guest()): ?>

        <div class="footer">
        
        </div>

    <?php endif; ?>
    <?php echo $__env->make('layouts.includes.copy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</footer>
<?php /**PATH /home/aletini/Desktop/hw/hw2/resources/views/layouts/includes/footer.blade.php ENDPATH**/ ?>