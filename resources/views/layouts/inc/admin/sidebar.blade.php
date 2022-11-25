 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item">
             <a class="nav-link" href="{{ url('admin/dashboard') }}">
                 <i class="mdi mdi-speedometer menu-icon"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="pages/charts/chartjs.html">
                 <i class="mdi mdi-sale menu-icon"></i>
                 <span class="menu-title">Sales</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#Category" aria-expanded="false"
                 aria-controls="Category">
                 <i class="mdi mdi-format-indent-decrease menu-icon"></i>
                 <span class="menu-title">Category</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="Category">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('admin/category/create')}}">Add Catagory </i></a>
                        </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('admin/category')}}">View Catagory</a>
                        </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false"
                 aria-controls="product">
                 <i class="mdi mdi-plus-circle menu-icon"></i>
                 <span class="menu-title">Products</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="product">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="{{url('admin/products/create')}}">Add Product</a></li>
                     <li class="nav-item"> <a class="nav-link" href="{{url('admin/products')}}">View Product</a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ url('admin/brands') }}">
                 <i class="mdi mdi-view-headline menu-icon"></i>
                 <span class="menu-title">Brands</span>
             </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <i class="mdi mdi-invert-colors menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>

         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                 <i class="mdi mdi-account-multiple-plus menu-icon"></i>
                 <span class="menu-title">Users</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="auth">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="documentation/documentation.html">
                 <i class="mdi mdi-view-dashboard menu-icon"></i>
                 <span class="menu-title">Home Slider</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="documentation/documentation.html">
                 <i class="mdi mdi-buffer menu-icon"></i>
                 <span class="menu-title">Site Setting</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#setting" aria-expanded="false"
                 aria-controls="setting">
                 <i class="mdi mdi-settings menu-icon"></i>
                 <span class="menu-title">Setting</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="setting">
                 <ul class="nav flex-column sub-menu">

                     <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> View Profile
                         </a></li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Change Password
                         </a></li>
                 </ul>
             </div>

         <li class="nav-item">
             <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                 <i class="mdi mdi-logout menu-icon"></i>
                 <span class="menu-title">Logout</span>
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </li>
         </li>
     </ul>
 </nav>
