@extends("layouts.app")
    @section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Gestion Admin</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Ajout Admin</li>
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
                    <!--end breadcrumb-->
                    <div class="row">
                <div class="col-xl-7 mx-auto">
                    
                   
                    <div class="card border-top border-0 border-4 border-success">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-success"></i>
                                </div>
                                <h5 class="mb-0 text-success">Add admin:</h5>
                            </div>
                            <hr>

                                 <!-- Message de réussite -->
                            @if (session()->has('message'))
                                   
                                   <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                                       <div class="d-flex align-items-center">
                                           <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                                           </div>
                                           <div class="ms-3">
                                               <h6 class="mb-0 text-white">Success Alerts</h6>
                                               <div class="text-white">{{ session('message') }}</div>
                                           </div>
                                       </div>
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                   </div>
                                    @endif
                                   <form class="row g-3" method="POST" action="/store_admin" >
                                       {{ csrf_field() }}
                                       <!-- Nom -->
                                       <div class="col-12">
                                           <label for="inputLastName1" class="form-label">Name</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                               <input type="text" class="form-control border-start-0" name="name" id="inputLastName1" placeholder="Username"/>
                                           </div>
                                       </div>
                                       <!-- Email -->
                                       <div class="col-12">
                                           <label for="inputEmailAddress" class="form-label">Email Address</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-envelope' ></i></span>
                                               <input type="text" class="form-control border-start-0" name="email" id="inputEmailAddress" placeholder="padrick@gmail.com"/>
                                           </div>
                                       </div>
                                       <!-- Verifier Mot de pass -->
                                       <!--div class="col-12">
                                           <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
                                               <input type="text" class="form-control border-start-0" name="password" id="inputConfirmPassword" />
                                           </div>
                                       </!--div>
       
                                         <!-- Mot de pass -->

                                         <div class="col-12">
                                           <label for="inputPassword" class="form-label">Password</label>
                                           <div class="input-group" id="show_hide_password"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
                                           <input type="password" class="form-control border-start-0" name="password"  id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                           </div>
                                       </div>

                                       <!-- Role -->
                                   
                                       <div class="col-12">
                                           <label for="inputRole" class="form-label">Role</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-check-shield' ></i></span>
                                               <input type="text" class="form-control border-start-0" name="role" id="inputRole" placeholder="Admin" readonly/>
                                           </div>
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
        <script src="assets/js/jquery.min.js"></script>
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
		@endsection



