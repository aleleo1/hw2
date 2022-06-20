<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/header.css">

    <meta name="generator" content="Hugo 0.87.0">

    <title>Hw2</title>



    <!-- Bootstrap core CSS -->
    <style>
        body {

            text-align: center;
            font-family: 'arial', sans-serif;
            background-color: beige;
         /*    width: 100vw;
            height:100vh; */
            scroll-behavior: smooth;
            scrollbar-color: brown bisque;
            margin: auto;
            display: flex;
            flex-direction: column;
            overflow-y: scroll;
            overflow-x: hidden;
            

        }

        main{
            background-color: burlywood;
            height: 100%;
        }
    </style>

    <!-- Custom styles for this template -->



</head>

<body>



    <?php echo $__env->make('layouts.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <main>

        <?php echo $__env->yieldContent('content'); ?>

    </main>







</body>

</html>
<?php /**PATH /home/aletini/Desktop/hw/hw2/resources/views/layouts/app.blade.php ENDPATH**/ ?>