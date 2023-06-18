@extends("layouts.app")
@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Site Management</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="list-site"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Site</li>
                    </ol>
                </nav>
            </div>
            
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <div class="card border-top border-0 border-4 border-success">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-success"></i></div>
                            <h5 class="mb-0 text-success">Add New Site:</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="POST" action="store_site">
                          {{ csrf_field() }}
                          <!-- Nom -->
                          <div class="col-12">
                              <label for="inputLastName1" class="form-label">Location</label>
                              <div class="input-group">
                                  <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                  <input type="text" id="searchInput" name="location" class="form-control border-start-0" placeholder="Tapez un emplacement">
                              </div>
                              <div id="suggestionsList" class="suggestions-list"></div>
                          </div>
                          <div class="col-12">
                              <label for="latitudeOutput" class="form-label">Latitude:</label>
                              <input type="text" id="latitudeOutput" name="latitude" class="form-control" readonly>
                          </div>
                          <div class="col-12">
                              <label for="longitudeOutput" class="form-label">Longitude:</label>
                              <input type="text" id="longitudeOutput" name="longitude" class="form-control" readonly>
                          </div>
                          <div class="col-12">
                              <button type="submit" class="btn btn-success px-5">Add</button>
                          </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://127.0.0.1:8000/assets/js/jquery.min.js"></script>
<script>
    const searchInput = document.getElementById('searchInput');
    const suggestionsList = document.getElementById('suggestionsList');
    const latitudeOutput = document.getElementById('latitudeOutput');
    const longitudeOutput = document.getElementById('longitudeOutput');

    searchInput.addEventListener('input', handleSearchInput);

    function handleSearchInput() {
        const searchTerm = searchInput.value.trim();

        if (searchTerm.length >= 3) {
            fetchSuggestions(searchTerm)
                .then(suggestions => {
                    showSuggestions(suggestions);
                })
                .catch(error => {
                    console.log('Une erreur s\'est produite:', error);
                });
        } else {
            clearSuggestions();
        }
    }

    function fetchSuggestions(searchTerm) {
        const url = `https://nominatim.openstreetmap.org/search?q=${searchTerm}+Tunisie&format=json`;
        return fetch(url)
            .then(response => response.json())
            .then(data => {
                return data.map(location => ({
                    display_name: location.display_name,
                    latitude: location.lat,
                    longitude: location.lon
                }));
            });
    }

    function showSuggestions(suggestions) {
        clearSuggestions();

        suggestions.forEach(suggestion => {
            const suggestionItem = document.createElement('div');
            suggestionItem.classList.add('suggestion-item');
            suggestionItem.textContent = suggestion.display_name;
            suggestionsList.appendChild(suggestionItem);

            suggestionItem.addEventListener('click', () => {
                searchInput.value = suggestion.display_name;
                latitudeOutput.value = suggestion.latitude;
                longitudeOutput.value = suggestion.longitude;
                clearSuggestions();
            });
        });
    }

    function clearSuggestions() {
        while (suggestionsList.firstChild) {
            suggestionsList.removeChild(suggestionsList.firstChild);
        }
    }
</script>
    <style>
        .suggestions-list {
          max-height: 200px;
          overflow-y: auto;
          border: 1px solid #ccc;
          padding: 5px;
        }
      
        .suggestion-item {
          cursor: pointer;
          padding: 5px;
          margin-bottom: 5px;
        }
      </style>
@endsection
