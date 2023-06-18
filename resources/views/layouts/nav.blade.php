<div class="nav-container">
    <div class="mobile-topbar-header">
<<<<<<< HEAD
       <div>
           <img src="assets/images/logo-icon=.png"  class="logo-icon" alt="logo icon">
       </div>
      
       <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
       </div>
   </div>
   <nav class="topbar-nav">

       <ul class="metismenu" id="menu">
           <li>
               <a href="javascript:;" class="has-arrow">
                   <div class="parent-icon"><i class='bx bx-home-circle'></i>
                   </div>
                   <div class="menu-title">Dashboard</div>
               </a>
               <ul>
                   <li> <a href="{{ url('dashboard') }}"><i class="bx bx-right-arrow-alt"></i>Data Visualization Dashboard</a>
                   </li>
               </ul>
           </li>
           @if(auth()->check() && auth()->user()->role == 'admin')
           <li>
               <a href="javascript:;" class="has-arrow">
                   <div class="parent-icon"><i class="bx bx-user-check"></i>
                   </div>
                   <div class="menu-title">User management</div>
               </a>
               <ul>
                   <li>
                       <a href="{{ url('list-user') }}"><i class="bx bx-right-arrow-alt"></i>List User</a>
                   </li>
                   <li>
                       <a href="{{ url('add-user') }}"><i class="bx bx-right-arrow-alt"></i>Add User</a>
                   </li>
               </ul>
           </li>
           @elseif(auth()->check() && auth()->user()->role == 'super-admin')
           <li>
               <a href="javascript:;" class="has-arrow">
                   <div class="parent-icon"><i class="bx bx-user-check"></i>
                   </div>
                   <div class="menu-title">Admin management</div>
               </a>
               <ul>
                   <li>
                       <a href="{{ url('list-admin') }}"><i class="bx bx-right-arrow-alt"></i>List Admin</a>
                   </li>
                   <li>
                       <a href="{{ url('add-admin') }}"><i class="bx bx-right-arrow-alt"></i>Add Admin</a>
                   </li>
               </ul>
           </li>
           @endif
           @if(auth()->check() && auth()->user()->role == 'admin')
           <li>
               <a class="has-arrow" href="javascript:;">
                   <div class="parent-icon"><i class="bx bx-current-location"></i>
                   </div>
                   <div class="menu-title">Site management</div>
               </a>
               <ul>
               <li> <a href="{{ url('list-site-admin') }}"><i class="bx bx-right-arrow-alt"></i>List Assigned Site</a>
                   </li>
                  
                   <li> <a href="{{ url('affect_site_user') }}"><i class="bx bx-right-arrow-alt"></i>Affect Site to user</a>
                   </li>
               </ul>
           </li>
           @elseif(auth()->check() && auth()->user()->role == 'super-admin')
           <li>
               <a class="has-arrow" href="javascript:;">
                   <div class="parent-icon"><i class="bx bx-current-location"></i>
                   </div>
                   <div class="menu-title">Site management</div>
               </a>
               <ul>
               <li> <a href="{{ url('list-site') }}"><i class="bx bx-right-arrow-alt"></i>List Site</a>
                   </li>
                   <li> <a href="{{ url('add-site') }}"><i class="bx bx-right-arrow-alt"></i>Add Site</a>
                   </li>
                   <li> <a href="{{ url('affect_site') }}"><i class="bx bx-right-arrow-alt"></i>Affect Site</a>
                   </li>
               </ul>
           </li>
           
           <li>
               <a class="has-arrow" href="javascript:;">
                   <div class="parent-icon"><i class="bx bx-map-pin"></i>
                   </div>
                   <div class="menu-title">Gateways</div>
               </a>
               <ul>
                <li> <a href="{{ url('list-gateway') }}" ><i class="bx bx-right-arrow-alt"></i>List Gateway</a>
                   </li>
                   <li> <a href="{{ url('add-Gateway') }}" ><i class="bx bx-right-arrow-alt"></i>Add Gateway</a>
                   </li>
                   <li> <a href="{{ url('affect_site_gateway') }}" ><i class="bx bx-right-arrow-alt"></i>Affect Gateway to site</a>
                   </li>
               </ul>
           </li>
           <li>
               <a class="has-arrow" href="javascript:;">
                   <div class="parent-icon"><i class="bx bx-devices"></i>
                   </div>
                   <div class="menu-title">Devices</div>
               </a>
               <ul>
                   <li> <a href="{{ url('list-AppDevice') }}" ><i class="bx bx-right-arrow-alt"></i>App Device</a>
                   </li>
                   <li> <a href="{{ url('list-NetDevice') }}" ><i class="bx bx-right-arrow-alt"></i>Net Device</a>
                   </li>
                   <li> <a href="{{ url('affect_site_device') }}" ><i class="bx bx-right-arrow-alt"></i>Affect device to site</a>
                   </li>
                   
                   
               </ul>
           </li>
           @endif
           <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-6"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Scenario Management</div>
            </a>
            <ul>
                <li> <a href="{{ url('list-scenarios') }}"><i class="bx bx-right-arrow-alt"></i>List of Scenarios</a>
                </li>
                <li> <a href="{{ url('add_scenario') }}"><i class="bx bx-right-arrow-alt"></i>Add Scenario</a>
                </li>
                
               
            </ul>
        </li>
         
       </ul>
   </nav>
