		<?php $__env->startSection("wrapper"); ?>
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Devices</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="list-AppDevice"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add AppDevice</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="row">
                <div class="col-xl-7 mx-auto">
                    
                   
                    <div class="card border-top border-0 border-4 border-success">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-success"></i>
                                </div>
                                <h5 class="mb-0 text-success">Add  New AppDevice:</h5>
                            </div>
                            <hr>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                                   <form class="row g-3" method="POST" action="/store-AppDevice"  enctype="multipart/form-data">
                                       <?php echo e(csrf_field()); ?>


                                     
                                        <!-- devEUI -->
                                        <div class="col-12">
                                           <label for="devEUI" class="form-label">devEUI</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 <?php $__errorArgs = ['devEUI'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="devEUI" id="inputDevEUI" placeholder="devEUI" />
                                              
                                           </div>
                                           <?php if($errors->has('devEUI')): ?>
                                           <span class="text-danger"><?php echo e($errors->first('devEUI')); ?></span>
                                           <?php endif; ?>
                                       </div>

                                       <!-- appEUI -->
                                       <div class="col-12">
                                           <label for="inputAppEUI" class="form-label">appEUI</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-chip' ></i></span>
                                               <input type="text" class="form-control border-start-0 " name="appEUI" id="inputAppEUI" value="1" readonly />
                                            </div>
                                            <?php if($errors->has('appEUI')): ?>
                                            <span class="text-danger"><?php echo e($errors->first('appEUI')); ?></span>
                                            <?php endif; ?>
                                       </div>
                                       
       
                                         <!-- devAddr -->
                                         <div class="col-12">
                                           <label for="inputDevAddr" class="form-label">devAddr</label>
                                           <div class="input-group" > <span class="input-group-text bg-transparent"><i class='bx bxs-door-open' ></i></span>
                                                <input type="devAddr" class="form-control border-start-0 <?php $__errorArgs = ['devAddr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="devAddr"  id="inputDevAddr" placeholder="devAddr" >
                                               
                                           </div>
                                           <?php if($errors->has('devAddr')): ?>
                                           <span class="text-danger"><?php echo e($errors->first('devAddr')); ?></span>
                                           <?php endif; ?>
                                       </div>
                                       <!-- appKey -->
                                       <div class="col-12">
                                           <label for="inputAppKey" class="form-label">appKey</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 <?php $__errorArgs = ['appKey'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="appKey" id="inputAppKey" placeholder="appKey" />
                                              
                                           </div>
                                           <?php if($errors->has('appKey')): ?>
                                           <span class="text-danger"><?php echo e($errors->first('appKey')); ?></span>
                                           <?php endif; ?>
                                       </div>
                                       <!-- appSKey -->
                                       <div class="col-12">
                                           <label for="inputAppSKey" class="form-label">appSKey</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 <?php $__errorArgs = ['appSKey'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="appSKey" id="inputAppSKey" placeholder="appSKey" />
                                              
                                           </div>
                                           <?php if($errors->has('appSKey')): ?>
                                           <span class="text-danger"><?php echo e($errors->first('appSKey')); ?></span>
                                           <?php endif; ?>
                                       </div>
                                      
                                        <!-- photo -->
                                        <div class="form-group">
                                            <label for="inputUdpPort" class="form-label">Choose a photo of your Gateway:</label>
                                                <div class="custom-file">
                                                    <input type="file" class="form-control border-start-0 <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="image" name="image" accept="image/*" aria-describedby="photoHelp" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                                                    <?php $__errorArgs = ['image'];
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

                                       
                                       <!-- activationMode -->
                                       <div class="col-12">
                                           <label for="activationMode" class="form-label">Choose your activation mode:</label>
                                           <div class="form-group">
                                               <div class="form-check form-switch">
                                                   <input class="form-check-input <?php $__errorArgs = ['activationMode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="activationMode[]" value="otaa" id="otaa" <?php echo e(old('activationMode') == 'otaa' ? 'checked' : ''); ?>>
                                                   <label class="form-check-label" for="flexSwitchCheckChecked">OTAA</label>
                                                </div>

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input <?php $__errorArgs = ['activationMode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="activationMode[]" value="abp" id="abp" <?php echo e(old('activationMode') == 'abp' ? 'checked' : ''); ?>>

                                                   <label class="form-check-label" for="flexSwitchCheckChecked">ABP</label>
                                                </div>                                              
                                               
                                            </div>
                                            <?php if($errors->has('activationMode')): ?>
                                            <span class="text-danger"><?php echo e($errors->first('activationMode')); ?></span>
                                            <?php endif; ?>
                                        </div>

                                       <div class="col-12">
                                           <button type="submit" class="btn btn-success px-5">Add</button>
                                       </div>
                                   </form>
                               </div>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
		<?php $__env->stopSection(); ?>




<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/appDevice/add-appdevice.blade.php ENDPATH**/ ?>