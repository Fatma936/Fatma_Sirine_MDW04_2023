@extends("layouts.app")
@section("wrapper")
<style>
 .average {
    text-align: center;
    margin-bottom: 20px;
}

.average h4 {
    font-size: 24px;
    margin-top: 5px;
}

.chart-container-0 {
    flex-grow: 1;
}


    </style>

                     <div class="page-wrapper">
                        <div class="page-content">
                            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                                <div class="breadcrumb-title pe-3">Dashboard</div>
                                <div class="ps-3">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0 p-0">
                                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><i class="bx bx-home-alt"></i></a></li>
                                        </ol>
                                    </nav>
                                </div>
                                
                                <div class="ms-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Settings</button>
                                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span></button>                            
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                                             <a class="dropdown-item" href="javascript:;">Another action</a>
                                             <a class="dropdown-item" href="javascript:;">Something else here</a>
                                             <div class="dropdown-divider"></div>
                                             <a class="dropdown-item" href="javascript:;">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                <form method="GET" action="{{ route('dashboard') }}">
                                    @csrf
                                    <div class="input-group">
                                        <label class="input-group-text" for="site">Sélectionnez un site :</label>
                                        <select class="form-select" name="selectedSiteId" id="site">
                                            <option value="">Choisissez un site</option>
                                            @foreach($sites_admin as $site)
                                                <option value="{{ $site->id }}">{{ $site->location }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary">Valider</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                            
                            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-info">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    @if ($selectedSiteId)
                                                        <p class="mb-0 text-secondary">Le site est : </p>
                                                        <h4 class="my-1 text-info">{{ $selectedSite->location }}</h4>
                                                        
                                                    @else
                                                        <p class="mb-0 text-secondary">Total Sites</p>
                                                        <h4 class="my-1 text-info">{{ $sites_count }}</h4>
                                                       
                                                    @endif
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bxs-cart'></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    @if ($selectedSiteId)
                                                    <p class="mb-0 text-secondary">Total Users de {{ $selectedSite->location }} </p>
                                                    <h4 class="my-1 text-danger">{{ $users_select_count }}</h4>
                                                   
                                                    @else
                                                    <p class="mb-0 text-secondary">Total Users</p>
                                                    <h4 class="my-1 text-danger">{{ $users_count }}</h4>
                                                    
                                                    @endif
                                                   
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-wallet'></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-success">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    @if ($selectedSiteId)
                                                    <p class="mb-0 text-secondary">Total device de {{ $selectedSite->location }} </p>
                                                    <h4 class="my-1 text-success">{{ $devices_select_count }}</h4>  
                                                    @else
                                                    <p class="mb-0 text-secondary">Total device</p>
                                                    <h4 class="my-1 text-success">{{ $devices_count }}</h4>  
                                                    @endif
                                                    
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    @if ($selectedSiteId)
                                                    <p class="mb-0 text-secondary">Total gateways de {{ $selectedSite->location }}</p>
                                                    <h4 class="my-1 text-warning">{{ $gateways_select_count }}</h4>   
                                                    @else
                                                    <p class="mb-0 text-secondary">Total gateways</p>
                                                    <h4 class="my-1 text-warning">{{ $gateways_count }}</h4>
                                                    @endif
                                                    
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bxs-group'></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                            @if ($temperatureData !== null && array_key_exists('temp', $temperatureData))
                            <div class="row">
                                <div class="col-12 col-lg-7 col-xl-8">
                                    <div class="card radius-10 w-100">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="month">Select Month:</label>
                                                <select class="form-control" id="month" name="month">
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <!-- Ajoutez les autres mois ici -->
                                                </select>
                                            </div>
                                            <div style="margin-top: 30px;"></div>
                                            <div class="d-flex align-items-start justify-content-between">
                                               
                                                <div>
                                                   
                                                    <div class="average">
                                                        <p class="mb-0">Moyenne Humidity today:</p>
                                                        <h4>{{ $temperatureData['dailyAverages'][date('Y-m-d')]['averageHumidity'] ?? 'N/A' }}</h4>
                                                    </div>
                                                    <div style="margin-top: 50px;"></div>
                                                    <div class="average">
                                                        <p class="mb-0">Moyenne Temperature today:</p>
                                                        <h4>{{ $temperatureData['dailyAverages'][date('Y-m-d')]['averageTemp'] ?? 'N/A' }}</h4>
                                                    </div>
                                                </div>
                                                <div class="chart-container-0">
                                                    <div id="chartTemp"></div>
                                                </div>
                                            </div>
                                            <div style="margin-top: 30px;"></div> <!-- Espace sous la courbe -->
                                        </div>
                                    </div>
                                </div>
                            
                            @endif
                            

                            
                            
                            <div class="col-12 col-lg-5 col-xl-4 d-flex">
                                <div class="card w-100 radius-10">
                                    <div class="card-body">
                                        <div class="card radius-10 border shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Moyenne de l'humidité aujourd'hui</p>
                                                        <h4 class="my-1">{{ $temperatureData['dailyAverages'][date('Y-m-d')]['averageHumidity'] ?? 'non disponible' }}</h4>
                                                        <p class="mb-0 font-13">+6.2% par rapport à la semaine dernière</p>
                                                    </div>
                                                    <div class="widgets-icons-2 bg-gradient-cosmic text-white ms-auto"><i class='bx bxs-bar-chart-alt-2'></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card radius-10 border shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Moyenne de la température aujourd'hui</p>
                                                        <h4 class="my-1">{{ $temperatureData['dailyAverages'][date('Y-m-d')]['averageTemp'] ?? 'non disponible' }}</h4>
                                                        <p class="mb-0 font-13">+3.7% par rapport à la semaine dernière</p>
                                                    </div>
                                                    <div class="widgets-icons-2 bg-gradient-ibiza text-white ms-auto"><i class='bx bxs-bar-chart-alt-2'></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card radius-10 mb-0 border shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Moyenne du niveau d'eau aujourd'hui</p>
                                                        <h4 class="my-1">{{ $waterLevels['todaysAverage'] ?? 'non disponible' }}</h4>
                                                        <p class="mb-0 font-13">+3.7% par rapport à la semaine dernière</p>
                                                    </div>
                                                    <div class="widgets-icons-2 bg-gradient-moonlit text-white ms-auto"><i class='bx bxs-bar-chart-alt-2'></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                
                            
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        @if(auth()->user()->role == 'admin')
                                        <div>
                                            <h6 class="mb-0">Users Added by {{ auth()->user()->name }}</h6>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Photo</th>
                                                    <th>site</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users_admin as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td><img src="assets/images/products/01.png')  }}" class="product-img-2" alt="product img"></td>
                                                    <td>{{ $user->email }}</td>
                                                    <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Work</span></td>
                                                    <td>100%</td>
                                                    <td><div class="progress" style="height: 6px;">
                                                    <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div></div></td>
                                                </tr>
                                                @endforeach  
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        @elseif(auth()->user()->role == 'super-admin')
                                        <div>
                                            <h6 class="mb-0">{{ auth()->user()->name }}'s Users</h6>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Photo</th>
                                                    <th>mail</th>
                                                    <th>role</th>
                                                    <th>added by </th>
                                                    <th>Site</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users_super_admin as $admin)
                                                <tr>
                                                    <td>{{ $admin->name }}</td>
                                                    <td><img src="assets/images/products/01.png" class="product-img-2" alt="product img"></td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>{{ $admin->role }}</td>
                                                    <td>{{ $admin->added_by_name }}</td>
                                                    <td>{{ $admin->site_name }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                
                                @if ($gpsData !== null && array_key_exists('latitude', $gpsData)) 
                                <div class="col-12 col-lg-4">
                                    <div class="card radius-10">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <h6 class="mb-0">GPS</h6>
                                                </div>
                                            </div>
                                            <div class="chart-container-0">
                                                <canvas id="chart-GPS"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if ($waterLevels !== null && array_key_exists('data', $waterLevels))
                                <div class="col-12 col-lg-4">
                                    <div class="card radius-10">
                                        <div class="card-body">
                                            <select id="monthSelector">
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <!-- Ajoutez les autres mois ici -->
                                              </select>
                                              
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <h6 class="mb-0">Water Levels</h6>
                                                </div>
                                            </div>
                                            <div class="chart-container-0">
                                                <div id="chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->@endif
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
                            <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
                            <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet" />
                            <style>
                                #map {
                                    height: 400px;
                                }
                            </style>
                            
                            @if ($selectedSiteId)
                                <div id="map"></div>
                                <canvas id="chart-site"></canvas>
                            
                                <script>
                                    mapboxgl.accessToken = 'pk.eyJ1Ijoic3lyaW5lMWFvdWRpIiwiYSI6ImNsaHE1cWRweDAxdnczaG9hNngxaGlnMnAifQ.4zpU1BPcAAK3M3MCZlEdpg';
                            
                                    var map = new mapboxgl.Map({
                                        container: 'map',
                                        style: 'mapbox://styles/mapbox/streets-v12',
                                        center: [10.9000, 33.8000], // Set the initial center coordinates to Djerba, Tunisia
                                        zoom: 11 // Set the initial zoom level
                                    });
                            
                                    var latitude = {{ $selectedSite->latitude }};
                                    var longitude = {{ $selectedSite->longitude }};
                            
                                    var navigationControl = new mapboxgl.NavigationControl();
                                    map.addControl(navigationControl, 'top-right');
                            
                                    var marker = new mapboxgl.Marker()
                                        .setLngLat([longitude, latitude])
                                        .addTo(map);
                            
                                    var gpsChart = new Chart(document.getElementById("chart-site"), {
                                        type: 'scatter',
                                        data: {
                                            datasets: [{
                                                label: 'GPS',
                                                data: latitude.map(function (latitude, index) {
                                                    return { x: longitude[index], y: latitude };
                                                }),
                                                backgroundColor: "#17a00e",
                                                borderColor: "#ffc107",
                                                pointRadius: 10
                                            }]
                                        },
                                        options: {
                                            maintainAspectRatio: false,
                                            title: {
                                                display: true,
                                                text: 'Site Coordinates'
                                            },
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        min: -90,
                                                        max: 90
                                                    },
                                                    scaleLabel: {
                                                        display: true,
                                                        labelString: "Latitude"
                                                    }
                                                }],
                                                xAxes: [{
                                                    ticks: {
                                                        min: -180,
                                                        max: 180
                                                    },
                                                    scaleLabel: {
                                                        display: true,
                                                        labelString: "Longitude"
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            @else
                                <div id="map"></div>
                                <canvas id="chart-GPS"></canvas>
                            
                                <script>
                                    mapboxgl.accessToken = 'pk.eyJ1Ijoic3lyaW5lMWFvdWRpIiwiYSI6ImNsaHE1cWRweDAxdnczaG9hNngxaGlnMnAifQ.4zpU1BPcAAK3M3MCZlEdpg';
                            
                                    var map = new mapboxgl.Map({
                                        container: 'map',
                                        style: 'mapbox://styles/mapbox/streets-v12',
                                        center: [10.9000, 33.8000], // Set the initial center coordinates to Djerba, Tunisia
                                        zoom: 11 // Set the initial zoom level
                                    });
                            
                                    var navigationControl = new mapboxgl.NavigationControl();
                                    map.addControl(navigationControl, 'top-right');
                            
                                    var gpsData = {!! json_encode($gpsData) !!};
                            
                                    gpsData.latitude.forEach(function (latitude, index) {
                                        var marker = new mapboxgl.Marker()
                                            .setLngLat([gpsData.longitude[index], latitude])
                                            .addTo(map);
                                    });
                            
                                    var gpsChart = new Chart(document.getElementById("chart-GPS"), {
                                        type: 'scatter',
                                        data: {
                                            datasets: [{
                                                label: 'GPS',
                                                data: gpsData.latitude.map(function (latitude, index) {
                                                    return { x: gpsData.longitude[index], y: latitude };
                                                }),
                                                backgroundColor: "#17a00e",
                                                borderColor: "#ffc107",
                                                pointRadius: 10
                                            }]
                                        },
                                        options: {
                                            maintainAspectRatio: false,
                                            title: {
                                                display: true,
                                                text: 'Device GPS Coordinates'
                                            },
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        min: -90,
                                                        max: 90
                                                    },
                                                    scaleLabel: {
                                                        display: true,
                                                        labelString: "Latitude"
                                                    }
                                                }],
                                                xAxes: [{
                                                    ticks: {
                                                        min: -180,
                                                        max: 180
                                                    },
                                                    scaleLabel: {
                                                        display: true,
                                                        labelString: "Longitude"
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            @endif
                            
                    
    @endsection
    
    @section("script")
    <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="assets/js/index2.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apex-custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet" />
    <script>
        var waterLevels = {!! json_encode($waterLevels) !!};
    
        // Vérifier si les données sont disponibles
        @if ($waterLevels !== null && array_key_exists('data', $waterLevels))
        var optionsLine = {
            chart: {
                foreColor: '#9ba7b2',
                height: 360,
                type: 'line',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: true
                },
                dropShadow: {
                    enabled: true,
                    top: 3,
                    left: 14,
                    blur: 4,
                    opacity: 0.10,
                }
            },
            stroke: {
                curve: 'smooth',
                width: 5
            },
            colors: ["#f41127", "#0d6efd", '#212529', '#28a745'],
            series: [{
                name: 'Water Level',
                data: {!! json_encode($waterLevels['data']) !!},
            }],
            markers: {
                size: 4,
                strokeWidth: 0,
                hover: {
                    size: 7
                }
            },
            grid: {
                show: true,
                padding: {
                    bottom: 0
                }
            },
            labels: {!! json_encode($waterLevels['labels']) !!},
            xaxis: {
                tooltip: {
                    enabled: false
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                offsetY: -20
            }
        };
    
        var chartLine = new ApexCharts(document.querySelector('#chart'), optionsLine);
        chartLine.render();
    
        var isManualUpdate = true;
    
        function updateChartRealTime() {
            fetch('/api/data')
            .then(response => response.json())
            .then(data => {
                chartLine.updateSeries([{
                data: data.waterLevels.data
                }]);
                chartLine.updateOptions({
                xaxis: {
                    categories: data.waterLevels.labels
                }
                });
            });
        }
        updateChartRealTime();
    
        setInterval(updateChartRealTime, 5000);
    
        var monthSelector = document.getElementById('monthSelector');
    
        monthSelector.addEventListener('change', function() {
            var selectedMonth = monthSelector.value;
    
            if (waterLevels.monthlyPayloads && waterLevels.monthlyPayloads.hasOwnProperty(selectedMonth)) {
                var monthlyPayloads = waterLevels.monthlyPayloads[selectedMonth];
    
                var labels = [];
                var data = [];
    
                for (var i = 0; i < monthlyPayloads.length; i++) {
                    var payload = monthlyPayloads[i];
                    labels.push(payload.time);
                    data.push(payload.waterLevel);
                }
    
                chartLine.updateSeries([{
                    name: 'Water Level',
                    data: data
                }]);
    
                chartLine.updateOptions({
                    xaxis: {
                        categories: labels
                    }
                });
    
                isManualUpdate = true;
            } else {
                // Réinitialiser le graphique avec des données vides
                chartLine.updateSeries([]);
                chartLine.updateOptions({
                    xaxis: {
                        categories: []
                    }
                });
    
                isManualUpdate = false;
            }
        });
        @else
        var chartTempContainer = document.querySelector('#chart');
        chartTempContainer.innerHTML = "Aucune donnée de température et d'humidité disponible.";
        @endif
    </script>
    
    
    <script>
    @if ($temperatureData !== null && array_key_exists('temp', $temperatureData)) {
        	
        var optionsLine = {
            chart: {
                foreColor: '#9ba7b2',
                height: 360,
                type: 'line',
                zoom: {
                    enabled: false
                },
                dropShadow: {
                    enabled: true,
                    top: 3,
                    left: 2,
                    blur: 4,
                    opacity: 0.1,
                }
            },
            stroke: {
                curve: 'smooth',
                width: 5
            },
            colors: ["#0d6efd", '#212529'],
            series: [{
                name: "Temperature",
                data: {!! json_encode($temperatureData['temp']) !!} 
            }, {
                name: "Humidity",
                data: {!! json_encode($temperatureData['humidity']) !!}
            }, {
                name: "etat Battry",
                data: {!! json_encode($temperatureData['humidity']) !!}
            }],
            title: {
                text: 'Temp(°C)/Hum(%)',
                align: 'left',
                offsetY: 25,
                offsetX: 20
            },
            markers: {
                size: 4,
                strokeWidth: 0,
                hover: {
                    size: 7
                }
            },
            grid: {
                show: true,
                padding: {
                    bottom: 0
                }
            },
            labels: {!! json_encode($temperatureData['labels']) !!},
            xaxis: {
                tooltip: {
                    enabled: false
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                offsetY: -20
            }
        }
        
    
        var chartLine2 = new ApexCharts(document.querySelector('#chartTemp'), optionsLine);
        chartLine2.render();
    }
@else
    var chartTempContainer = document.querySelector('#chartTemp');
    chartTempContainer.innerHTML = "Aucune donnée de température et d'humidité disponible.";
@endif

    </script>
    
   
<script>
    @if ($gpsData !== null && array_key_exists('latitude', $gpsData)) {
    var gpsChart = new Chart(document.getElementById("chart-GPS"), {
        type: 'scatter',
        data: {
            datasets: [{
                label: 'GPS',
                data: [
                    @foreach($gpsData['latitude'] as $key => $value)
                        { x: {{ $gpsData['longitude'][$key] }}, y: {{ $value }} },
                    @endforeach
                ],
                backgroundColor: "#17a00e",
				borderColor: "#ffc107",
                pointRadius: 10
            }]
        },
        options: {
            maintainAspectRatio: false,
			title: {
				display: true,
				text: 'Device GPS Coordinates'
			},
            scales: {
                yAxes: [{
                    ticks: {
                        min: -90,
                        max: 90
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Latitude"
                    }
                }],
                xAxes: [{
                    ticks: {
                        min: -180,
                        max: 180
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Longitude"
                    }
                }]
            }
        }
    });}@else
    var chartTempContainer = document.querySelector('#chartTemp');
    chartTempContainer.innerHTML = "Aucune donnée de température et d'humidité disponible.";
@endif
</script>
    




   
@endsection
