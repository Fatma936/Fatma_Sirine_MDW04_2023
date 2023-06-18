@extends("layouts.app")
		@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Site Management</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Site</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7 mx-auto">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Edit Site:</h5>
                            </div>
                            <hr>
                           
                            <form class="row g-3" action="{{ url('update-site/'.$site->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                  <!-- Nom -->
                                  <div class="col-12">
                                           <label for="inputLastName1" class="form-label">location</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-map'></i></span>
                                               <input type="text" class="form-control border-start-0" name="location" value="{{$site->location}}" />
                                           </div>
                                       </div>
                                       <div class="col-12">
                                           <button type="submit" class="btn btn-primary px-5">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection



