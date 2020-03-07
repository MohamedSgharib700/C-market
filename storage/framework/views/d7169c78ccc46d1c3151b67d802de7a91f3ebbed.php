<?php use App\Constants\UserTypes;?>
<?php $__env->startSection('content'); ?>
<!--app-content open-->
<div class="app-content">
    <section class="section">
        <!--page-header open-->
        <div class="row">
            <div class="col-6">
                <div class="page-header">
                    <h4 class="page-title"><?php echo e(trans('new_user')); ?></h4>

                </div>
            </div>

                    </div>
                    <!--page-header closed-->

                    <div class="section-body">

                        <!--row open-->
                        <div class="row">
                            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 mx-auto">
                              <div class="card">
                                <div class="card-header">
                                  <h4><?php echo e(trans('new_user')); ?></h4>
                              </div>
                              <div class="card-body">
                                 <?php if(session()->has('success')): ?>
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
                                <?php endif; ?>
                                <form id="horizontal-validation" class="form-horizontal" action="<?php echo e(route('admin.users.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                      <label for="inputName" class="col-md-3 col-form-label"><?php echo e(trans('first_name')); ?> </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control"
                                        name="first_name" id="first_name"
                                        value="<?php echo e(old('first_name')); ?>"
                                        placeholder="<?php echo e(trans('first_name')); ?> ">
                                        <?php if($errors->has('first_name')): ?>
                                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                 <div class="form-group row">
                                      <label for="inputName" class="col-md-3 col-form-label"><?php echo e(trans('last_name')); ?> </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control"
                                        name="last_name" id="name"
                                        value="<?php echo e(old('last_name')); ?>"
                                        placeholder="<?php echo e(trans('last_name')); ?> ">
                                     <input type="hidden" class="form-control"
                                        name="type" id="name" value="<?php echo e(UserTypes::ADMIN); ?>">

                                        <?php if($errors->has('last_name')): ?>
                                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                                        <?php endif; ?>

                                    </div>
                                </div>

                            <div class="form-group row">
                              <label for="inputPassword3" class="col-md-3 col-form-label"><?php echo e(trans('email')); ?></label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" name="email"
                                  id="email" value="<?php echo e(old('email')); ?>"
                                  placeholder="<?php echo e(trans('email')); ?>">
                                  <?php if($errors->has('email')): ?>
                                  <strong><?php echo e($errors->first('email')); ?></strong>
                                  <?php endif; ?>

                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-md-3 col-form-label"><?php echo e(trans('phone')); ?></label>
                            <div class="col-md-9">
                               <input type="text" class="form-control"
                               name="phone" id="phone"
                               value="<?php echo e(old('phone')); ?>"
                               placeholder="<?php echo e(trans('phone')); ?>"/>
                               <?php if($errors->has('phone')): ?>

                               <strong><?php echo e($errors->first('phone')); ?></strong>
                               <?php endif; ?>

                           </div>
                       </div>


                       <div class="form-group row">
                        <label for="inputPassword3" class="col-md-3 col-form-label"><?php echo e(trans('password')); ?></label>
                        <div class="col-md-9">
                           <input type="password" class="form-control"
                           name="password" id="password"
                           value="<?php echo e(old('password')); ?>"
                           placeholder="<?php echo e(trans('password')); ?>">
                           <?php if($errors->has('password')): ?>
                           <strong><?php echo e($errors->first('password')); ?></strong>
                           <?php endif; ?>

                       </div>
                   </div>
                   <div class="form-group mb-0 mt-2 row justify-content-end text-left">
                      <div class="col-md-9 float-left">
                       <input type="submit" class="btn btn-primary mt-1"
                       value="<?php echo e(trans('save')); ?>">
                       <input type="reset" class="btn btn-danger mt-1"
                       value="<?php echo e(trans('cancel')); ?>">
                   </div>
               </div>


           </form>
       </div>
   </div>
</div>
</div>
<!--row closed-->
</div>
</section>
</div>
<!--app-content closed-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/workspace/automarket/resources/views/admin/users/new.blade.php ENDPATH**/ ?>