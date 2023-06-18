@extends("layouts.app")
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">User Management</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add new user</li>
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
                                <h5 class="mb-0 text-success">Add user:</h5>
                            </div>
                            <hr>
                                   <form class="row g-3" method="POST" action="/store_user" >
                                       {{ csrf_field() }}

                                       <!-- Nom -->
                                       <div class="col-12">
                                           <label for="inputLastName1" class="form-label">Name</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('name') is-invalid @enderror" name="name" id="inputLastName1" placeholder="Username" />
                                               @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>

                                       <!-- Email -->
                                       <div class="col-12">
                                           <label for="inputEmailAddress" class="form-label">Email Address</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-envelope' ></i></span>
                                               <input type="text" class="form-control border-start-0 @error('email') is-invalid @enderror" name="email" id="inputEmailAddress" placeholder="your_mail@gmail.com" required/>
                                               @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>
                                       
       
                                         <!-- Mot de pass -->
                                         <div class="col-12">
                                           <label for="inputPassword" class="form-label">Password</label>
                                           <div class="input-group" id="show_hide_password"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
                                                <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" name="password"  id="inputChoosePassword" placeholder="12345678" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>
                                       
                                       <!-- Verifier Mot de pass -->
                                       <div class="col-12">
                                           <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                           <div class="input-group" id="show_hide_password"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
                                                <input type="password" class="form-control border-start-0" name="password_confirmation" id="password_confirmation" placeholder="12345678" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                           </div>
                                       </div>

                                       <!-- Role -->
                                       <div class="col-12">
                                           <label for="inputRole" class="form-label">Role</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-check-shield' ></i></span>
                                               <input type="text" class="form-control border-start-0" name="role" id="inputRole" placeholder="User" readonly/>
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



