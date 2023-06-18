@extends("layouts.app")
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Devices</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit NetDevice</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="row">
                <div class="col-xl-7 mx-auto">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Edit NetDevice:</h5>
                            </div>
                            <hr>
                            <form class="row g-3" action="{{ url('update-NetDevice/'.$netdevice->devEUI) }}" method="post">
                                @csrf
                                @method('PUT')
                                        <!-- devEUI -->
                                        <div class="col-12">
                                           <label for="devEUI" class="form-label">devEUI</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-hdd'></i></span>
                                               <input type="text" class="form-control border-start-0 @error('devEUI') is-invalid @enderror" name="devEUI" id="inputDevEUI" value="{{$netdevice->devEUI}}" readonly />
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
                                                <input type="devAddr" class="form-control border-start-0 @error('nwkSKey') is-invalid @enderror" name="nwkSKey"  id="inputnwkSKey" value="{{ $hexnwkSKey }}" >
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
                                                <input type="devAddr" class="form-control border-start-0 @error('devAddr') is-invalid @enderror" name="devAddr"  id="inputDevAddr" value="{{$netdevice->devAddr}}" >
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
                                               <input type="text" class="form-control border-start-0 @error('devNonceBlackList') is-invalid @enderror" name="devNonceBlackList" id="inputdevNonceBlackList" value="{{ $hexdevNonceBlackList }}" />
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
                                               <input type="text" class="form-control border-start-0 @error('fCntUp') is-invalid @enderror" name="fCntUp" id="inputfCntUp" value="{{ $hexfCntUp }}" />
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
                                               <input type="text" class="form-control border-start-0 @error('fCntDown') is-invalid @enderror" name="fCntDown" id="inputfCntDown" value="{{ $hexfCntDown }}" />
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
                                                   <input class="form-check-input @error('activationMode') is-invalid @enderror" type="radio" name="activationMode[]" value="otaa" id="otaa" {{ $netdevice->activationMode === 'otaa' ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="flexSwitchCheckChecked">OTAA</label>
                                                </div>

                                                <div class="form-check form-switch">
                                                   <input class="form-check-input @error('activationMode') is-invalid @enderror" type="radio" name="activationMode[]" value="abp" id="otaa" {{ $netdevice->activationMode === 'abp' ? 'checked' : '' }}>
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



