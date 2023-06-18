<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="http://127.0.0.1:8000/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
    
	<?php echo $__env->yieldContent("style"); ?>
	<link href="http://127.0.0.1:8000/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="http://127.0.0.1:8000/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="http://127.0.0.1:8000/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="http://127.0.0.1:8000/assets/css/pace.min.css" rel="stylesheet" />
	<script src="http://127.0.0.1:8000/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="http://127.0.0.1:8000/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="http://127.0.0.1:8000/assets/css/app.css" rel="stylesheet">
	<link href="http://127.0.0.1:8000/assets/css/icons.css" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/dark-theme.css" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/semi-dark.css" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/header-colors.css" />
    <title>KLEOS</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--start header -->
		<?php echo $__env->make("layouts.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--end header -->
		<!--navigation-->
		<?php echo $__env->make("layouts.nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--end navigation-->
		<!--start page wrapper -->
		<?php echo $__env->yieldContent("wrapper"); ?>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0"></p>
		</footer>
	</div>
	<!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr/>
            <h6 class="mb-0">Theme Styles</h6>
            <hr/>
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr/>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr/>
            <h6 class="mb-0">Header Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="http://127.0.0.1:8000/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="http://127.0.0.1:8000/assets/js/jquery.min.js"></script>
	<script src="http://127.0.0.1:8000/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="http://127.0.0.1:8000/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="http://127.0.0.1:8000/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="http://127.0.0.1:8000/assets/js/app.js"></script>
	<?php echo $__env->yieldContent("script"); ?>
</body>

</html><?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/layouts/app.blade.php ENDPATH**/ ?>