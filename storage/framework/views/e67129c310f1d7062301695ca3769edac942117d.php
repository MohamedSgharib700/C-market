<?php $__env->startSection('content'); ?>
    <div class="app-content">
        <section class="section">
            <!--page-header open-->
            <div class="row">
                <div class="col-6">
                    <div class="page-header">
                        <h4 class="page-title"><?php echo e(trans('new_sponsor')); ?></h4>
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
                                <h4><?php echo e(trans('sponsor_data')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo $__env->make('admin.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <form action="<?php echo e(route('admin.sponsors.store')); ?>" method="post" enctype="multipart/form-data" id="horizontal-validation" class="form-horizontal">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label for="ar[name]" class="col-md-3 col-form-label"><?php echo e(trans('arabic_name')); ?></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ar[name]" id="ar[name]" value="<?php echo e(old('ar.name' )); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="en[name]" class="col-md-3 col-form-label"><?php echo e(trans('english_name')); ?> </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="en[name]" id="en[name]" value="<?php echo e(old('en.name')); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-md-3 col-form-label"> <?php echo e(trans('image')); ?></label>
                                        <div class="col-md-9">
                                            <div class="form-group upload-btn-wrapper1 files color  mb-lg-0">
                                                <input type="file" class="form-control1" name="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 mt-2 row justify-content-end text-left">
                                        <div class="col-md-9 float-left">
                                            <button type="submit" class="btn btn-edit"><?php echo e(trans('save')); ?></button>
                                            <input type="reset" class="btn btn-danger mt-1" value="<?php echo e(trans('cancel')); ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/workspace/automarket/resources/views/admin/sponsors/new.blade.php ENDPATH**/ ?>