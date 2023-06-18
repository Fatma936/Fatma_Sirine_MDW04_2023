@extends("layouts.app")
		@section("wrapper")
<<<<<<< HEAD
        <!-- Include the Bootstrap CSS and JavaScript files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-VNrc5BXV7Rbk5OM5uZ7+Eot3qoFz7d+iGNW+xXfm7x3jBImyiVKL1Rb5u5f5ge5A" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

=======
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
<<<<<<< HEAD
                        <div class="breadcrumb-title pe-3">Admin Management</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">List Admins</li>
                                </ol><th></th>
                            </nav>
                        </div>
                        
=======
                        <div class="breadcrumb-title pe-3">Gestion Admin</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">List Admin</li>
                                </ol><th></th>
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
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:;">Separated link</a>
                                </div>
                            </div>
                        </div>
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
                    </div>
                    <!--end breadcrumb-->
                    <div class="card border-top border-0">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22"></i>
                                </div>
<<<<<<< HEAD
                                <h5 class="mb-0">List of Admins:</h5>
                            </div>
                            <hr> 
                            
                            @if (session()->has('message'))
                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0 text-success">Success Alert</h6>
                                            <div>{{ session('message') }}!</div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                             @endif
                                    
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a href="/add-admin" class="btn btn-success">Add new admin</a>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive mt-3">
=======
                                <h5 class="mb-0">List of admin:</h5>
                            </div>
                            <hr>   
                             <!-- Message de réussite -->
                            @if (session()->has('message'))
                                   
                            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
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

                    <div class="d-flex align-items-center">
                        <div>
                            <a href="/add-admin" class="btn btn-success">Add new admin</a>
                        </div>
                          

                    </div>
                    <div class="table-responsive mt-3">
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>						
                                                <th>Email</th>
<<<<<<< HEAD
                                                <th>image</th>
                                                <th>Role</th>
                                                <th>Action</th>
=======
                                                <th>Role</th>
                                                <th>Action</th>
                                                <th>liste sites</th>
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     {{$loop ->index+1}} 
                                                    </div>
                                                </td> 

                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     {{$user->name}} 
                                                    </div>
                                                </td> 
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     {{$user->email}} 
                                                    </div>
                                                </td> 
<<<<<<< HEAD
                                                <td>
                                                    @if ($user->image)
                                                        <img src="{{ asset('storage/' . $user->image) }}" class="user-img" alt="user avatar">
                                                    @else
                                                        <img src="assets/images/user.png" alt="Default Avatar" class="user-img" alt="user avatar">
                                                    @endif
                                                </td>
=======
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     {{$user->role}}
                                                    </div>
                                                </td>
<<<<<<< HEAD
                                                <td> 
                                                    <div class="d-flex align-items-center">
                                                        <a class="btn btn-sm btn-primary" href="{{ url('edit-admin/'.$user->id) }}" ><i class='bx bx-edit-alt me-0'></i></a>
                                                        &nbsp;&nbsp;
                                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}"><i class='bx bx-trash-alt me-0'></i></a>
                                                       
                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $user->id }}">Confirm Deletion</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body"> Are you sure you want to delete {{ ucfirst($user->name) }} ?</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                            <form id="deleteForm{{ $user->id }}" action="{{ url('destroy-admin/'.$user->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>                                    
=======
                                                <td>
                                                <form action="{{ url('list-site-admin/'.$user->id) }}" method="GET">
                                                 @csrf

                                                <button type="submit" class="btn btn-outline-secondary ">View sites</button>
                                                </form>
                                                </td>
                                                <td> 
                                                    <div class="d-flex align-items-center">
                                                        <a class="btn btn-outline-primary" href="{{ url('edit-admin/'.$user->id) }}"><i class='bx bx-edit-alt me-0'></i></a>&nbsp;&nbsp;
                                                        <form id="delete-form" action="{{ url('destroy-admin/'.$user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-outline-danger" }}"><i class='bx bx-trash-alt me-0'></i></a>

                                                        </form>
                                                     
                                                    </div>
                                                </td>
                     
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
                                    </form>
                                </div>
                            </div>  
                        </div>
                    </div>   
@endsection
