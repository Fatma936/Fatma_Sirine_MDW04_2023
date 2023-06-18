@extends("layouts.app")
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Forms</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Input Group</li>
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
                                <h5 class="mb-0 text-success">Add NetDevice:</h5>
                            </div>
                            <hr>
                                   <form class="row g-3" method="POST" action="/store-NetDevice" >
                                       {{ csrf_field() }}

                                     
                                        <!-- devEUI -->
                                        <div class="col-12">
                                           <label for="devEUI" class="form-label">devEUI</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('devEUI') is-invalid @enderror" name="devEUI" id="inputDevEUI" placeholder="devEUI" />
                                               @error('devEUI')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>

                                       <!-- nwkSKey -->
                                       <div class="col-12">
                                           <label for="inputAppEUI" class="form-label">nwkSKey</label>
                                           <div class="input-group" > <span class="input-group-text bg-transparent"><i class='bx bxs-door-open' ></i></span>
                                                <input type="devAddr" class="form-control border-start-0 @error('nwkSKey') is-invalid @enderror" name="nwkSKey"  id="inputnwkSKey" placeholder="nwkSKey" >
                                                @error('nwkSKey')
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
                                                <input type="devAddr" class="form-control border-start-0 @error('devAddr') is-invalid @enderror" name="devAddr"  id="inputDevAddr" placeholder="devAddr" >
                                                @error('devAddr')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>
                                       <!-- devNonceBlackList -->
                                       <div class="col-12">
                                           <label for="inputAppKey" class="form-label">devNonceBlackList</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('devNonceBlackList') is-invalid @enderror" name="devNonceBlackList" id="inputdevNonceBlackList" placeholder="devNonceBlackList" />
                                               @error('devNonceBlackList')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>
                                       <!-- fCntUp -->
                                       <div class="col-12">
                                           <label for="inputAppSKey" class="form-label">fCntUp</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('fCntUp') is-invalid @enderror" name="fCntUp" id="inputfCntUp" placeholder="fCntUp" />
                                               @error('fCntUp')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                                @enderror
                                           </div>
                                       </div>

                                         <!-- fCntDown -->
                                         <div class="col-12">
                                           <label for="inputAppSKey" class="form-label">fCntDown</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('fCntDown') is-invalid @enderror" name="fCntDown" id="inputfCntDown" placeholder="fCntDown" />
                                               @error('fCntDown')
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
                                                   <input class="form-check-input @error('activationMode') is-invalid @enderror" type="radio" name="activationMode[]" value="otaa" id="otaa" {{ old('activationMode') == 'otaa' ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="flexSwitchCheckChecked">OTAA</label>
                                                </div>

                                                <div class="form-check form-switch">
                                                   <input class="form-check-input @error('activationMode') is-invalid @enderror" type="radio" name="activationMode[]" value="abp" id="otaa" {{ old('activationMode') == 'abp' ? 'checked' : '' }}>
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
        
		@endsection



