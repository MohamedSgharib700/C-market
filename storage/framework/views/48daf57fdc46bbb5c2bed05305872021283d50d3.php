<?php $__env->startSection('content'); ?>
    <div class="app-content">
        <section class="section">
            <!--page-header open-->
            <div class="row">
                <div class="col-6">
                    <div class="page-header">
                        <h4 class="page-title"><?php echo e(trans('sponsors')); ?></h4>
                    </div>
                </div>
            </div>
            <!--page-header closed-->
            <div class="section-body">
                <!--row open-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-2">
                                    <span style="" class="table-add ">
                                      
                                            <a href="<?php echo e(route('admin.sponsors.create')); ?>"
                                               class="btn btn-add btn-block"><?php echo e(trans('add_sponsor')); ?></a>
                                      
                                    </span>
                                </div>
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
                                <div class="table-responsive">
                                    <table id="example-2"
                                           class="table table-striped table-bordered border-t0 text-nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p"><?php echo e(trans('id')); ?></th>
                                            <th class="wd-15p"><?php echo e(trans('arabic_name')); ?></th>
                                            <th class="wd-15p"><?php echo e(trans('english_name')); ?></th>
                                            <th class="wd-20p"><?php echo e(trans('image')); ?></th>

                                            <th class="wd-20p"><?php echo e(trans('status')); ?></th>
                                        
                                                <th class="wd-20p"> <?php echo e(trans('actions')); ?></th>
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($sponsor->id); ?></td>
                                                 <td>
                                                   <?php echo e($sponsor->translate('ar')->name); ?>

                                                </td>
                                                <td><?php echo e($sponsor->translate('en')->name); ?></td>
                                         
                                                <td><img style="width: 100px" src="<?php echo e(asset($sponsor->image)); ?>"></td>
                                               
                                                <td>
                                                    <label class="custom-switch">
                                                        <input type="checkbox" name="active" id="active"
                                                               data-model="<?php echo e(get_class($sponsor)); ?>"
                                                               data-id="<?php echo e($sponsor->id); ?>"
                                                               value="<?php echo e($sponsor->active); ?>"
                                                               <?php echo e($sponsor->active ? 'checked' : ''); ?> class="custom-switch-input">
                                                        <span class="custom-switch-indicator publish"></span>
                                                    </label>
                                                </td>
                                           
                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <button type="button"
                                                                    class="btn btn-sm btn-info m-b-5 m-t-5 dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                <i class="fa-cog fa"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                              
                                                                    <a class="dropdown-item has-icon"
                                                                       href="<?php echo e(route('admin.sponsors.edit', ['sponsor' => $sponsor->id])); ?>"><i
                                                                            class="fa fa-edit"></i> <?php echo e(trans('edit')); ?>

                                                                    </a>
                                                              
                                                             
                                                                    <button type="button" class="dropdown-item has-icon"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModalLong<?php echo e($sponsor->id); ?>">
                                                                        <i class="fa fa-trash"></i> <?php echo e(trans('remove')); ?>

                                                                    </button>
                                                               
                                                            </div>
                                                        </div>
                                                    </td>
                                              
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <?php echo e($list->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row closed-->
            </div>
        </section>
    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Message Modal -->
            <div class="modal fade" id="exampleModalLong<?php echo e($sponsor->id); ?>" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(trans('delete')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo e(route('admin.sponsors.destroy', ['sponsor' => $sponsor])); ?>" method="Post">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <p class="mb-0"><?php echo e(trans('delete_confirmation_message')); ?></p>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"> <?php echo e(trans('delete')); ?></button>

                                <button type="button" class="btn btn-success"
                                        data-dismiss="modal"><?php echo e(trans('close')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Message Modal closed -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/workspace/automarket/resources/views/admin/sponsors/index.blade.php ENDPATH**/ ?>