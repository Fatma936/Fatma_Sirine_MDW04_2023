@extends("layouts.app")

@section("style")
<link href="http://127.0.0.1:8000/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="http://127.0.0.1:8000/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
@endsection
    @section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Gestion Site</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Ajout Site</li>
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

                    <title>Recherche d'emplacements en Tunisie</title>
                    <h1>Recherche d'emplacements en Tunisie</h1>
                    <input type="text" id="searchInput" class="search-input" placeholder="Tapez un emplacement">
                    <select id="suggestionsList" class="single-select"></select>
                    
                    <script>
                      const searchInput = document.getElementById('searchInput');
                      const suggestionsList = document.getElementById('suggestionsList');
                    
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
                            return data.map(location => location.display_name);
                          });
                      }
                    
                      function showSuggestions(suggestions) {
                        clearSuggestions();
                    
                        suggestions.forEach(suggestion => {
                          const suggestionItem = document.createElement('div');
                          suggestionItem.classList.add('suggestion-item');
                          suggestionItem.textContent = suggestion;
                          suggestionsList.appendChild(suggestionItem);
                    
                          suggestionItem.addEventListener('click', () => {
                            searchInput.value = suggestion;
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
  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
