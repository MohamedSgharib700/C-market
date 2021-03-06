<?php $__env->startSection('content'); ?>
    <div class="app-content">
        <section class="section">
            <!--page-header open-->
            <div class="row">
                <div class="col-6">
                    <div class="page-header">
                        <h4 class="page-title"><?php echo e(trans('new_offer')); ?></h4>
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
                                <h4><?php echo e(trans('new_offer')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo $__env->make('admin.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <form action="<?php echo e(route('admin.offers.store')); ?>" method="post" enctype="multipart/form-data" id="horizontal-validation" class="form-horizontal">
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
                                        <label for="ar[name]" class="col-md-3 col-form-label"><?php echo e(trans('ar_desc')); ?></label>
                                        <div class="col-md-9">
                                            <textarea  class="form-control" name="ar[description]" id="ar[description]" value="<?php echo e(old('ar.name' )); ?>"> </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="en[name]" class="col-md-3 col-form-label"><?php echo e(trans('en_desc')); ?> </label>
                                        <div class="col-md-9">
                                            <textarea  class="form-control" name="en[description]" id="en[description]" value="<?php echo e(old('en.name')); ?>"> </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="en[name]" class="col-md-3 col-form-label"><?php echo e(trans('discount')); ?> </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="discount" id="en[name]" value="<?php echo e(old('en.name')); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="en[name]" class="col-md-3 col-form-label"><?php echo e(trans('feature')); ?> </label>
                                        <div class="col-md-9">
                                            <input type="checkbox" name="feature" value="1">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="categories"><?php echo e(trans('new_categories')); ?></label>
                                        <select  name="category_id"  class="form-control" id="category_id">

                                            <option ><?php echo e(trans('select_category')); ?></option>

                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>

                                    <div class="form-group" id="brand" style="display:none;" >

                                        <label for="categories"><?php echo e(trans('new_brand')); ?></label>
                                        <select name="brand_id"  class="form-control" id="brand_id">

                                        </select>

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
<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript">
        $('#category_id').on('change', function () {
            var category = this.value;
            $('#brand').css('display', 'block');
            getCategoryBrands(category);
        });
        function getCategoryBrands(category) {
            var url = '<?php echo e(route("api.category.brands")); ?>';

            $.ajax({
                url: url,
                type: 'get',
                data: {_token: '<?php echo e(csrf_token()); ?>', category:category},
                success: function (data) {
                    console.log(data);
                    var html = ' <option ><?php echo e(trans("select_brand")); ?></option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html +=
                            '<option value ="' + data[i].id + '">' + data[i].name + '</option>';
                    }
                    $('#brand_id').html(html);
                },
                error: function () {
                    alert("select category");
                }
            });//end ajax
        }
    </script>

    <script>
        var s2 = $("#selectCategories").select2({
        tags: true
        });
        var vals = [];
        vals.forEach(function(e){
        if(!s2.find('option:contains(' + e + ')').length)
        s2.append($('<option>').text(e));
            });
            s2.val(vals).trigger("change");
    </script>

    <script>
        var s2 = $("#selectbrands").select2({
            tags: true
        });
        var vals = [];
        vals.forEach(function(e){
            if(!s2.find('option:contains(' + e + ')').length)
                s2.append($('<option>').text(e));
        });
        s2.val(vals).trigger("change");
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/workspace/automarket/resources/views/admin/offers/new.blade.php ENDPATH**/ ?>