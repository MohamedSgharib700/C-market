<?php $__env->startSection('content'); ?>
<!--app-content open-->
<div class="app-content">x
    <section class="section">
        <!--page-header open-->
        <div class="row">
            <div class="col-6">
                <div class="page-header">
                    <h4 class="page-title"><?php echo e(trans('home')); ?></h4>
                </div>
            </div>


        </div>
        <!--page-header closed-->

        <div class="section-body">


            <!--row open-->
            <div class="row">
                <div class="col-lg-6 col-xl-2 col-sm-12 col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                          <span class="stamp stamp-md bg-primary ml-3">
                            <i class="fa fa-users"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><strong style="font-size:20px;">(<?php echo e($usersCount); ?>) <?php echo e(trans('users')); ?></strong></h4>
                            <h6 class="mb-0"></h6>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-6 col-xl-2 col-sm-12 col-md-6">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                      <span class="stamp stamp-md bg-orange ml-3">
                        <i class="fa fa-cart-arrow-down"></i>
                    </span>
                    <div>
                        <h4 class="m-0"><strong style="font-size:20px;">(<?php echo e($categoriesCount); ?>)<?php echo e(trans('categories')); ?></strong></h4>
                        <h6 class="mb-0"></h6>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-xl-2 col-sm-12 col-md-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                  <span class="stamp stamp-md bg-warning ml-3">
                    <i class="fa fa-eye"></i>
                </span>
                <div>
                    <h4 class="m-0"><strong style="font-size:20px;">(<?php echo e($sponsorsCount); ?>) <?php echo e(trans('sponsors')); ?></strong></h4>
                    <h6 class="mb-0"></h6>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-6 col-xl-2 col-sm-12 col-md-6">
        <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-success ml-3">
              <i class="fa fa-file-text"></i>
            </span>
            <div>
            <h4 class="m-0"><strong style="font-size:20px;">(<?php echo e($questionsCount); ?>) <?php echo e(trans('questions')); ?></strong></h4>
                <h6 class="mb-0"></h6>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-6 col-xl-2 col-sm-12 col-md-6">
    <div class="card p-3">
        <div class="d-flex align-items-center">
          <span class="stamp stamp-md bg-success ml-3">
            <i class="fa fa-file-text"></i>
        </span>
        <div>
            <h4 class="m-0"><strong style="font-size:20px;">(<?php echo e($brandsCount); ?>) <?php echo e(trans('brands')); ?></strong></h4>
            <h6 class="mb-0"></h6>
        </div>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/workspace/automarket/resources/views/admin/home/index.blade.php ENDPATH**/ ?>