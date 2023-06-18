@extends("layouts.app")
		@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
            
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Forms</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
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
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Update Gateway:</h5>
                            </div>
                            <hr>
                            
                            <form class="row g-3" action="{{ url('update-gateway/'.$gateway->gatewayEUI) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                  <!-- gatewayEUI -->
                                  <div class="col-12">
                                           <label for="inputgatewayEUI" class="form-label">gatewayEUI</label>
                                        
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd' ></i></span>
                                               <input type="text" class="form-control border-start-0" name="gatewayEUI" value="{{$gateway->gatewayEUI}}" readonly />
                                           </div>
                                      
                                       </div>
                                       <!-- ipAddr -->
                                       <div class="col-12">
                                           <label for="inputIpAddr" class="form-label">ipAddr</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-chip' ></i></span>
                                               <input type="text" class="form-control border-start-0 @error('ipAddr') is-invalid @enderror" name="ipAddr" value="{{$gateway->ipAddr}}"/>
                                               @error('ipAddr')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>
                                       <!-- udpPort -->
                                       <div class="col-12">
                                           <label for="inputUdpPort" class="form-label">udpPort</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-door-open' ></i></span>
                                               <input type="text" class="form-control border-start-0 @error('udpPort') is-invalid @enderror" name="udpPort" value="{{$gateway->udpPort}}"/>
                                               @error('udpPort')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>

                                       <!-- photo -->
                                        <div class="form-group">
                                        <label for="inputUdpPort" class="form-label">Choose a photo of your Gateway:</label>
                                            <div class="custom-file">
                                                <input type="file" class="form-control border-start-0 @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*" aria-describedby="photoHelp" onchange="document.getElementById('photoPreview').src = window.URL.createObjectURL(this.files[0])">
                                                @error('photo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="photoPreview">Preview:</label>
                                            <div class="preview-container">
                                                <img id="photoPreview" class="img-fluid rounded" src="{{ $gateway->photo }}" alt="Preview">
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