<link rel="stylesheet" href="css/header.css">

<header>

        <?php if(auth()->guard()->check()): ?>

           

            <div class="navbar">
              
              <form method="GET" action="<?php echo e(route('home.index')); ?>">
                <button class="navbutton" type="submit">User</button>
              </form>

                <form method="GET" action="<?php echo e(route('banks')); ?>">
                <button class="navbutton" type="submit"> Banche</button>
                </form>
                <form method="GET" action="<?php echo e(route('theGame')); ?>">
                <button class="navbutton" type="submit"> TheGame</button>
                </form>
                  
              <form method="GET" action="<?php echo e(route('logout.perform')); ?>">
                <button class="navbutton" type="submit">Logout</button>
              </form>
            </div>

        <?php endif; ?>



        <?php if(auth()->guard()->guest()): ?>

            <div class="navbar">
              <form method="GET" action="<?php echo e(route('login.show')); ?>">
                <button class="navbutton" type="submit">Login</button>
              </form>
                <form method="GET" action="<?php echo e(route('register.show')); ?>">
                <button class="navbutton" type="submit">Sign-up</button>
                </form>
            </div>

        <?php endif; ?>



</header>
<?php /**PATH /home/aletini/Desktop/hw/hw2/resources/views/layouts/includes/header.blade.php ENDPATH**/ ?>