=======
        <div>
            <h1>logo</h1>
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="topbar-nav">
        <ul class="metismenu" id="menu">
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
                <ul>
                    <li> <a href="{{ url('index') }}"><i class="bx bx-right-arrow-alt"></i>Default</a>
                    </li>
                    <li> <a href="{{ url('dashboard-alternate') }}"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Gestion Admin</div>
                </a>
                <ul>
                    <li> <a href="{{ url('list-admin') }}"><i class="bx bx-right-arrow-alt"></i>List Admin</a>
                    </li>
                    <li> <a href="{{ url('add-admin') }}"><i class="bx bx-right-arrow-alt"></i>Ajout Admin</a>
                    </li>
                   
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">Charts</div>
                </a>
                <ul>
                    <li> <a href="{{ url('charts-apex-chart') }}"><i class="bx bx-right-arrow-alt"></i>Apex</a>
                    </li>
                    <li> <a href="{{ url('charts-chartjs') }}"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
                    </li>
                    <li> <a href="{{ url('charts-highcharts') }}"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                    </div>
                    <div class="menu-title">Gestion Sites</div>
                </a>
                <ul>
                    <li> <a href="{{ url('list-site') }}"><i class="bx bx-right-arrow-alt"></i>List Site</a>
                    </li>
                    <li> <a href="{{ url('add-site') }}"><i class="bx bx-right-arrow-alt"></i>Add Site</a>
                    </li>
                    <li> <a href="{{ url('affect_site') }}"><i class="bx bx-right-arrow-alt"></i>Affect Site</a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-lock"></i>
                    </div>
                    <div class="menu-title">Authentication</div>
                </a>
                <ul>
                    <li> <a href="{{ url('authentication-signin') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In</a>
                    </li>
                    <li> <a href="{{ url('authentication-signup') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up</a>
                    </li>
                    <li> <a href="{{ url('authentication-signin-with-header-footer') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In with Header & Footer</a>
                    </li>
                    <li> <a href="{{ url('authentication-signup-with-header-footer') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up with Header & Footer</a>
                    </li>
                    <li> <a href="{{ url('authentication-forgot-password') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Forgot Password</a>
                    </li>
                    <li> <a href="{{ url('authentication-reset-password') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Reset Password</a>
                    </li>
                    <li> <a href="{{ url('authentication-lock-screen') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Lock Screen</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon icon-color-6"> <i class="bx bx-donate-blood"></i>
                    </div>
                    <div class="menu-title">Pages</div>
                </a>
                <ul>
                    <li> <a href="{{ url('user-profile') }}"><i class="bx bx-right-arrow-alt"></i>User Profile</a>
                    </li>
                    <li> <a href="{{ url('timeline') }}"><i class="bx bx-right-arrow-alt"></i>Timeline</a>
                    </li>
                    <li> <a href="{{ url('pricing-table') }}"><i class="bx bx-right-arrow-alt"></i>Pricing</a>
                    </li>
                    <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Errors</a>
                        <ul>
                            <li> <a href="{{ url('errors-404-error') }}"><i class="bx bx-right-arrow-alt"></i>404 Error</a>
                            </li>
                            <li> <a href="{{ url('errors-500-error') }}"><i class="bx bx-right-arrow-alt"></i>500 Error</a>
                            </li>
                            <li> <a href="{{ url('errors-coming-soon') }}"><i class="bx bx-right-arrow-alt"></i>Coming Soon</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Forms</div>
                </a>
                <ul>
                    <li> <a href="{{ url('form-elements') }}"><i class="bx bx-right-arrow-alt"></i>Form Elements</a>
                    </li>
                    <li> <a href="{{ url('form-input-group') }}"><i class="bx bx-right-arrow-alt"></i>Input Groups</a>
                    </li>
                    <li> <a href="{{ url('form-layouts') }}"><i class="bx bx-right-arrow-alt"></i>Forms Layouts</a>
                    </li>
                    <li> <a href="{{ url('form-validations') }}"><i class="bx bx-right-arrow-alt"></i>Form Validation</a>
                    </li>
                    <li> <a href="{{ url('form-wizard') }}"><i class="bx bx-right-arrow-alt"></i>Form Wizard</a>
                    </li>
                    <li> <a href="{{ url('form-text-editor') }}"><i class="bx bx-right-arrow-alt"></i>Text Editor</a>
                    </li>
                    <li> <a href="{{ url('form-file-upload') }}"><i class="bx bx-right-arrow-alt"></i>File Upload</a>
                    </li>
                    <li> <a href="{{ url('form-date-time-pickes') }}"><i class="bx bx-right-arrow-alt"></i>Date Pickers</a>
                    </li>
                    <li> <a href="{{ url('form-select2') }}"><i class="bx bx-right-arrow-alt"></i>Select2</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
</div>
