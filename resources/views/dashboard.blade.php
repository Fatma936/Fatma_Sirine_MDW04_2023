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

 #map ,#map2  {
    height: 350px;
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
                                
                                
                            </div>
                            @if(auth()->user()->role != 'user')

                            <div class="card">
                                <div class="card-body">
                                <form method="GET" action="{{ route('dashboard') }}">
                                    @csrf
                                   
                                    <div class="input-group">
                                        <label class="input-group-text" for="site">Select a location :</label>
                                        <select class="form-select" name="selectedSiteId" id="site">
                                            <option value="">Choose a location</option>
                                            @foreach($sites_admin as $site)
                                                <option value="{{ $site->id }}">{{ $site->location }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary">Validate</button>
                                    </div>
                                    
                                </form>
                            </div>
                            </div>
                            @endif
                            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                                <div class="col d-flex">
                                    <div class="card radius-10 border-start border-0 border-3 border-danger flex-grow-1">
                                       <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    @if ($selectedSiteId)
                                                        <p class="mb-0">Site :</p>
                                                        <p class="mb-0">{{ $selectedSite->location }}</p>
                                                    @else
                                                        <p class="mb-0">Total site :</p>
                                                        <h5 class="mb-0">{{ $sites_count }}</h5>
                                                    @endif
                                                </div>
                                                <div class="ms-auto">
                                                    <i class="bx bxs-map-pin font-30"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="w-chart5"></div>
                                    </div>
                                </div>
                                <div class="col d-flex">
                                    <div class="card radius-10 border-start border-0 border-3 border-info flex-grow-1">
                                      <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    @if ($selectedSiteId)
                                                        <p class="mb-0">current site users :</p>
                                                        <p class="mb-0">{{ $users_select_count }}</p>
                                                    @else
                                                        <p class="mb-0">Total users :</p>
                                                        <h5 class="mb-0">{{ $users_count }}</h5>
                                                    @endif
                                                </div>
                                                <div class="ms-auto">
                                                    <i class="bx bxs-group font-30"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="w-chart6"></div>
                                    </div>
                                </div>
                                <div class="col d-flex">
                                    <div class="card radius-10 border-start border-0 border-3 border-success flex-grow-1">
                                      <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    @if ($selectedSiteId)
                                                        <p class="mb-0">Total devices connected to this site :</p>
                                                        <p class="mb-0">{{ $devices_select_count }}</p>
                                                    @else
                                                        <p class="mb-0">Total devices :</p>
                                                        <h5 class="mb-0">{{ $devices_count }}</h5>
                                                    @endif
                                                </div>
                                                <div class="ms-auto">
                                                    <i class="bx bxs-devices font-30"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="w-chart7"></div>
                                    </div>
                                </div>
                                <div class="col d-flex">
                                    <div class="card radius-10 border-start border-0 border-3 border-warning flex-grow-1">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    @if ($selectedSiteId)
                                                        <p class="mb-0 text-secondary">Total gateways connected to this site :</p>
                                                        <p class="mb-0">{{ $gateways_select_count }}</p>
                                                    @else
                                                        <p class="mb-0">Total gateways</p>
                                                        <h5 class="mb-0">{{ $gateways_count }}</h5>
                                                    @endif
                                                </div>
                                                <div class="ms-auto">
                                                    <i class="bx bxs-hdd font-30"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="w-chart8"></div>
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
                                                    <option value="">Real-Time</option>
                                                   
                                                </select>
                                            </div>
                            
                                            <div style="margin-top: 30px;"></div>
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div>
                                                    <div class="average">
                                                        <p class="mb-0">Moyenne Humidity today:</p>
                                                        <h4>{{ $temperatureData['dailyAverages']['averageHumidity'] ?? 'N/A' }}</h4>
                                                    </div>
                                                    <div style="margin-top: 50px;"></div>
                                                    <div class="average">
                                                        <p class="mb-0">Moyenne Temperature today:</p>
                                                        <h4>{{ $temperatureData['dailyAverages']['averageTemp'] ?? 'N/A' }}</h4>
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
                           
                            <div class="col-12 col-lg-5 col-xl-4 d-flex">
                                <div class="card w-100 radius-10">
                                    <div class="card-body">
                                        <div class="card radius-10 border shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Temperature Statut</p>
                                                        <h4 class="my-1">{{ $temperatureData['dailyAverages']['temperatureStatus'] ?? 'N/A' }}</h4>
                                                        <p class="mb-0 font-13 text-danger"><i class='bx bx-temperature-low align-middle'></i></p>
                                                    </div>
                                                    <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bx-low-vision'></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card radius-10 border shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Humidity Statut</p>
                                                        <h4 class="my-1">{{ $temperatureData['dailyAverages']['humidityStatus'] ?? 'N/A' }}</h4>
                                                        <p class="mb-0 font-13 text-success"><i class=''></i></p>
                                                    </div>
                                                    <div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bx-water'></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card radius-10 mb-0 border shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Power Statut</p>
                                                        <h4 class="my-1">{{ $temperatureData['dailyAverages']['powerStatus'] ?? 'N/A' }}</h4>
                                                        <p class="mb-0 font-13 text-success"><i class='bx bx-battery-full align-middle'></i></p>
                                                    </div>
                                                    <div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bx-power-off'></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                              
                            @endif
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
                                                    <th>mail</th>
                                                    <th>Site</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users_admin as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                        @if ($user->image)
                                                            <img src="{{ asset('storage/' . $user->image) }}" class="user-img" alt="user avatar">
                                                        @else
                                                        <img src="assets/images/user.png" class="user-img" alt="Default Avatar">
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    @if ($user->site->location)
                                                        <td>{{ $user->site->location }}</td>
                                                    @else
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                                <div>
                                                                    <a href="affect_site_user" class="btn btn-success"><i class="fa fa-building affect-site-icon"></i> Affecte to site</a>
                                                                </div>
                                                        </div>
                                                    </td>
                                                    @endif
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
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users_super_admin as $admin)
                                                <tr>
                                                    <td>{{ $admin->name }}</td>
                                                    <td>
                                                        
                                                     @if ($admin->image)
                                                    <img src="{{ asset('storage/' . $admin->image) }}" class="user-img" alt="user avatar">
                                                    @else
                                                    <img src="assets/images/user.png" class="user-img" alt="Default Avatar">
                                                    @endif
                                                    </td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>{{ $admin->role }}</td>
                                                    <td>{{ $admin->added_by_name }}</td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if ($waterLevels !== null && array_key_exists('data', $waterLevels))
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="card radius-10">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="monthSelector">Select Month:</label>
                                                <select class="form-control" id="monthSelector" name="monthSelector">
                                                    <option value="">Real-Time</option>
                                                    <!-- Add other options if needed -->
                                                </select>
                                            </div>
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
                        @endif

                        @if ($selectedSiteId)
                                <div class="col-12 col-lg-8">
                                    <div class="card radius-10">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <h6 class="mb-0">Site location</h6>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="chart-container-0" style="height: 350px;">
                                                <div id="map"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endif

                        @if ($gpsData !== null && array_key_exists('latitude', $gpsData))
                            
                                <div class="col-12 col-lg-8">
                                    <div class="card radius-10">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <h6 class="mb-0">GPS maps</h6>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="chart-container-0" style="height: 350px;">
                                                <div id="map2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endif
                        </div>
                        <!--end row-->
                 
                        
                     
                
