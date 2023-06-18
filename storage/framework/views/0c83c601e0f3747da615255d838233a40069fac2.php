		<?php $__env->startSection("wrapper"); ?>
<div class="page-wrapper">
    <div class="page-content">
            
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">User Management</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update user</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7 mx-auto">
                    
                   
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Update User:</h5>
                            </div>
                            <hr>
                            
                            <form class="row g-3" action="<?php echo e(url('update-user/'.$user->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                  <!-- Nom -->
                                  <div class="col-12">
                                           <label for="inputLastName1" class="form-label">Name</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                               <input type="text" class="form-control border-start-0 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($user->name); ?>" />
                                               <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <p><?php echo e($message); ?></p>
                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                           </div>
                                       </div>
                                       <!-- Email -->
                                       <div class="col-12">
                                           <label for="inputEmailAddress" class="form-label">Email Address</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-envelope' ></i></span>
                                               <input type="text" class="form-control border-start-0 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($user->email); ?>"/>
                                               <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <p><?php echo e($message); ?></p>
                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                           </div>
                                       </div>
                                           
                                         <!-- Mot de pass -->
                                         <div class="col-12">
                                           <label for="inputPassword" class="form-label">Password</label>
                                           <div class="input-group" id="show_hide_password"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
                                                <input type="password" class="form-control border-start-0 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Enter another password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <p><?php echo e($message); ?></p>
                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                         <!-- Verifier Mot de pass -->
                                        <div class="col-12">
                                            <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                            <div class="input-group" id="show_hide_password"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
                                                <input type="password" class="form-control border-start-0" name="password_confirmation" id="password_confirmation" placeholder="confirm new password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                           </div>
                                       </div>

                                       <!-- Role -->
                                       <div class="col-12">
                                           <label for="inputRole" class="form-label">Role</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-check-shield' ></i></span>
                                               <input type="text" class="form-control border-start-0" name="role" value="<?php echo e($user->role); ?>" />
                                           </div>
                                       </div>

                                       <div class="col-12">
                                           <button type="submit" class="btn btn-primary px-5">Update</button>
                                       </div>
                            </form>
                        </div>
                    </div>
                  
                </div>
            </div>
    </div>
</div>
<script src="http://127.0.0.1:8000/assets/js/jquery.min.js"></script>
        <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
        </script>
		<?php $__env->stopSection(); ?>



<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/User/Update_user.blade.php ENDPATH**/ ?>