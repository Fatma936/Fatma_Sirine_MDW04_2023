		<?php $__env->startSection("wrapper"); ?>
<div class="page-wrapper">
    <div class="page-content">
            
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Gateways</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(url()->previous()); ?>"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Gateway</li>
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
                                <h5 class="mb-0 text-primary">EDit Gateway:</h5>
                            </div>
                            <hr>
                            
                            <form class="row g-3" action="<?php echo e(url('update-gateway/'.$gateway->gatewayEUI)); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                  <!-- gatewayEUI -->
                                  <div class="col-12">
                                           <label for="inputgatewayEUI" class="form-label">gatewayEUI</label>
                                        
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd' ></i></span>
                                               <input type="text" class="form-control border-start-0" name="gatewayEUI" value="<?php echo e($gateway->gatewayEUI); ?>" readonly />
                                           </div>
                                      
                                       </div>
                                       <!-- ipAddr -->
                                       <div class="col-12">
                                           <label for="inputIpAddr" class="form-label">ipAddr</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-chip' ></i></span>
                                               <input type="text" class="form-control border-start-0 <?php $__errorArgs = ['ipAddr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="ipAddr" value="<?php echo e($gateway->ipAddr); ?>"/>
                                               <?php $__errorArgs = ['ipAddr'];
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
                                       <!-- udpPort -->
                                       <div class="col-12">
                                           <label for="inputUdpPort" class="form-label">udpPort</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-door-open' ></i></span>
                                               <input type="text" class="form-control border-start-0 <?php $__errorArgs = ['udpPort'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="udpPort" value="<?php echo e($gateway->udpPort); ?>"/>
                                               <?php $__errorArgs = ['udpPort'];
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

                                       <!-- photo -->
                                        <div class="form-group">
                                        <label for="inputUdpPort" class="form-label">Choose a photo of your Gateway:</label>
                                            <div class="custom-file">
                                                <input type="file" class="form-control border-start-0 <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="photo" name="photo" accept="image/*" aria-describedby="photoHelp" onchange="document.getElementById('photoPreview').src = window.URL.createObjectURL(this.files[0])">
                                                <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="photoPreview">Preview:</label>
                                            <div class="preview-container">
                                                <img id="photoPreview" class="img-fluid rounded" src="<?php echo e($gateway->photo); ?>" alt="Preview">
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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/Gateway/edit-gateway.blade.php ENDPATH**/ ?>