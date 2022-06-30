<?php if(isset ($errors) && count($errors) > 0): ?>

    <div >

        <ul >

            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li class="form_error"><?php echo e($error); ?></li>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

    </div>

<?php endif; ?>

 

<?php if(Session::get('success', false)): ?>

    <?php $data = Session::get('success'); ?>

    <?php if(is_array($data)): ?>

        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div>

                <i ></i>

                <?php echo e($msg); ?>


            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php else: ?>

        <div>

            <i ></i>

            <?php echo e($data); ?>


        </div>

    <?php endif; ?>

<?php endif; ?><?php /**PATH /home/aletini/Desktop/hw/hw2/resources/views/layouts/includes/alert.blade.php ENDPATH**/ ?>