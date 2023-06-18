		<?php $__env->startSection("wrapper"); ?>
        <!-- Include the Bootstrap CSS and JavaScript files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-VNrc5BXV7Rbk5OM5uZ7+Eot3qoFz7d+iGNW+xXfm7x3jBImyiVKL1Rb5u5f5ge5A" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">User Management</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">List users</li>
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
                                <h5 class="mb-0">List of users:</h5>
                            </div>
                            <hr> 
                            
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
                                            <a href="/add-user" class="btn btn-success">Add new user</a>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive mt-3">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>						
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     <?php echo e($loop ->index+1); ?> 
                                                    </div>
                                                </td> 

                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     <?php echo e($user->name); ?> 
                                                    </div>
                                                </td> 
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     <?php echo e($user->email); ?> 
                                                    </div>
                                                </td> 
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     <?php echo e($user->role); ?>

                                                    </div>
                                                </td>
                                                <td> 
                                                    <div class="d-flex align-items-center">
                                                        <a class="btn btn-sm btn-primary" href="<?php echo e(url('edit-user/'.$user->id)); ?>" ><i class='bx bx-edit-alt me-0'></i></a>
                                                        &nbsp;&nbsp;
                                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo e($user->id); ?>"><i class='bx bx-trash-alt me-0'></i></a>
                                                       
                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="deleteModal<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo e($user->id); ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel<?php echo e($user->id); ?>">Confirm Deletion</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body"> Are you sure you want to delete <?php echo e(ucfirst($user->name)); ?> ?</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                            <form id="deleteForm<?php echo e($user->id); ?>" action="<?php echo e(url('destroy-user/'.$user->id)); ?>" method="POST">
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

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/User/List_users.blade.php ENDPATH**/ ?>