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
                                <h5 class="mb-0 text-success">Add AppDevice:</h5>
                            </div>
                            <hr>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                   <form class="row g-3" method="POST" action="/store-AppDevice"  enctype="multipart/form-data">
                                       {{ csrf_field() }}

                                     
                                        <!-- devEUI -->
                                        <div class="col-12">
                                           <label for="devEUI" class="form-label">devEUI</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('devEUI') is-invalid @enderror" name="devEUI" id="inputDevEUI" placeholder="devEUI" />
                                              
                                           </div>
                                           @if ($errors->has('devEUI'))
                                           <span class="text-danger">{{ $errors->first('devEUI') }}</span>
                                           @endif
                                       </div>

                                       <!-- appEUI -->
                                       <div class="col-12">
                                           <label for="inputAppEUI" class="form-label">appEUI</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-chip' ></i></span>
                                               <input type="text" class="form-control border-start-0 " name="appEUI" id="inputAppEUI" value="1" readonly />
                                            </div>
                                            @if ($errors->has('appEUI'))
                                            <span class="text-danger">{{ $errors->first('appEUI') }}</span>
                                            @endif
                                       </div>
                                       
       
                                         <!-- devAddr -->
                                         <div class="col-12">
                                           <label for="inputDevAddr" class="form-label">devAddr</label>
                                           <div class="input-group" > <span class="input-group-text bg-transparent"><i class='bx bxs-door-open' ></i></span>
                                                <input type="devAddr" class="form-control border-start-0 @error('devAddr') is-invalid @enderror" name="devAddr"  id="inputDevAddr" placeholder="devAddr" >
                                               
                                           </div>
                                           @if ($errors->has('devAddr'))
                                           <span class="text-danger">{{ $errors->first('devAddr') }}</span>
                                           @endif
                                       </div>
                                       <!-- appKey -->
                                       <div class="col-12">
                                           <label for="inputAppKey" class="form-label">appKey</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('appKey') is-invalid @enderror" name="appKey" id="inputAppKey" placeholder="appKey" />
                                              
                                           </div>
                                           @if ($errors->has('appKey'))
                                           <span class="text-danger">{{ $errors->first('appKey') }}</span>
                                           @endif
                                       </div>
                                       <!-- appSKey -->
                                       <div class="col-12">
                                           <label for="inputAppSKey" class="form-label">appSKey</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('appSKey') is-invalid @enderror" name="appSKey" id="inputAppSKey" placeholder="appSKey" />
                                              
                                           </div>
                                           @if ($errors->has('appSKey'))
                                           <span class="text-danger">{{ $errors->first('appSKey') }}</span>
                                           @endif
                                       </div>
                                      
                                        <!-- photo -->
                                        <div class="form-group">
                                            <label for="inputUdpPort" class="form-label">Choose a photo of your Gateway:</label>
                                                <div class="custom-file">
                                                    <input type="file" class="form-control border-start-0 @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" aria-describedby="photoHelp" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                                                    @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
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
                                                    <input class="form-check-input @error('activationMode') is-invalid @enderror" type="radio" name="activationMode[]" value="abp" id="abp" {{ old('activationMode') == 'abp' ? 'checked' : '' }}>

                                                   <label class="form-check-label" for="flexSwitchCheckChecked">ABP</label>
                                                </div>                                              
                                               
                                            </div>
                                            @if ($errors->has('activationMode'))
                                            <span class="text-danger">{{ $errors->first('activationMode') }}</span>
                                            @endif
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



