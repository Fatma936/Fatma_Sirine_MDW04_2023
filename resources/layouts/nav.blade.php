<div class="nav-container">
    <div class="mobile-topbar-header">
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
</div>
