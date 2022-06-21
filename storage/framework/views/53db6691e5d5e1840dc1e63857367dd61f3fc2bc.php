 

<?php $__env->startSection('content'); ?>

    <form method="post" class="form_master" action="<?php echo e(route('login.perform')); ?>">

        

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
       
        

        <h1 class="h3 mb-3 fw-normal">Login</h1>

 

        <?php echo $__env->make('layouts.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 

        <div class="form_question">

            <input type="number" class="form-control" name="matricola" value="<?php echo e(old('matricola')); ?>" placeholder="matricola" required="required" autofocus>

            <label for="floatingMatricola">Matricola</label>

            <?php if($errors->has('matricola')): ?>

                <span class="text-danger text-left"><?php echo e($errors->first('matricola')); ?></span>

            <?php endif; ?>

        </div>

        

        <div class="form_question">

            <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" placeholder="Password" required="required">

            <label for="floatingPassword">Password</label>

            <?php if($errors->has('password')): ?>

                <span class="text-danger text-left"><?php echo e($errors->first('password')); ?></span>

            <?php endif; ?>

        </div>

        
        <div class="form_remember">

            <input type="checkbox" class="form-control" name="remember_token">
        </div>

        <button class="form_submit" type="submit">Login</button>

        

      

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aletini/Desktop/hw/hw2/resources/views/auth/login.blade.php ENDPATH**/ ?>