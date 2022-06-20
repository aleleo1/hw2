<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>Le 5 grandi banche</title>
    <link rel="stylesheet" href="css/banks.css">




    <script defer type="text/javascript" src="js/banks.js"></script>

</head>
<?php $__env->startSection('content'); ?>

    <body>
        <?php echo csrf_field(); ?>
        <input type="hidden" id="_token" value="<?php echo e(csrf_token()); ?>" />


        <h1>Le 5 grandi banche</h1>
        <div class="article">

            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <section id=<?php echo e($data->ID); ?>>
                    <div class='number'>
                        <h1><?php echo e($data->ID); ?></h1>
                    </div>
                    <div class='summButtons'><button class='summButton'>Riassumi</button><button class='originalButton'>Testo
                            Originale</button></div>
                    <div class='details'>
                        <h1><?php echo e($data->NAME); ?></h1>
                        <h3><?php echo e($data->NATION); ?></h3>
                        <p><?php echo e($data->DATA); ?></p>
                    </div>
                    <img class='img' src=<?php echo e($data->IMG_URL); ?>>
                </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        <footer>
            <div class="copyright">

  
                <?php echo e(auth()->user()->matricola); ?>

          
            </div>
        </footer>

    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexleon/Desktop/web/hw2/resources/views/home/banks.blade.php ENDPATH**/ ?>