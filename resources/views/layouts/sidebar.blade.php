<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <span class="nav-icon bx bxs-dashboard"></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="has-child {{ request()->is('admin/category*') ? 'open' : '' }}">
                    <a href="#" class>
                        <span class="nav-icon uil uil-package "></span>
                        <span class="menu-text">Category</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="{{ request()->is('admin/category/main-category') ? 'active' : '' }}">
                            <a href="{{ url('admin/category/main-category') }}">Main Category</a>
                        </li>
                        <li class="{{ request()->is('admin/category/sub-category') ? 'active' : '' }}">
                            <a href="{{ url('admin/category/sub-category') }}">Sub Category</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/property/size') ? 'active' : '' }}">
                    <a href="{{ url('admin/property/size') }}"
                        class="{{ request()->is('admin/property/size') ? 'active' : '' }}">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Size</span>
                    </a>
                </li>
                <li class="has-child {{ request()->is('admin/products*') ? 'open' : '' }}">
                    <a href="#" class>
                        <span class=" nav-icon bx bxl-product-hunt"></span>
                        <span class="menu-text">Products</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="{{ request()->is('admin/products/add-product') ? 'active' : '' }}">
                            <a href="{{ url('admin/products/add-product') }}"><span
                                    class=" nav-icon bx bx-add-to-queue"></span>Add Product</a>
                        </li>
                        <li class="{{ request()->is('admin/products/view-product') ? 'active' : '' }}">
                            <a href="{{ url('admin/products/view-product') }}"><span
                                    class=" nav-icon bx bx-show-alt"></span>View Products</a>
                        </li>
                    </ul>
                </li>
                <li class="has-child {{ request()->is('admin/orders*') ? 'open' : '' }}">
                    <a href="#" class>
                        <span class="nav-icon bi bi-box-seam"></span>
                        <span class="menu-text">Orders</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="{{ request()->is('admin/orders') ? 'active' : '' }}">
                            <a href="{{ url('admin/orders') }}"><span class=" nav-icon bx bx-show-alt"></span>View
                                Orders</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/faq') ? 'active' : '' }}">
                    <a href="{{ url('admin/faq') }}" class="{{ request()->is('admin/faq') ? 'active' : '' }}">
                        <span class="nav-icon uil uil-question-circle"></span>
                        <span class="menu-text">FAQ's</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/blogs') ? 'active' : '' }}">
                    <a href="{{ url('admin/blogs') }}" class="{{ request()->is('admin/blogs') ? 'active' : '' }}">
                        <span class="nav-icon uil uil-blogger"></span>
                        <span class="menu-text">Blogs</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/contact') ? 'active' : '' }}">
                    <a href="{{ url('admin/contact') }}" class="{{ request()->is('admin/contact') ? 'active' : '' }}">
                        <span class="nav-icon bx bxs-contact"></span>
                        <span class="menu-text">Contact</span>
                    </a>
                </li>
                <li class="has-child {{ request()->is('admin/setting*') ? 'open' : '' }}">
                    <a href="#" class>
                        <span class="nav-icon bx bx-cog"></span>
                        <span class="menu-text">Settings</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class>
                            <a href="#">App Settings</a>
                        </li>
                        <li class ="{{ request()->is('admin/setting/province') ? 'active' : '' }}">
                            <a href="{{ url('admin/setting/province') }}">Province</a>
                        </li>
                        <li class ="{{ request()->is('admin/setting/city') ? 'active' : '' }}">
                            <a href="{{ url('admin/setting/city') }}">City</a>
                        </li>
                        <li class="{{ request()->is('admin/setting/area') ? 'active' : '' }}">
                            <a href="{{ url('admin/setting/area') }}">Area</a>
                        </li>
                        <li class="{{ request()->is('admin/setting/delivery-price') ? 'active' : '' }}">
                            <a href="{{ url('admin/setting/delivery-price') }}">Delivery Price</a>
                        </li>
                    </ul>
                </li>
                <li class>
                    <a href="sign-up.html">
                        <span class="nav-icon uil uil-sign-out-alt"></span>
                        <span class="menu-text">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
