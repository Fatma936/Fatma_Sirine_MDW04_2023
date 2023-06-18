@extends("layouts.app")
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Site Management</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">List assigned site</li>
                                </ol><th></th>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="card border-top border-0">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22"></i>
                                </div>
                                <h5 class="mb-0">Assigned site:</h5>
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
                                                <th>location</th>
                                                <th>user</th>						
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
                                                    {{$site->name}} 
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
                                                



                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $site->id }}"><i class='bx bx-trash-alt me-0'></i></a>
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $site->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $site->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel{{ $site->id }}">Confirm Deletion</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body"> Are you sure you want to delete {{ ucfirst($site->location) }} associated to:
                                                                    <br/>{{ ucfirst($site->name) }} ?</div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                                    <form id="deleteForm{{ $site->id }}" action="{{ url('destroy-record-user',$site->id ) }}" method="POST" >
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
@endsection
