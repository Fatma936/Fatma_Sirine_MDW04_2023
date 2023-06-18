<?php $__env->startSection("wrapper"); ?>
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Notification</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All notifications</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="">
                <div class="">
                    <div class="container py-2">
                        <!-- timeline item 1 -->
                        <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="row">
                            
                            <!-- timeline item 1 left dot -->
                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                <div class="row h-50">
                                    <div class="col">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                                <h5 class="m-2">
                                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                                </h5>
                                <div class="row h-50">
                                    <div class="col border-end">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                            </div>
                            <!-- timeline item 1 event content -->
                            <div class="col py-2">
                                <a class="dropdown-item" href="notifications/<?php echo e($notification->id); ?>" class="notification-link">
                                    <div class="card radius-15 ">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <?php if(stripos(strtolower($notification->title), 'high water') !== false): ?>
                                                    <img src="assets/images/high-tide.png" class="msg-avatar" width="50" alt="user avatar">
                                                <?php elseif(stripos(strtolower($notification->title), 'low water') !== false): ?>
                                                    <img src="assets/images/water-level.png" class="msg-avatar" width="50" alt="user avatar">
                                                <?php elseif(stripos(strtolower($notification->title), 'elevated temperature') !== false): ?>
                                                    <img src="assets/images/thermometer (1).png" class="msg-avatar" width="50" alt="user avatar">
                                                <?php elseif(stripos(strtolower($notification->title), 'high temperature') !== false): ?>
                                                    <img src="assets/images/thermometer (1).png" class="msg-avatar" width="50" alt="user avatar">
                                                <?php elseif(stripos(strtolower($notification->title), 'low temperature') !== false): ?>
                                                    <img src="assets/images/thermometer (2).png" class="msg-avatar" width="50" alt="user avatar">
                                                <?php else: ?>  
                                                    <img src="assets/images/Attention-sign-icon.png" class="msg-avatar" width="50" alt="user avatar">
                                                <?php endif; ?>
                                            </div>
                                            <br>
                                            <div class="float-end <?php echo e($notification->read_at === null ? 'text-primary' : 'text-muted'); ?>"><?php echo e($notification->created_at); ?></div>
                                            <h4 class="card-title text-muted"><?php echo e($notification->title); ?></h4>
                                            <p class="card-text"><?php echo e($notification->body); ?></p>  
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="card-text">No notifications found.</p>  
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/notifications/all_notifications.blade.php ENDPATH**/ ?>