@endsection
    
    @section("script")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet" />
    
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
                       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      
      
  @if ($selectedSiteId)
  <div id="map"></div>
  <script>
      var latitude = {{ $selectedSite->latitude }};
      var longitude = {{ $selectedSite->longitude }};
      mapboxgl.accessToken = 'pk.eyJ1Ijoic3lyaW5lMWFvdWRpIiwiYSI6ImNsaHE1cWRweDAxdnczaG9hNngxaGlnMnAifQ.4zpU1BPcAAK3M3MCZlEdpg';
      var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/streets-v12',
          center: [longitude, latitude], // Set the initial center coordinates to Djerba, Tunisia
          zoom: 11 // Set the initial zoom level
      });

      var navigationControl = new mapboxgl.NavigationControl();
      map.addControl(navigationControl, 'top-right');
      var marker = new mapboxgl.Marker()
          .setLngLat([longitude, latitude])
          .addTo(map);
</script>
@endif

@if ($gpsData !== null )
  <div class="row" id="map"></div>
  <script>
      var mapboxglAccessToken = 'pk.eyJ1Ijoic3lyaW5lMWFvdWRpIiwiYSI6ImNsaHE1cWRweDAxdnczaG9hNngxaGlnMnAifQ.4zpU1BPcAAK3M3MCZlEdpg';
      var gpsData = {!! json_encode($gpsData) !!};
      var centerIndex = 0; // Index de la position à utiliser comme centre (par exemple, 0 pour la première position)
      var centerLatitude = gpsData.latitude[centerIndex];
      var centerLongitude = gpsData.longitude[centerIndex];

      mapboxgl.accessToken = mapboxglAccessToken;
      var map2 = new mapboxgl.Map({
          container: 'map2',
          style: 'mapbox://styles/mapbox/streets-v12',
          center: [centerLongitude, centerLatitude], // Utiliser les coordonnées du centre spécifié
          zoom: 2 // Niveau de zoom initial
      });

      var navigationControl2 = new mapboxgl.NavigationControl();
      map2.addControl(navigationControl2, 'top-right');

      gpsData.latitude.forEach(function (latitude, index) {
          var longitude = gpsData.longitude[index];
          var marker = new mapboxgl.Marker()
              .setLngLat([longitude, latitude])
              .addTo(map2);
      });
  </script>
