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
                                <h5 class="mb-0 text-primary">Update AppDevice:</h5>
                            </div>
                            <hr>
                            
                            <form class="row g-3" action="{{ url('update-AppDevice/'.$appdevice->devEUI) }}" method="post">
                                @csrf
                                @method('PUT')
                                  <!-- devEUI -->
                                  <div class="col-12">
                                           <label for="inputgatewayEUI" class="form-label">gatewayEUI</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd' ></i></span>
                                               <input type="text" class="form-control border-start-0" name="gatewayEUI" value="{{$appdevice->devEUI}}" readonly />
                                           </div>      
                                       </div>
                                      
                                       <!-- appEUI -->
                                       <div class="col-12">
                                           <label for="inputAppEUI" class="form-label">appEUI</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-chip' ></i></span>
                                               <input type="text" class="form-control border-start-0 @error('appEUI') is-invalid @enderror" name="appEUI" value="{{$appdevice->appEUI}}" />
                                               @error('appEUI')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>   
                                           
                                         <!-- devAddr -->
                                        <div class="col-12">
                                           <label for="inputDevAddr" class="form-label">devAddr</label>
                                           <div class="input-group" > <span class="input-group-text bg-transparent"><i class='bx bxs-door-open' ></i></span>
                                                <input type="devAddr" class="form-control border-start-0 @error('devAddr') is-invalid @enderror" name="devAddr"  value="{{$appdevice->devAddr}}" >
                                                @error('devAddr')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>

                                       <!-- appKey -->
                                       <div class="col-12">
                                           <label for="inputAppKey" class="form-label">appKey</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('appKey') is-invalid @enderror" name="appKey" value="{{ $appKey }}" />
                                               @error('appKey')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>

                                       <!-- appSKey -->
                                       <div class="col-12">
                                           <label for="inputAppSKey" class="form-label">appSKey</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('appSKey') is-invalid @enderror" name="appSKey" value="{{ $appSKey}}" />
                                               @error('appSKey')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>
                                      
                                       <!-- activationMode -->
                                       <div class="col-12">
                                           <label for="activationMode" class="form-label">Choose your activation mode:</label>
                                           <div class="form-group">
                                               <div class="form-check form-switch">
                                                   <input class="form-check-input @error('activationMode') is-invalid @enderror" type="radio" name="activationMode[]" value="otaa" id="otaa" {{ $appdevice->activationMode === 'otaa' ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="flexSwitchCheckChecked">OTAA</label>
                                                </div>

                                                <div class="form-check form-switch">
                                                   <input class="form-check-input @error('activationMode') is-invalid @enderror" type="radio" name="activationMode[]" value="abp" id="otaa" {{ $appdevice->activationMode === 'abp' ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="flexSwitchCheckChecked">ABP</label>
                                                </div>                                              
                                                @error('activationMode')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
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


