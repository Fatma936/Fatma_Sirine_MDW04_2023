<?php $__env->startSection("style"); ?>
<link href="http://127.0.0.1:8000/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="http://127.0.0.1:8000/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
    <?php $__env->startSection("wrapper"); ?>
            <div class="page-wrapper">
                <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Gestion Site</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Ajout Site</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">Settings</button>
                                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                                    <a class="dropdown-item" href="javascript:;">Another action</a>
                                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                <div class="col-xl-7 mx-auto">                  
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-been-here me-1 font-22 text-primary"></i>
                                </div>
                                <h6 class="mb-0 text-uppercase">Assign site admin</h6>
                            </div>
                            <hr/>
                            <?php if(session()->has('message')): ?>
                                   
                                   <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                                       <div class="d-flex align-items-center">
                                           <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                                           </div>
                                           <div class="ms-3">
                                               <h6 class="mb-0 text-white">Success Alerts</h6>
                                               <div class="text-white"><?php echo e(session('message')); ?></div>
                                           </div>
                                       </div>
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                   </div>
                                    <?php endif; ?>
                            <div class="borders rounded">
                                <form class="row g-3" method="POST" action="<?php echo e(url('assign-site')); ?>" >
                                    <?php echo e(csrf_field()); ?>

                                    
                                    <label class="form-label" for="site_id">Site</label>
                                    <select class="single-select" name="site_id" id="site_id">
                                        <option value="0" selected> select site </option>
                                        <?php $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($site->id); ?>"><?php echo e($site->location); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <label class="form-label" for="admin_ids">Admin</label>
                                    <select class="multiple-select" name="admin_ids[]" id="admin_ids" data-placeholder="Choose anything" multiple="multiple">
                                        <option value="0" selected> select admin </option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
        
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary px-5">Affect</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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



<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/douz/horizontal/ProjectPFE/resources/views/Site/affectation_site.blade.php ENDPATH**/ ?>