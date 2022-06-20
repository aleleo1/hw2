<?php $__env->startSection('content'); ?>

    <form method="post" action="<?php echo e(route('register.perform')); ?>">

 

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

      

        

        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">

            <input type="text" class="form-control" name="nome" value="<?php echo e(old('nome')); ?>" placeholder="nome"  autofocus>

            <label for="floatingName" >Nome</label>

        

        </div>

        <div class="form-group form-floating mb-3">

            <input type="text" class="form-control" name="cognome" value="<?php echo e(old('cognome')); ?>" placeholder="cognome"  autofocus>

            <label for="floatingSurname">Cognome</label>

          

        </div>
 

        <div class="form-group form-floating mb-3">

            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="name@example.com" required="required" autofocus>

            <label for="floatingEmail">Email address</label>

            <?php if($errors->has('email')): ?>

                <span class="text-danger text-left"><?php echo e($errors->first('email')); ?></span>

            <?php endif; ?>

        </div>

 

        <div class="form-group form-floating mb-3">

            <input type="text" class="form-control" name="matricola" value="<?php echo e(old('matricola')); ?>" placeholder="matricola" required="required" autofocus>

            <label for="floatingMatricola">matricola</label>

            <?php if($errors->has('matricola')): ?>

                <span class="text-danger text-left"><?php echo e($errors->first('matricola')); ?></span>

            <?php endif; ?>

        </div>

        

        <div class="form-group form-floating mb-3">

            <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" placeholder="Password" required="required">

            <label for="floatingPassword">Password</label>

            <?php if($errors->has('password')): ?>

                <span class="text-danger text-left"><?php echo e($errors->first('password')); ?></span>

            <?php endif; ?>

        </div>

 

        <div class="form-group form-floating mb-3">

            <input type="password" class="form-control" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>" placeholder="Confirm Password" required="required">

            <label for="floatingConfirmPassword">Confirm Password</label>

            <?php if($errors->has('password_confirmation')): ?>

                <span class="text-danger text-left"><?php echo e($errors->first('password_confirmation')); ?></span>

            <?php endif; ?>

        </div>

 

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

        

        <?php echo $__env->make('layouts.includes.copy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexleon/Desktop/web/hw2/resources/views/auth/register.blade.php ENDPATH**/ ?>