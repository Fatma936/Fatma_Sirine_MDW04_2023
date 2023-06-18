@extends("layouts.app")
@section("style")
<link href="http://127.0.0.1:8000/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="http://127.0.0.1:8000/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
@endsection
    @section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Scenario Management</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Scenario</li>
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
                                <div><i class="bx bxs-webcam me-1 font-22 text-success"></i>
                                </div>
                                <h5 class="mb-0 text-success">Add Scenario:</h5>
                            </div>
                            <hr>                           
                                   <form class="row g-3" method="POST" action="{{ url('update-scenario/'.$scenario->id) }}" >
                                    {{ csrf_field() }}
                                     @method('PUT')
                                    <div class="col-12" for="device_id">Device:</div>
                                       <select class="single-select" name="device_id" id="device_id">
                                            <option value="ffffff100000b745" {{ $scenario->device_id == "ffffff100000b745" ? 'selected' : '' }}>AN-103A Temp/Humidity Sensor</option>
                                            <option value="ffffff100000c836" {{ $scenario->device_id == "ffffff100000c836" ? 'selected' : '' }}>AN-122-A03 GPS Tracker</option>
                                            <option value="ffffff100000d135" {{ $scenario->device_id == "ffffff100000d135" ? 'selected' : '' }}>AN-203A Water Level Monitor</option>
                                        </select>
                                       <!-- Min -->
                                       <div class="col-12">
                                           <label for="inputLastName1" class="form-label">Min</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-right-down-arrow-circle'></i></span>
                                               <input type="text" class="form-control border-start-0" name="min" id="inputMin" placeholder="Min" value="{{ $scenario->min }}"/>
                                           </div>
                                       </div>
                                       <!-- Max -->
                                       <div class="col-12">
                                           <label for="inputLastName1" class="form-label">Max</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-right-top-arrow-circle'></i></span>
                                               <input type="text" class="form-control border-start-0" name="max" id="inputMax" placeholder="Max" value="{{ $scenario->max }}"/>
                                           </div>
                                       </div>
                                       <!-- Normal -->
                                       <div class="col-12">
                                           <label for="inputLastName1" class="form-label">Normal</label>
                                           <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-right-arrow-circle'></i></span>
                                               <input type="text" class="form-control border-start-0" name="normal" id="inputNormal" placeholder="Normal" value="{{ $scenario->normal }}"/>
                                           </div>
                                       </div>
                                       <div class="col-12">
                                           <button type="submit" class="btn btn-success px-5">Update</button>
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
    @section("script")
        <script src="http://127.0.0.1:8000/assets/plugins/select2/js/select2.min.js"></script>
        <script>
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
        </script>
    @endsection