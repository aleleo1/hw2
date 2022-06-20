<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test della personalità</title>

    <link rel="stylesheet" href="css/provided-style.css" />


    <link rel="stylesheet" href="css/theGame.css" />

    <script src="js/theGame.js" defer></script>
</head>
<?php $__env->startSection('content'); ?>

    <body>
      <input type="hidden" id="_token" value="<?php echo e(csrf_token()); ?>" />
        
        <article>
            <?php for($i = 1; $i <= 3; $i++): ?>
                <section class="question-name">
                    <?php echo e($images[$i]); ?>

                </section>
                <section class="choice-grid">
                    <?php $__currentLoopData = $images[$i]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="choice-section" data-choice-id=<?php echo e($imm->CHOICE_ID); ?>

                            data-question-id=<?php echo e($imm->SECTION); ?>>
                            <img src=<?php echo e($imm->URL); ?> />
                            <img class="checkbox" src="images/theGame-images/unchecked.png" />
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </section>
            <?php endfor; ?>

           
                <div id="result" class="not-show">

                    <h3 id="res-title"></h3>
                    <p id="res-content"></p>
                    <p id="num_interactions"></p>
                    <button id="b">Ricomincia il quiz</button>
                </div>
           
        </article>
        


    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexleon/Desktop/web/hw2/resources/views/home/theGame.blade.php ENDPATH**/ ?>