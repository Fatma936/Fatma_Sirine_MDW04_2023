

<?php $__env->startSection("wrapper"); ?>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="d-flex justify-content-center">
                <div class="card shadow-none">
                    <div class="card-body">
                        <h5 class="card-title">Notification</h5>
                        <p class="card-text"><big>Dear</big> <?php echo e(Auth::user()->name); ?>,
                            <br>We would like to inform you that <strong><?php echo e($notification->body); ?></strong>. Please be advised that if the current
                            <br>The threshold has been exceeded. You may want to consider taking action to handle the increased load.
                        </p>
                        <p>Thank you for your attention and prompt action.</p>
                    </div>
                    <div class="card-footer bg-white">
                        <small class="text-muted">Alert received <?php echo e($notification->created_at->diffForHumans()); ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/notifications/show.blade.php ENDPATH**/ ?>