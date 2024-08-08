<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" class="img-circle"
                                        src="<?php echo e(asset('assets/admin/img/'.Auth::guard('admin')->user()->image)); ?>"
                                        alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?php echo e(Auth::guard('admin')->user()->name); ?> </p>
            <p class="app-sidebar__user-designation"><?php echo e(Auth::guard('admin')->user()->username); ?></p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item <?php if(request()->path() == 'admin/dashboard'): ?> active <?php endif; ?>"
               href="<?php echo e(route('admin.dashboard')); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span
                        class="app-menu__label">Dashboard</span></a></li>


        <li class="treeview <?php if(request()->path() == 'admin/gateway'): ?> is-expanded
                <?php endif; ?> ">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-btc"></i><span
                        class="app-menu__label">Coin Gateways</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item <?php if(request()->path() == 'admin/gateway'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('gateway')); ?>"><i class="icon fa fa-credit-card"></i> Payment Method</a></li>

            </ul>
        </li>

        <li><a class="app-menu__item <?php if(request()->path() == 'admin/crypto'): ?> active <?php endif; ?>"
               href="<?php echo e(route('crypto.index')); ?>"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Exchange Methods</span></a>
        </li>

        <li><a class="app-menu__item <?php if(request()->path() == 'admin/currency'): ?> active <?php endif; ?>"
               href="<?php echo e(route('currency.index')); ?>"><i class="app-menu__icon fa fa-eur"></i><span class="app-menu__label">Currency</span></a>
        </li>

        <li class="treeview  <?php if(request()->path() == 'admin/users'): ?>  is-expanded
                <?php elseif(request()->path() == 'admin/user-banned'): ?>  is-expanded
                <?php elseif(request()->path() == 'admin/user/{user}'): ?>  is-expanded
                <?php elseif(request()->path() == 'admin/active/user'): ?>  is-expanded
                <?php elseif(request()->path() == 'admin/email/unverified/user'): ?>  is-expanded
                <?php elseif(request()->path() == 'admin/phone/unverified/user'): ?>  is-expanded
                        <?php endif; ?>">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span
                        class="app-menu__label">Manage User</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item <?php if(request()->path() == 'admin/users'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('users')); ?>"><i class="icon fa fa-user"></i> Users</a></li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/active/user'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('users.active')); ?>"><i class="icon fa fa-check"></i>Active Users</a></li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/email/unverified/user'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('users.email.verified')); ?>"><i class="icon fa fa-envelope"></i>Email Unverified</a>
                </li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/phone/unverified/user'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('users.phone.verified')); ?>"><i class="icon fa fa-phone"></i>Phone Unerified</a></li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/user-banned'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('user.ban')); ?>" rel="noopener"><i class="icon fa fa-ban"></i> Banned User</a></li>
            </ul>
        </li>


        <li><a class="app-menu__item <?php if(request()->path() == 'admin/transactions'): ?> active <?php endif; ?>"
               href="<?php echo e(route('trans.log')); ?>"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Transaction Log</span></a>
        </li>

        <li><a class="app-menu__item <?php if(request()->path() == 'admin/deposits'): ?> active <?php endif; ?>"
               href="<?php echo e(route('deposits')); ?>"><i class="app-menu__icon fa fa-money"></i>
                Deposits &nbsp; <?php if(\App\Deposit::where('view', 0)->count() > 0): ?><span
                        class="badge badge-danger">  <?php echo e(\App\Deposit::where('view', 0)->count()); ?> <?php else: ?>  <?php endif; ?> </span></a>
        </li>

        <li><a class="app-menu__item <?php if(request()->path() == 'admin/advertising'): ?> active <?php endif; ?>"
               href="<?php echo e(route('admin.advertising')); ?>"><i
                        class="app-menu__icon fa fa-share"></i>Advertising &nbsp; <?php if(\App\CryptoAddvertise::where('view', 0)->count() > 0): ?>
                    <span class="badge badge-danger">  <?php echo e(\App\CryptoAddvertise::where('view', 0)->count()); ?> <?php else: ?>  <?php endif; ?> </span></a>
        </li>

        <li><a class="app-menu__item <?php if(request()->path() == 'admin/complaints'): ?> active <?php endif; ?>"
               href="<?php echo e(route('admin.complaints')); ?>"><i
                        class="app-menu__icon fa fa-comments"></i>Complaints &nbsp; <?php if(\App\Complaints::where('view', 0)->count() > 0): ?>
                    <span class="badge badge-danger">  <?php echo e(\App\Complaints::where('view', 0)->count()); ?> <?php else: ?>  <?php endif; ?> </span></a>
        </li>

        <li><a class="app-menu__item <?php if(request()->path() == 'admin/withdrawal_request'): ?> active <?php endif; ?>"
               href="<?php echo e(route('admin.withdrawal_request')); ?>"><i class="app-menu__icon fa fa-reply"></i>Currency Request
                 &nbsp; <?php if(\App\RequestPayment::where('view', 0)->count() > 0): ?><span
                        class="badge badge-danger">  <?php echo e(\App\RequestPayment::where('view', 0)->count()); ?> <?php else: ?>  <?php endif; ?> </span></a>
        </li>

        <li><a class="app-menu__item <?php if(request()->path() == 'admin/request_trusted_sell'): ?> active <?php endif; ?>"
               href="<?php echo e(route('admin.request_trusted_sell')); ?>"><i class="app-menu__icon fa fa-money"></i>Request Trusted &nbsp;
                Sell <?php if(\App\CryptoAddvertise::where([['view', 0],['trusted_sell',true]])->count() > 0): ?><span
                        class="badge badge-danger">  <?php echo e(\App\CryptoAddvertise::where([['view', 0],['trusted_sell',true]])->count()); ?> <?php else: ?>  <?php endif; ?> </span></a>
        </li>


        <li><a class="app-menu__item <?php if(request()->path() == 'admin/deals'): ?> active <?php endif; ?>"
               href="<?php echo e(route('deal.log')); ?>"><i class="app-menu__icon fa fa-exchange"></i><span class="app-menu__label">Deal Log</span></a>
        </li>

        <?php $check_count = \App\Ticket::where('status', 1)->orWhere('status',3)->count() ?>
        <li class="treeview <?php if(request()->path() == 'admin/supports'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/pending/ticket'): ?> is-expanded

                            <?php endif; ?>">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-ambulance"></i><span class="app-menu__label">Support <?php if($check_count > 0): ?>
                        <span class="badge badge-danger">  <?php echo e($check_count); ?> <?php else: ?>  <?php endif; ?> </span> </span><i
                        class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item <?php if(request()->path() == 'admin/pending/ticket'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('pending.support.ticket')); ?>"><i class="icon fa fa-spinner"></i> Pending
                        &nbsp <?php if($check_count > 0): ?><span
                                class="badge badge-danger">  <?php echo e($check_count); ?> <?php else: ?>  <?php endif; ?></span></a></li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/supports'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('support.admin.index')); ?>"><i class="icon fa fa-ticket"></i> All Tickets</a></li>

            </ul>
        </li>

        <li class="treeview <?php if(request()->path() == 'admin/general-settings'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/template'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/sms-api'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/terms/policy'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/contact-setting'): ?> is-expanded
                            <?php endif; ?>">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span
                        class="app-menu__label">Website Control</span><i
                        class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item <?php if(request()->path() == 'admin/general-settings'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('admin.GenSetting')); ?>"><i class="icon fa fa-cogs"></i> General Setting </a></li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/template'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('email.template')); ?>"><i class="icon fa fa-envelope"></i> Email Setting</a></li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/sms-api'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('sms.api')); ?>"><i class="icon fa fa-mobile"></i> SMS Setting</a></li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/contact-setting'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('contact-setting')); ?>"><i class="icon fa fa-phone"></i> Contact Setting </a></li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/terms/policy'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('terms.policy')); ?>"><i class="icon fa fa-file"></i> Terms & Condition </a></li>
            </ul>
        </li>


        <li class="treeview     <?php if(request()->path() == 'admin/manage-logo'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/manage-footer'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/manage-social'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/menu-control'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/menu-create'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/manage-breadcrumb'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/manage-about'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/advertisement'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/faqs-create'): ?> is-expanded

                                <?php elseif(request()->path() == 'admin/faqs-all'): ?> is-expanded
                                <?php elseif(request()->path() == 'admin/advertisement/create'): ?> is-expanded
                            <?php endif; ?>">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-desktop"></i><span
                        class="app-menu__label">Interface Control</span><i
                        class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">

                <li><a class="treeview-item <?php if(request()->path() == 'admin/manage-logo'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('manage-logo')); ?>"><i class="icon fa fa-photo"></i> Logo & favicon </a></li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/manage-footer'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('manage-footer')); ?>"><i class="icon fa fa-file-text"></i> Manage Footer </a></li>
                <li><a class="treeview-item <?php if(request()->path() == 'admin/manage-social'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('manage-social')); ?>"><i class="icon fa fa-share-alt-square"></i> Manage Social </a>
                </li>
                <li>
                    <a class="treeview-item <?php if(request()->path() == 'admin/menu-control'|| request()->path() == 'admin/menu-create'): ?> active <?php endif; ?>"
                       href="<?php echo e(route('menu-control')); ?>"><i class="icon fa fa-desktop"></i> Menu Control </a></li>
            </ul>
        </li>


    </ul>
</aside>