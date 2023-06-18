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
                                    <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><i class="bx bx-home-alt"></i></a>
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
                    </div>
                    <!--end breadcrumb-->
                    <div class="card border-top border-0">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22"></i>
                                </div>
                                <h5 class="mb-0">Your site:</h5>
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
                                     <a href="/affect_site_user" class="btn btn-primary">Assign site to user</a>
                                    </div>
                                </div>
                                <div class="table-responsive mt-3">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Location</th>						
                                                <th>created at</th>
                                                <th>updated at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sites as $site)
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     {{$loop ->index+1}} 
                                                    </div>
                                                </td> 

                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     {{$site->location}} 
                                                    </div>
                                                </td> 
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     {{$site->created_at}} 
                                                    </div>
                                                </td> 
                                                <td>                    
                                                    <div class="d-flex align-items-center">
                                                     {{$site->updated_at}} 
                                                    </div>
                                                </td> 
                                                <td>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection
