<!--aside open-->
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="nav-link pl-1 pr-1 leading-none ">
                <img src="<?php echo e(url('')); ?>/assets/img/avatar/avatar-3.jpeg" alt="user-img"
                     class="avatar-xl rounded-circle mb-1">
                <!-- <span class="pulse bg-success" aria-hidden="true"></span> -->
            </div>
            <div class="user-info">
                <h6 class=" mb-1 text-dark"><?php echo e(auth()->user()->name); ?></h6>
            </div>
        </div>
    </div>

    <ul class="side-menu">
        <li class="slide">
            <a class="side-menu__item" href="<?php echo e(route('admin.home.index')); ?>" data-toggle="slide" href="#"><i
                    class="side-menu__icon fa fa-laptop"></i>
                <span class="side-menu__label"><?php echo e(trans('home')); ?></span>
            </a>
        </li>
    </ul>

        <ul class="side-menu">
            <li class="slide">
                <a href="<?php echo e(route('admin.users.index')); ?>" class="side-menu__item" data-toggle="slide" href="#">
                        <i class="side-menu__icon fa fa-user"></i>
                    <span class="side-menu__label"><?php echo e(trans('users')); ?></span>
                </a>
            </li>
        </ul>

    <ul class="side-menu">
        <li class="slide">
            <a href="<?php echo e(route('admin.categories.index')); ?>" class="side-menu__item" data-toggle="slide" href="#">
                <i class="side-menu__icon fa fa-user"></i>
                <span class="side-menu__label"><?php echo e(trans('categories')); ?></span>
            </a>
        </li>
    </ul>

    <ul class="side-menu">
        <li class="slide">
            <a href="<?php echo e(route('admin.brands.index')); ?>" class="side-menu__item" data-toggle="slide" href="#">
                <i class="side-menu__icon fa fa-user"></i>
                <span class="side-menu__label"><?php echo e(trans('brands')); ?></span>
            </a>
        </li>
    </ul>

    <ul class="side-menu">
        <li class="slide">
            <a href="<?php echo e(route('admin.offers.index')); ?>" class="side-menu__item" data-toggle="slide" href="#">
                <i class="side-menu__icon fa fa-user"></i>
                <span class="side-menu__label"><?php echo e(trans('offers')); ?></span>
            </a>
        </li>
    </ul>

    <ul class="side-menu">
        <li class="slide">
            <a href="<?php echo e(route('admin.images.index')); ?>" class="side-menu__item" data-toggle="slide" href="#">
                <i class="side-menu__icon fa fa-user"></i>
                <span class="side-menu__label"><?php echo e(trans('images')); ?></span>
            </a>
        </li>
    </ul>

        <ul class="side-menu">
            <li class="slide">
                <a href="<?php echo e(route('admin.sponsors.index')); ?>" class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fa fa-industry"></i>
                    <span class="side-menu__label "><?php echo e(trans('sponsors')); ?></span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li class="slide">
                <a href="<?php echo e(route('admin.questions.index')); ?>" class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fa fa-industry"></i>
                    <span class="side-menu__label "><?php echo e(trans('questions')); ?></span>
                </a>
            </li>
        </ul>

        <ul class="side-menu">
            <li class="slide">
                <a href="<?php echo e(route('admin.settings.index')); ?>" class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fa fa-industry"></i>
                    <span class="side-menu__label "><?php echo e(trans('settings')); ?></span>
                </a>
            </li>
        </ul>

        <ul class="side-menu">
            <li class="slide">
                <a href="<?php echo e(route('admin.auth.logout')); ?>" class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fa fa-sign-out"></i>
                    <span class="side-menu__label "><?php echo e(trans('log_out')); ?></span>
                </a>
            </li>
        </ul>
</aside>

<!--aside closed-->
<?php /**PATH /var/www/html/workspace/automarket/resources/views/admin/sidebar.blade.php ENDPATH**/ ?>