         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
                <!-- sidebar -->
                <div class="sidebar">
                   <!-- sidebar menu -->
                   <ul class="sidebar-menu">
                      <li class="active">
                         <a href="{{url('/admin/dashboard')}}"><i class="fa fa-tachometer"></i><span>Panel Principal</span>
                         <span class="pull-right-container">
                         </span>
                         </a>
                      </li>
                     <!-- <li class="">
                        <a href="{{url('/admin/banners')}}"><i class="fa fa-image"></i><span>Banners</span>
                        <span class="pull-right-container">
                        </span>
                        </a>
                     </li> -->
                      <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i><span>Categorias</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('admin/add-category')}}">Agregar Categorias</a></li>
                        <li><a href="{{url('admin/view-categories')}}">Ver Categorias</a></li>
                        </ul>
                     </li>
                      <li class="treeview">
                         <a href="#">
                         <i class="fa fa-product-hunt"></i><span>Productos</span>
                         <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                         </span>
                         </a>
                         <ul class="treeview-menu">
                            <li><a href="{{url('admin/add-product')}}">Agregar Productos</a></li>
                         <li><a href="{{url('admin/view-products')}}">Ver Productos</a></li>
                         </ul>
                      </li>
                      <li class="treeview">
                        <a href="#">
                        <i class="fa fa-gift"></i><span>Cupones</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('admin/add-coupon')}}">Agregar Cupones</a></li>
                        <li><a href="{{url('admin/view-coupons')}}">Ver Cupones</a></li>
                        </ul>
                     </li>
                       <li class="treeview">
                           <a href="#">
                               <i class="fa fa-gift"></i><span>Banners</span>
                               <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                         </span>
                           </a>
                           <ul class="treeview-menu">
                               <li><a href="{{url('admin/add-banner')}}">Agregar Banner</a></li>
                               <li><a href="{{url('admin/view-banners')}}">Ver Banner</a></li>
                           </ul>
                       </li>
                     <li class="treeview">
                        <a href="{{url('admin/orders')}}">
                        <i class="pe-7s-cart"></i><span>Ordenes</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>

                     </li>

                     <li class="treeview">
                        <a href="{{url('admin/cities')}}">
                        <i class="fa fa-location-arrow"></i><span>Ciudades</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>

                     </li>
                       <li class="treeview">
                        <a href="{{url('admin/sellers')}}">
                        <i class="pe-7s-user"></i><span>Vendedores</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                           <ul class="treeview-menu">
                               <li><a href="{{url('admin/add_vendor')}}">Agregar vendedor</a></li>
                               <li><a href="{{url('admin/view-coupons')}}">Ver vendedor</a></li>
                           </ul>
                     </li>

                       <li class="treeview">
                           <a href="{{url('admin/sellers')}}">
                               <i class="pe-7s-user"></i><span>Usuarios</span>
                               <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                           </a>
                           <ul class="treeview-menu">
                               <li><a href="{{url('admin/view-users')}}">Ver Usuarios</a></li>
                           </ul>
                       </li>

                     <li class="treeview">
                        <a href="{{url('admin/admins')}}">
                        <i class="pe-7s-cart"></i><span>Administradores</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                         <ul class="treeview-menu">
                             <li><a href="{{url('admin/add-admin')}}">Agregar administradores</a></li>
                             <li><a href="{{url('admin/view-admins')}}">Ver administradores</a></li>
                         </ul>
                     </li>


                   </ul>
                </div>
                <!-- /.sidebar -->
             </aside>
             <!-- =============================================== -->
