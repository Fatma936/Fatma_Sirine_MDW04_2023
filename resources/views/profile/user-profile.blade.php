@extends("layouts.app")

		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">User Profile</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                </ol>
                            </nav>
                        </div>
                        
                    </div>
                    <!--end breadcrumb-->
                    <div class="container">
                        <div class="main-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                @if ($profile->image)
                                                <img src="{{ asset('storage/' . auth()->user()->image) }}" class="rounded-circle p-1 bg-primary" width="110">
                                                @else
                                                <img src="assets/images/user.png" alt="Default Avatar" class="rounded-circle p-1 bg-primary" width="110">
                                                @endif
                                                <div class="mt-3">
                                                    <h4>{{ $profile->name }}</h4>
                                                    <p class="text-secondary mb-1">{{ $profile->role }}</p>
                                                    <br>
                                                    <form action="{{ url('updatePhoto') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <label class="btn btn-outline-primary">  Choose file
                                                            <input type="file" name="image" accept="image/*" style="display: none;">
                                                        </label>                                                        
                                                        <button type="submit" class="btn btn-primary">Update Photo</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <hr class="my-4" />
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="21" viewBox="0 0 256 193"><path fill="#4285F4" d="M58.182 192.05V93.14L27.507 65.077L0 49.504v125.091c0 9.658 7.825 17.455 17.455 17.455h40.727Z"/><path fill="#34A853" d="M197.818 192.05h40.727c9.659 0 17.455-7.826 17.455-17.455V49.505l-31.156 17.837l-27.026 25.798v98.91Z"/><path fill="#EA4335" d="m58.182 93.14l-4.174-38.647l4.174-36.989L128 69.868l69.818-52.364l4.669 34.992l-4.669 40.644L128 145.504z"/><path fill="#FBBC04" d="M197.818 17.504V93.14L256 49.504V26.231c0-21.585-24.64-33.89-41.89-20.945l-16.292 12.218Z"/><path fill="#C5221F" d="m0 49.504l26.759 20.07L58.182 93.14V17.504L41.89 5.286C24.61-7.66 0 4.646 0 26.23v23.273Z"/></svg>&nbsp; Email</h6>
                                                    <span class="text-secondary">{{ $profile->email }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><path fill="#673AB7" d="M38 44H12V4h26c2.2 0 4 1.8 4 4v32c0 2.2-1.8 4-4 4z"/><path fill="#311B92" d="M10 4h2v40h-2c-2.2 0-4-1.8-4-4V8c0-2.2 1.8-4 4-4z"/><path fill="#fff" d="M36 24.2c-.1 4.8-3.1 6.9-5.3 6.7c-.6-.1-2.1-.1-2.9-1.6c-.8 1-1.8 1.6-3.1 1.6c-2.6 0-3.3-2.5-3.4-3.1c-.1-.7-.2-1.4-.1-2.2c.1-1 1.1-6.5 5.7-6.5c2.2 0 3.5 1.1 3.7 1.3l-.6 6.8c0 .3-.2 1.6 1.1 1.6c2.1 0 2.4-3.9 2.4-4.6c.1-1.2.3-8.2-7-8.2c-6.9 0-7.9 7.4-8 9.2c-.5 8.5 6 8.5 7.2 8.5c1.7 0 3.7-.7 3.9-.8l.4 2c-.3.2-2 1.1-4.4 1.1c-2.2 0-10.1-.4-9.8-10.8c.3-2.1 1.6-11.2 10.8-11.2c9.2 0 9.4 8.1 9.4 10.2zm-11.9 1.3c-.1 1 0 1.8.2 2.3c.2.5.6.8 1.2.8c.1 0 .3 0 .4-.1c.2-.1.3-.1.5-.3c.2-.1.3-.3.5-.6c.2-.2.3-.6.4-1l.5-5.4c-.2-.1-.5-.1-.7-.1c-.5 0-.9.1-1.2.3c-.3.2-.6.5-.9.8c-.2.4-.4.8-.6 1.3s-.2 1.3-.3 2z"/></svg>&nbsp; Address</h6>                                                
                                                    <span class="text-secondary">{{ $profile->address }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#24a0ed" d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1.02 1.02 0 0 0-1.02.24l-2.2 2.2a15.045 15.045 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1c0 9.39 7.61 17 17 17c.55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1zM19 12h2a9 9 0 0 0-9-9v2c3.87 0 7 3.13 7 7zm-4 0h2c0-2.76-2.24-5-5-5v2c1.66 0 3 1.34 3 3z"/></svg>&nbsp; Phone</h6>
                                                    <span class="text-secondary">{{ $profile->phone }}</span>
                                                </li>
                                                

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ url('update-profile-user') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Full Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="name" value="{{$profile->name}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" value="{{$profile->email}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Phone</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="phone" value="{{$profile->phone}}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Address</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="address" value="{{$profile->address}}" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                                    </div>
                                                </div>                           
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                @if(auth()->user()->role == 'super-admin')
                                                    <a class="nav-link active " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-admins" type="button" role="tab" aria-controls="nav-admins" aria-selected="true">Admins</a>
                                                    <a class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="false">Users</a>
                                                @elseif(auth()->user()->role == 'admin')
                                                <a class="nav-link active " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="true">Users</a>
                                                @endif
                                                </div>
                                            </nav>
                                            @if(auth()->user()->role == 'super-admin')
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-admins" role="tabpanel" aria-labelledby="nav-admins-tab" tabindex="0">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Photo</th>
                                                                <th>Location</th>
                                                                <th>Users</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($admins as $admin)
                                                            <tr>
                                                                <td>
                                                                    <span class="text-secondary">{{ $admin->name }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ($admin->image)
                                                                        <img src="{{ asset('storage/' . $admin->image) }}" class="user-img" alt="user avatar">
                                                                    @else
                                                                        <img src="assets/images/user.png" alt="Default Avatar" class="user-img" alt="user avatar">
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    @php
                                                                    $site_admin = DB::table('site_user')
                                                                        ->where('user_id', $admin->id) 
                                                                        ->join('sites', 'site_user.site_id', '=', 'sites.id')
                                                                        ->select('sites.location', 'sites.id')
                                                                        ->get();
    
                                                                    @endphp 
                                                                    @if ($site_admin->isNotEmpty())
                                                                        @foreach ($site_admin as $site)
                                                                            <span class="text-secondary">Site: {{ $site->location }}</span><br>
                                                                        @endforeach
                                                                    @else
                                                                        <span class="text-secondary">No sites found</span>
                                                                    @endif
                                                                    
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $adminUsers = $users->where('added_by', $admin->id);
                                                                    @endphp
                                                                    @if ($adminUsers->isNotEmpty())
                                                                        @foreach ($adminUsers as $adminUser)
                                                                            <span class="text-secondary">{{ $adminUser->name }}</span><br>
                                                                        @endforeach
                                                                    @else
                                                                        <span class="text-secondary">No users found</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                <div class="tab-pane fade @if(auth()->user()->role == 'admin') show active @endif" id="nav-users" role="tabpanel" aria-labelledby="nav-admins-tab" tabindex="0">
                                                     <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Photo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($users as $user)
                                                            <tr>
                                                                <td>
                                                                    <span class="text-secondary">{{ $user->name }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ($user->image)
                                                                        <img src="{{ asset('storage/' . $user->image) }}" class="user-img" alt="user avatar">
                                                                    @else
                                                                        <img src="assets/images/user.png" alt="Default Avatar" class="user-img" alt="user avatar">
                                                                    @endif
                                                                </td>
                                                                
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        


