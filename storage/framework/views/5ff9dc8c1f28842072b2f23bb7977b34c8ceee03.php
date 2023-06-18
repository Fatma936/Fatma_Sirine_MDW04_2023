
<?php $__env->startSection("style"); ?>
<link href="http://127.0.0.1:8000/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="http://127.0.0.1:8000/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
    <?php $__env->startSection("wrapper"); ?>
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Scenario Management</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url()->previous()); ?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Scenario</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="row">
                <div class="col-xl-7 mx-auto">
                    
                   
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-webcam me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Edit Scenario:</h5>
                            </div>
                            <hr>                           
                                   <form class="row g-3" method="POST" action="<?php echo e(url('update-scenario/'.$scenario->id)); ?>" >
                                    <?php echo e(csrf_field()); ?>

                                     <?php echo method_field('PUT'); ?>
                                    <div class="col-12" for="device_id">Device:</div>
                                       <select class="single-select" name="device_id" id="device_id">
                                            <option value="ffffff100000b745" <?php echo e($scenario->device_id == "ffffff100000b745" ? 'selected' : ''); ?>>AN-103A Temp/Humidity Sensor</option>
                                            <option value="ffffff100000c836" <?php echo e($scenario->device_id == "ffffff100000c836" ? 'selected' : ''); ?>>AN-122-A03 GPS Tracker</option>
                                            <option value="ffffff100000d135" <?php echo e($scenario->device_id == "ffffff100000d135" ? 'selected' : ''); ?>>AN-203A Water Level Monitor</option>
                                        </select>
                                       <!-- Min -->
                                       <div class="col-12">
                                           <label for="inputLastName1" class="form-label">Min</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-right-down-arrow-circle'></i></span>
                                               <input type="text" class="form-control border-start-0" name="min" id="inputMin" placeholder="Min" value="<?php echo e($scenario->min); ?>"/>
                                           </div>
                                       </div>
                                       <!-- Max -->
                                       <div class="col-12">
                                           <label for="inputLastName1" class="form-label">Max</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-right-top-arrow-circle'></i></span>
                                               <input type="text" class="form-control border-start-0" name="max" id="inputMax" placeholder="Max" value="<?php echo e($scenario->max); ?>"/>
                                           </div>
                                       </div>
                                       <!-- Normal -->
                                       <div class="col-12">
                                           <label for="inputLastName1" class="form-label">Normal</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-right-arrow-circle'></i></span>
                                               <input type="text" class="form-control border-start-0" name="normal" id="inputNormal" placeholder="Normal" value="<?php echo e($scenario->normal); ?>"/>
                                           </div>
                                       </div>
                                       <div class="col-12">
                                           <button type="submit" class="btn btn-primary px-5">Update</button>
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
    <?php $__env->startSection("script"); ?>
        <script src="http://127.0.0.1:8000/assets/plugins/select2/js/select2.min.js"></script>
        <script>
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
        </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/scenario/edit.blade.php ENDPATH**/ ?>