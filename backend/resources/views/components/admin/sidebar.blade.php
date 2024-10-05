<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link"> <!--begin::Brand Image--> <img src="{{ asset( 'admin-assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">AdminLTE 4</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> 
                    <a href="{{route('admin.dashboard')}}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a href="{{route('admin.products')}}" class="nav-link"> <i class="nav-icon bi bi-tag"></i>
                        <p>Products</p>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a href="{{route('admin.orders')}}" class="nav-link"> <i class="nav-icon bi bi-cart"></i>
                        <p>Orders</p>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a href="{{route('admin.invoices')}}" class="nav-link"> <i class="nav-icon bi bi-file"></i>
                        <p>Invoices</p>
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a href="#" class="nav-link"> <i class="nav-icon bi bi-ui-checks-grid"></i>
                        <p>
                            Taxonomies
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a href="{{route('admin.taxonomies')}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                <p>All</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{route('admin.taxonomies', ['type' => 'categories'])}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                <p>Categories</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{route('admin.taxonomies', ['type' => 'brand'])}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                <p>Brand</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{route('admin.taxonomies', ['type' => 'supplier'])}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                <p>Seller/Supplier</p>
                            </a> 
                        </li>
                        
                    </ul>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> 