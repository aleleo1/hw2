 

<?php $__env->startSection('content'); ?>

    <form method="post" action="<?php echo e(route('login.perform')); ?>">

        

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
       
        

        <h1 class="h3 mb-3 fw-normal">Login</h1>

 

        <?php echo $__env->make('layouts.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 

        <div class="form-group form-floating mb-3">

            <input type="number" class="form-control" name="matricola" value="<?php echo e(old('matricola')); ?>" placeholder="matricola" required="required" autofocus>

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

 

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

        

        <?php echo $__env->make('layouts.includes.copy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexleon/Desktop/web/hw2/resources/views/auth/login.blade.php ENDPATH**/ ?>