@endif
            @if ($waterLevels !== null && array_key_exists('data', $waterLevels))
                 <script>
                    var waterLevelsData = {!! json_encode($waterLevels) !!};

            // Vérifier si les données sont disponibles

            var waterLevelsOptions = {
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

            var waterLevelsChart = new ApexCharts(document.querySelector('#chart'), waterLevelsOptions);
            waterLevelsChart.render();

            var waterLevelsIntervalId = null;

            function updateWaterLevelsChartRealTime() {
                fetch('/api/data')
                    .then(response => response.json())
                    .then(data => {
                        waterLevelsChart.updateSeries([{
                            data: data.waterLevels.data
                        }]);
                        waterLevelsChart.updateOptions({
                            xaxis: {
                                categories: data.waterLevels.labels
                            }
                        });
                    });
            }

            function startWaterLevelsInterval() {
                if (waterLevelsIntervalId == null) {
                    waterLevelsIntervalId = setInterval(updateWaterLevelsChartRealTime, 5000);
                }
            }

            function stopWaterLevelsInterval() {
                if (waterLevelsIntervalId !== null) {
                    clearInterval(waterLevelsIntervalId);
                    waterLevelsIntervalId = null;
                }
            }

            var waterLevelsMonthSelector = document.getElementById('monthSelector');

            // Remplir la liste déroulante avec les mois disponibles
            Object.keys(waterLevelsData.monthlyPayloads).forEach(function(month) {
                var option = document.createElement('option');
                option.value = month;
                option.textContent = month;
                waterLevelsMonthSelector.appendChild(option);
            });

            waterLevelsMonthSelector.addEventListener('change', function() {
                var selectedMonth = waterLevelsMonthSelector.value;

                if (selectedMonth !== '') {
                    if (waterLevelsData.monthlyPayloads.hasOwnProperty(selectedMonth)) {
                        var monthlyPayloads = waterLevelsData.monthlyPayloads[selectedMonth];

                        var labels = [];
                        var data = [];

                        for (var i = 0; i < monthlyPayloads.length; i++) {
                            var payload = monthlyPayloads[i];
                            var label = payload.date ; // Ajouter la date et l'heure dans le libellé
                            labels.push(label);
                            data.push(payload.waterLevel);
                        }

                        waterLevelsChart.updateSeries([{
                            name: 'Water Level',
                            data: data
                        }]);

                        waterLevelsChart.updateOptions({
                            xaxis: {
                                categories: labels
                            }
                        });

                        stopWaterLevelsInterval();
                    } else {
                        console.log("Le mois sélectionné n'existe pas dans les données.");
                    }
                }
                else {
                    updateWaterLevelsChartRealTime();

                    if (waterLevelsIntervalId === null) {
                        waterLevelsIntervalId = setInterval(updateWaterLevelsChartRealTime, 5000);
                    }
                }
            });

            startWaterLevelsInterval();
        
            </script>
            @else
            <script>
            var chartTempContainer = document.querySelector('#chart');
            chartTempContainer.innerHTML = "Aucune donnée de température et d'humidité disponible.";
            </script>
            @endif
            @if ($temperatureData !== null && array_key_exists('temp', $temperatureData))
             <script>
                var temperatureData = {!! json_encode($temperatureData) !!};

            var temperatureOptions = {
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

            var temperatureChart = new ApexCharts(document.querySelector('#chartTemp'), temperatureOptions);
            temperatureChart.render();

            var temperatureUpdateInterval;

            function updateTemperatureChart() {
                fetch('/api/data')
                    .then(response => response.json())
                    .then(data => {
                        temperatureChart.updateSeries([{
                            name: "Temperature",
                            data: data.temperatureData.temp
                        }, {
                            name: "Humidity",
                            data: data.temperatureData.humidity
                        }]);
                        temperatureChart.updateOptions({
                            xaxis: {
                                categories: data.temperatureData.labels
                            }
                        });
                    });
            }

            function startTemperatureRealTimeUpdates() {
                updateTemperatureChart(); // Mise à jour initiale

                temperatureUpdateInterval = setInterval(function() {
                    updateTemperatureChart();
                }, 5000); // Mise à jour toutes les 5 secondes
            }

            function stopTemperatureRealTimeUpdates() {
                clearInterval(temperatureUpdateInterval);
            }

            var temperatureMonthSelector = document.getElementById('month');

            // Remplir la liste déroulante avec les mois disponibles
            Object.keys(temperatureData['monthlyData']).forEach(function(month) {
                var option = document.createElement('option');
                option.value = month;
                option.textContent = month;
                temperatureMonthSelector.appendChild(option);
            });

            temperatureMonthSelector.addEventListener('change', function() {
                var selectedMonth = temperatureMonthSelector.value;

                if (selectedMonth !== "") {
                    stopTemperatureRealTimeUpdates(); // Arrêter les mises à jour en temps réel lorsqu'un mois est sélectionné

                    if (temperatureData['monthlyData'] && temperatureData['monthlyData'].hasOwnProperty(selectedMonth)) {
                        var monthlyData = temperatureData['monthlyData'][selectedMonth]['payloads'];

                        var labels = monthlyData.map(function(payload) {
                            return payload.date;
                        });
                        var tempData = monthlyData.map(function(payload) {
                            return parseFloat(payload.temp);
                        });
                        var humidityData = monthlyData.map(function(payload) {
                            return parseFloat(payload.humidity);
                        });

                        temperatureChart.updateSeries([{
                            name: "Temperature",
                            data: tempData
                        }, {
                            name: "Humidity",
                            data: humidityData
                        }]);

                        temperatureChart.updateOptions({
                            xaxis: {
                                categories: labels
                            }
                        });
                    } else {
                        temperatureChart.updateSeries([]);
                        temperatureChart.updateOptions({
                            xaxis: {
                                categories: []
                            }
                        });
                    }
                } else {
                    startTemperatureRealTimeUpdates(); // Démarrer les mises à jour en temps réel lorsque aucun mois n'est sélectionné
                }
            });

            startTemperatureRealTimeUpdates(); // Start real-time updates initially
                
                
    
    </script>
     @else
     <script>
     var chartTempContainer = document.querySelector('#chartTemp');
     chartTempContainer.innerHTML = "No temperature and humidity data available.";
     </script>
 @endif
            
    @endsection
    