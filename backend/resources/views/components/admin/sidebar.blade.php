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
                {{-- <li class="nav-item"> 
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
                </li> --}}
                @php
                    
                    uasort($menus, function ($a, $b) {
                        return $a['order'] <=> $b['order'];
                    });
                @endphp
                @foreach ($menus as $key => $menu)
                    <li class="nav-item"> 

                        {{-- {{json_encode($menus)}} --}}
                        
                        @if (isset($menu['children']))
                            <a href="#" class="nav-link"> <i class="nav-icon bi bi-ui-checks-grid"></i>
                                <p>
                                    {{$menu['title']}}
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> 
                                    <a href="{{route("admin.{$key}")}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>All</p>
                                    </a> 
                                </li>
                                @foreach ( collect($menu['children']) as $key => $child)
                                <li class="nav-item"> 
                                    @php

                                        $slug = array_key_first($child);
                                        $child = reset($child);
                                    @endphp

                                    <a href="{{route('admin.taxonomies.show', ['type' =>$slug])}}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        
                                        <p>{{ $child['title']}}</p>
                                    </a> 
                                </li>
                                @endforeach
                                
                            </ul>
                        @else
                            <a href="{{ route("admin.{$key}") }}" class="nav-link"> <i class="nav-icon bi {{$menu['icon']}}"></i>
                                <p>
                                    {{$menu['title']}}
                                </p>
                            </a>
                        @endif
                    </li>
                @endforeach

                
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> 