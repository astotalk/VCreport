<body class="dashboard dashboard_1">
    <div class="full_container">
      <div class="inner_container">
             <!-- Sidebar  -->
             <nav id="sidebar" class="ps ps--active-y">
                
                <div class="">
                   <div class="sidebar-header">
                      <div class="logo_section">
                         
                         <a href="#"><img class="logo_icon img-responsive" src="{{url('lts_assets/images/layout_img/latech.jfif')}}" alt="#" /></a>
                      </div>
                     
                   </div>
                   <div class="sidebar_user_info">
                      <div class="icon_setting"></div>
                      <div class="user_profle_side">
                         <div class="user_img"><img class="img-responsive" src="{{url('lts_assets/images/layout_img/latech.jfif')}}" alt="#" /></div>
                         <div class="user_info">
                            <h6>Latech</h6>
                            <p><span class="online_animation"></span>Online</p>
                         </div>
                        
                </div>
                      <div class="sidebar_blog_2" style="margin-left: -35px;">
                         
                     
                           
                <h4>General</h4>
                
              
                <ul>
                      <li class="active">
                         <a href="#Dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard grey_color"></i> <span>Dashboard</span></a>
                         <ul class="collapse list-unstyled" id="Dashboard">
                            <li>
                               <a href="{{route('dashboard')}}"><i class="fa fa-circle-o"></i><span>Dashboard</span></a>
                            </li>
                         </ul>
                      </li>
 
                      <li class="active">
                        <a href="#Department" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-building-o" aria-hidden="true"></i> <span>Department Info</span></a>
                        <ul class="collapse list-unstyled" id="Department">
                           <li>
                              <a href="{{route('designation')}}"><i class="fa fa-circle-o"></i> <span>Designation</span></a>
                           </li>
                           <li>
                              <a href="{{route('department')}}"><i class="fa fa-circle-o"></i> <span>Department</span></a>
                           </li>
                        </ul>
                     </li>

                      <li class="active">
                         <a href="#Company" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-building-o" aria-hidden="true"></i> <span>Emaployee Info</span></a>
                         <ul class="collapse list-unstyled" id="Company">
                            <li>
                               <a href="employedetails"><i class="fa fa-circle-o"></i> <span>Emaployee Details</span></a>
                            </li>
                            <li>
                               <a href="{{route('employee')}}"><i class="fa fa-circle-o"></i> <span>Employee</span></a>
                            </li>
                            <li>
                               <a href="{{route('empsalaryslip')}}"><i class="fa fa-circle-o"></i> <span>Emp Salary </span></a>
                            </li>
                         </ul>
                      </li>
 

                     
                   </ul>
                </div>
                
                </div>
             </div>
             </nav>
            
 <div id="content">
 @yield('content')
                <!-- topbar -->
                <div class="topbar">
                   <nav class="navbar navbar-expand-lg navbar-light">
                      <div class="full">
                         <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                         <div class="logo_section">
                            <a href="index.php"><img class="img-responsive" src="{{asset('lts_assets/images/layout_img/latech.jfif')}}" alt="#" /></a>
                         </div>
                         <div class="right_topbar">
                            <div class="icon_info">
                               <ul>
                                  <li><a href="notification.php"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                  <li><a href="help.php"><i class="fa fa-question-circle"></i></a></li>
                                  <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                               </ul>
                               <ul class="user_profile_dd">
                                  <li>
                                     <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{url('lts_assets/images/layout_img/latech.jfif')}}" alt="#" /><span class="name_user">Latech</span></a>
                                     <div class="dropdown-menu">
                                        <a class="dropdown-item" href="profile.php">My Profile</a>
                                        <a class="dropdown-item" href="settings.php">Settings</a>
                                        <a class="dropdown-item" href="help.php">Help</a>
                                        <a class="dropdown-item" href="#">Register</a>
                                        <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                     </div>
                                  </li>
                               </ul>
                            
                            </div>
                            
                            </div> 
                            </div> 
                         </nav>
                   </div>
                