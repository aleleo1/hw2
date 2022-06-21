<?php $__env->startSection('content'); ?>

    <form class="form_master" method="post" action="<?php echo e(route('register.perform')); ?>">

 

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

      

        

        <h1 class="title">Registrati</h1>

        <div class="form_question">

            <input type="text" class="form-control" name="nome" value="<?php echo e(old('nome')); ?>" error="AAAA" placeholder="nome" required="required" autofocus>

            <label for="floatingName" >Nome</label>

            <?php if($errors->has('nome')): ?>

            <span class="form_error"><?php echo e($errors->first('nome')); ?></span>

        <?php endif; ?>

        </div>

        <div class="form_question">

            <input type="text" class="form-control" name="cognome" value="<?php echo e(old('cognome')); ?>" placeholder="cognome" required="required" autofocus>

            <label for="floatingSurname">Cognome</label>

            <?php if($errors->has('cognome')): ?>

                <span class="form_error"><?php echo e($errors->first('cognome')); ?></span>

            <?php endif; ?>

        </div>
 

        <div class="form_question">

            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="name@example.com" required="required" autofocus>

            <label for="floatingEmail">Indirizzo Email</label>

            <?php if($errors->has('email')): ?>

                <span class="form_error"><?php echo e($errors->first('email')); ?></span>

            <?php endif; ?>

        </div>

 

        <div class="form_question">

            <input type="text" class="form-control" name="matricola" value="<?php echo e(old('matricola')); ?>" placeholder="matricola" required="required" autofocus>

            <label for="floatingMatricola">Matricola</label>

            <?php if($errors->has('matricola')): ?>

                <span class="form_error"><?php echo e($errors->first('matricola')); ?></span>

            <?php endif; ?>

        </div>

        

        <div class="form_question">

            <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" placeholder="Password" required="required">

            <label for="floatingPassword">Password</label>

            <?php if($errors->has('password')): ?>

                <span class="form_error"><?php echo e($errors->first('password')); ?></span>

            <?php endif; ?>

        </div>

 

        <div class="form_question">

            <input type="password" class="form-control" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>" placeholder="Conferma Password" required="required">

            <label for="floatingConfirmPassword">Conferma Password</label>

            <?php if($errors->has('password_confirmation')): ?>

                <span class="form_error"><?php echo e($errors->first('password_confirmation')); ?></span>

            <?php endif; ?>

        </div>

 

        <button class="form_submit" type="submit">Register</button>

        

        <?php echo $__env->make('layouts.includes.copy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aletini/Desktop/hw/hw2/resources/views/auth/register.blade.php ENDPATH**/ ?>