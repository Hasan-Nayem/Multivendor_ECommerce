        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">Onedash</h4>
            </div>
            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
          </div>
          <!--navigation-->
          <ul class="metismenu" id="menu">
            <li>
              <a href="{{ route('admin.dashboard') }}" class="">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
              </a>              
            </li>

            <li class="menu-label">ECommerce Features</li>
            <!-- Brand -->
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                  <i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">Brand</div>
              </a>
              <ul>
                <li> 
                  <a href="{{ route('brand.create') }}"><i class="bi bi-circle"></i>Add New Brand</a>
                </li>
                <li> 
                  <a href="{{ route('brand.manage') }}"><i class="bi bi-circle"></i>Manage All Brand</a>
                </li>
              </ul>
            </li>

            <!-- Category -->
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                  <i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">Category</div>
              </a>
              <ul>
                <li> 
                  <a href="{{ route('category.create') }}"><i class="bi bi-circle"></i>Add New Category</a>
                </li>
                <li> 
                  <a href="{{ route('category.manage') }}"><i class="bi bi-circle"></i>Manage All Categories</a>
                </li>
              </ul>
            </li>

            <!-- Product -->
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                  <i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">Product</div>
              </a>
              <ul>
                <li> 
                  <a href="{{ route('product.create') }}"><i class="bi bi-circle"></i>Add New Product</a>
                </li>
                <li> 
                  <a href="{{ route('product.manage') }}"><i class="bi bi-circle"></i>Manage All Product</a>
                </li>
              </ul>
            </li>

            <!-- Coupon -->
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                  <i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">Coupon</div>
              </a>
              <ul>
                <li> 
                  <a href="ecommerce-products-list.html"><i class="bi bi-circle"></i>Add New Coupon</a>
                </li>
                <li> 
                  <a href="ecommerce-products-grid.html"><i class="bi bi-circle"></i>Manage All Coupon</a>
                </li>
              </ul>
            </li>

            <!-- Order Management -->
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                  <i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">Order Management</div>
              </a>
              <ul>
                <li> 
                  <a href="ecommerce-products-grid.html"><i class="bi bi-circle"></i>Manage All Order</a>
                </li>
              </ul>
            </li>


            <li class="menu-label">Vendor Management</li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Vendors</div>
              </a>
              <ul>
                <li> 
                  <a href="{{ route('vendor.create') }}">
                    <i class="bi bi-circle"></i>Add New Vendor
                  </a>
                </li>
                <li> 
                  <a href="{{ route('vendor.manage') }}">
                    <i class="bi bi-circle"></i>Manage All Vendors
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-label">Location Management</li>
            
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Manage Division</div>
              </a>
              <ul>
                <li> 
                  <a href="{{ route('division.create') }}"><i class="bi bi-circle"></i>Add New Division</a>
                </li>
                <li> 
                  <a href="{{ route('division.manage') }}">
                    <i class="bi bi-circle"></i>Manage All Division
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Manage District</div>
              </a>
              <ul>
                <li> 
                  <a href="{{ route('district.create') }}"><i class="bi bi-circle"></i>Add New District</a>
                </li>
                <li> 
                  <a href="{{ route('district.manage') }}">
                    <i class="bi bi-circle"></i>Manage All District
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-label">Platform Settings</li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Currency</div>
              </a>
              <ul>
                <li> 
                  <a href="app-emailbox.html"><i class="bi bi-circle"></i>Add New Currency</a>
                </li>
                <li> 
                  <a href="app-chat-box.html">
                    <i class="bi bi-circle"></i>Manage All Currency
                  </a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Shipping Methods</div>
              </a>
              <ul>
                <li> 
                  <a href="app-emailbox.html"><i class="bi bi-circle"></i>Add New Shipping</a>
                </li>
                <li> 
                  <a href="app-chat-box.html">
                    <i class="bi bi-circle"></i>Manage All Shipping
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-label">Customers Management</li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">All Customers</div>
              </a>
              <ul>
                <li> 
                  <a href="app-emailbox.html"><i class="bi bi-circle"></i>Add New Customer</a>
                </li>
                <li> 
                  <a href="app-chat-box.html">
                    <i class="bi bi-circle"></i>Manage All Customers
                  </a>
                </li>
              </ul>
            </li>    
            
            <li class="menu-label">Website Management</li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Settings</div>
              </a>
              <ul>
                <li> 
                  <a href="{{ route('settings.all') }}"><i class="bi bi-circle"></i>Global Settings</a>
                </li>
                <li> 
                  <a href="{{ route('settings.notice.manage') }}">
                    <i class="bi bi-circle"></i>Notice
                  </a>
                </li>
              </ul>
            </li> 
            
          </ul>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->