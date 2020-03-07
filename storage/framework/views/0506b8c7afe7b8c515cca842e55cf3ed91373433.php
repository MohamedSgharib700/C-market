<?php $__env->startSection('auth.content'); ?>




    <!--single-page open-->
    <div class="single-page">
        <div class="">
            <div class="wrapper wrapper2">
                <img src="<?php echo e(url('')); ?>/assets/img/CV Logo.png" class="img-fluid mt-3" alt="">
                <?php if(session()->has('error')): ?>
                    <div class="col-12">
                        <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                            <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                <div class="alert-title"><?php echo e(trans('error')); ?></div>
                                <?php echo e(session('error')); ?>

                            </div>
                        </div>
                    </div>
                <?php elseif(session()->has('success')): ?>
                    <div class="col-12">
                        <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                            <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                <div class="alert-title"><?php echo e(trans('success')); ?></div>
                                <?php echo e(session('success')); ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('admin.auth.attempt')); ?>"  method="post" class="card-body"  tabindex="500">
                    <?php echo e(csrf_field()); ?>

                    <h3 class="text-dark"><?php echo e(trans('login')); ?></h3>
                    <div class="mail">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="<?php echo e(trans('email')); ?>">
                    </div>
                    <div class="passwd">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="<?php echo e(trans('password')); ?>">
                    </div>

                    <div class="submit">
                        <button  type="submit" class="btn btn-primary btn-block"><?php echo e(trans('login')); ?></button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!--single-page closed-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/workspace/automarket/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>