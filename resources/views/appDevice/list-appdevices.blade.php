@extends("layouts.app")

@section("wrapper")
    <!-- Include the Bootstrap CSS and JavaScript files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-VNrc5BXV7Rbk5OM5uZ7+Eot3qoFz7d+iGNW+xXfm7x3jBImyiVKL1Rb5u5f5ge5A" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <style>
        .device-frame {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            display: inline-block;
        }

        .device-image {
            text-align: center;
        }

        .device-properties {
            margin-top: 10px;
        }

        .device-properties p {
            margin: 5px 0;
        }
    </style>

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Devices</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">List AppDevices</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card border-top border-0">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div>
                            <i class="bx bxs-user me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">List of AppDevices:</h5>
                    </div>
                    <hr>

                    <!-- Message de réussite -->
                    @if (session()->has('message'))
                        <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-success">
                                    <i class='bx bxs-check-circle'></i>
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
                            <a href="add-AppDevice" class="btn btn-success">Add new device</a>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                        @foreach($devices as $device)
                            <div class="col">
                                <div class="card radius-15">
                                    <div class="card-body text-start">
                                        <div class="p-4 border radius-15">
                                            @if($device->image_path)
                                                <img src="{{ $device->image_path }}" width="180" height="180" class="rounded-circle shadow" alt="{{ $device->devEUI }}">
                                            @else
                                                <img src="{{ asset('storage/aucun.jpg') }}" width="180" height="180" class="rounded-circle shadow" alt="{{ $device->devEUI }}">
                                            @endif
                                            <h5 class="mb-0 mt-4">
                                            @if ($device->devEUI == "ffffff100000b745") 
                                            <p>AN-103A Temp/Humidity Sensor</p>
                                            @elseif ($device->devEUI == "ffffff100000c836")
                                            <p>AN-122-A03 GPS Tracker</p>
                                            @elseif ($device->devEUI == "ffffff100000d135")
                                            <p>AN-203A Water Level Monitor</p>
                                            @else
                                            <p>Device Not defined</p>
                                            
                                            @endif
                                            </h5>
                                            <p class="mb-3">Activation mode:{{ $device->activationMode }}</p>
                                            <p class="mb-3">appEUI: {{ $device->appEUI }}</p>
                                            <p class="mb-3">devAddr: {{ $device->devAddr }}</p>
                                            <p class="mb-3">serverId: {{ $device->serverId }}</p>
                                            <p class="mb-3">downLength:{{ $device->downLength }}</p>

                                            <div class="d-grid">
                                                <div class="d-flex align-items-center">
                                                    <a class="btn btn-sm btn-primary" href="{{ url('edit-AppDevice/'.$device->devEUI) }}">
                                                        <i class='bx bx-edit-alt me-0'></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $device->devEUI }}">
                                                        <i class='bx bx-trash-alt me-0'></i>
                                                    </a>

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $device->devEUI }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $device->devEUI }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel{{ $device->devEUI }}">Confirm Deletion</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">Are you sure you want to delete this gateway?</div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                                    <form id="deleteForm{{ $device->devEUI }}" action="{{ url('destroy-AppDevice/'.$device->devEUI) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </form>
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
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
