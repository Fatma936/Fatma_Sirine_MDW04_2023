		<?php $__env->startSection("wrapper"); ?>
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Site Management</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">List Sites</li>
                                </ol><th></th>
                            </nav>
                        </div>
                       
                    </div>
                    <!--end breadcrumb-->
                    <div class="card border-top border-0">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22"></i>
                                </div>
                                <h5 class="mb-0">List of Sites:</h5>
                            </div>
                            <hr>   
                             <!-- Message de réussite -->
                            <?php if(session()->has('message')): ?>
                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0 text-success">Success Alert</h6>
                                            <div><?php echo e(session('message')); ?>!</div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                             <?php endif; ?>

                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="add-site" class="btn btn-success">Add new site</a>
                                    </div>
                                </div>
                                <div class="table-responsive mt-3">
                                    <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>location</th>						
                                                <th>created at</th>
                                                <th>updated at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     <?php echo e($loop ->index+1); ?> 
                                                    </div>
                                                </td> 

                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     <?php echo e($site->location); ?> 
                                                    </div>
                                                </td> 
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     <?php echo e($site->created_at); ?> 
                                                    </div>
                                                </td> 
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     <?php echo e($site->updated_at); ?>

                                                    </div>
                                                </td>
                                                <td> 
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo e($site->id); ?>"><i class='bx bx-trash-alt me-0'></i></a>
                                                       
                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="deleteModal<?php echo e($site->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo e($site->id); ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel<?php echo e($site->id); ?>">Confirm Deletion</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body"> Are you sure you want to delete this site ?</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                            <form id="deleteForm<?php echo e($site->id); ?>" action="<?php echo e(url('destroy-site/'.$site->id)); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>         
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    
                                    </form>
                                </div>
                            </div>  
                        </div>
                    </div>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/Site/list_site.blade.php ENDPATH**/ ?>