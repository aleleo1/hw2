<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">

    <meta name="generator" content="Hugo 0.87.0">

    <title>Hw2</title>



</head>
<?php if(auth()->guard()->check()): ?>
<body class="auth">



    <?php echo $__env->make('layouts.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <main class="mainauth">

        <?php echo $__env->yieldContent('content'); ?>

    </main>







</body>
<?php endif; ?>

<?php if(auth()->guard()->guest()): ?>
<body class="noauth">



    <?php echo $__env->make('layouts.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <main class="main_noauth">

        <?php echo $__env->yieldContent('content'); ?>

    </main>







</body>

<?php endif; ?>
</html>
<?php /**PATH /home/aletini/Desktop/hw/hw2/resources/views/layouts/app.blade.php ENDPATH**/ ?>