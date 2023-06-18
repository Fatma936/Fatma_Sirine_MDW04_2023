<div class="nav-container">
    <div class="mobile-topbar-header">
        <div>
            <h1>logo</h1>
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="topbar-nav">
        <ul class="metismenu" id="menu">
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
                <ul>
                    <li> <a href="<?php echo e(url('index')); ?>"><i class="bx bx-right-arrow-alt"></i>Default</a>
                    </li>
                    <li> <a href="<?php echo e(url('dashboard-alternate')); ?>"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Gestion Admin</div>
                </a>
                <ul>
                    <li> <a href="<?php echo e(url('list-admin')); ?>"><i class="bx bx-right-arrow-alt"></i>List Admin</a>
                    </li>
                    <li> <a href="<?php echo e(url('add-admin')); ?>"><i class="bx bx-right-arrow-alt"></i>Ajout Admin</a>
                    </li>
                   
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">Charts</div>
                </a>
                <ul>
                    <li> <a href="<?php echo e(url('charts-apex-chart')); ?>"><i class="bx bx-right-arrow-alt"></i>Apex</a>
                    </li>
                    <li> <a href="<?php echo e(url('charts-chartjs')); ?>"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
                    </li>
                    <li> <a href="<?php echo e(url('charts-highcharts')); ?>"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                    </div>
                    <div class="menu-title">Gestion Sites</div>
                </a>
                <ul>
                    <li> <a href="<?php echo e(url('list-site')); ?>"><i class="bx bx-right-arrow-alt"></i>List Site</a>
                    </li>
                    <li> <a href="<?php echo e(url('add-site')); ?>"><i class="bx bx-right-arrow-alt"></i>Add Site</a>
                    </li>
                    <li> <a href="<?php echo e(url('affect_site')); ?>"><i class="bx bx-right-arrow-alt"></i>Affect Site</a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-lock"></i>
                    </div>
                    <div class="menu-title">Authentication</div>
                </a>
                <ul>
                    <li> <a href="<?php echo e(url('authentication-signin')); ?>" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In</a>
                    </li>
                    <li> <a href="<?php echo e(url('authentication-signup')); ?>" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up</a>
                    </li>
                    <li> <a href="<?php echo e(url('authentication-signin-with-header-footer')); ?>" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In with Header & Footer</a>
                    </li>
                    <li> <a href="<?php echo e(url('authentication-signup-with-header-footer')); ?>" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up with Header & Footer</a>
                    </li>
                    <li> <a href="<?php echo e(url('authentication-forgot-password')); ?>" target="_blank"><i class="bx bx-right-arrow-alt"></i>Forgot Password</a>
                    </li>
                    <li> <a href="<?php echo e(url('authentication-reset-password')); ?>" target="_blank"><i class="bx bx-right-arrow-alt"></i>Reset Password</a>
                    </li>
                    <li> <a href="<?php echo e(url('authentication-lock-screen')); ?>" target="_blank"><i class="bx bx-right-arrow-alt"></i>Lock Screen</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon icon-color-6"> <i class="bx bx-donate-blood"></i>
                    </div>
                    <div class="menu-title">Pages</div>
                </a>
                <ul>
                    <li> <a href="<?php echo e(url('user-profile')); ?>"><i class="bx bx-right-arrow-alt"></i>User Profile</a>
                    </li>
                    <li> <a href="<?php echo e(url('timeline')); ?>"><i class="bx bx-right-arrow-alt"></i>Timeline</a>
                    </li>
                    <li> <a href="<?php echo e(url('pricing-table')); ?>"><i class="bx bx-right-arrow-alt"></i>Pricing</a>
                    </li>
                    <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Errors</a>
                        <ul>
                            <li> <a href="<?php echo e(url('errors-404-error')); ?>"><i class="bx bx-right-arrow-alt"></i>404 Error</a>
                            </li>
                            <li> <a href="<?php echo e(url('errors-500-error')); ?>"><i class="bx bx-right-arrow-alt"></i>500 Error</a>
                            </li>
                            <li> <a href="<?php echo e(url('errors-coming-soon')); ?>"><i class="bx bx-right-arrow-alt"></i>Coming Soon</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Forms</div>
                </a>
                <ul>
                    <li> <a href="<?php echo e(url('form-elements')); ?>"><i class="bx bx-right-arrow-alt"></i>Form Elements</a>
                    </li>
                    <li> <a href="<?php echo e(url('form-input-group')); ?>"><i class="bx bx-right-arrow-alt"></i>Input Groups</a>
                    </li>
                    <li> <a href="<?php echo e(url('form-layouts')); ?>"><i class="bx bx-right-arrow-alt"></i>Forms Layouts</a>
                    </li>
                    <li> <a href="<?php echo e(url('form-validations')); ?>"><i class="bx bx-right-arrow-alt"></i>Form Validation</a>
                    </li>
                    <li> <a href="<?php echo e(url('form-wizard')); ?>"><i class="bx bx-right-arrow-alt"></i>Form Wizard</a>
                    </li>
                    <li> <a href="<?php echo e(url('form-text-editor')); ?>"><i class="bx bx-right-arrow-alt"></i>Text Editor</a>
                    </li>
                    <li> <a href="<?php echo e(url('form-file-upload')); ?>"><i class="bx bx-right-arrow-alt"></i>File Upload</a>
                    </li>
                    <li> <a href="<?php echo e(url('form-date-time-pickes')); ?>"><i class="bx bx-right-arrow-alt"></i>Date Pickers</a>
                    </li>
                    <li> <a href="<?php echo e(url('form-select2')); ?>"><i class="bx bx-right-arrow-alt"></i>Select2</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<?php /**PATH /home/douz/horizontal/ProjectPFE/resources/views/layouts/nav.blade.php ENDPATH**/ ?>