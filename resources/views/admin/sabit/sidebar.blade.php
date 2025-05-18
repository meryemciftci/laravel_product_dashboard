<div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{url('/dashboard')}}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                
                          
                            @if(Auth::user()->can('banner.menu'))
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Banner</span>
                                </a>
                                @if(Auth::user()->can('banner.duzenle'))
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('banner')}}">Banner Düzenle</a></li>
                                </ul>
                                @endif
                            </li>
                            @endif

 
                            @if(Auth::user()->can('hak.menu'))
                             <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Hakkımızda</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                @if(Auth::user()->can('hak.duzenle'))
                                    <li><a href="{{route('hakkimizda')}}">Hakkımızda Düzenle</a></li>
                                @endif    
                                @if(Auth::user()->can('hak.coklu.ekle'))
                                    <li><a href="{{route('coklu.resim')}}">Çoklu Resim Ekle</a></li>
                                @endif
                                @if(Auth::user()->can('hak.coklu.liste'))
                                    <li><a href="{{route('coklu.liste')}}">Çoklu Resimler</a></li>
                                @endif
                                </ul>
                            </li>
                            @endif

                            @if(Auth::user()->can('kategori.menu'))
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Kategoriler</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">

                                    <li>
                                    @if(Auth::user()->can('kategori.liste'))
                                            <li><a href="{{route('kategori.hepsi')}}">Hepsi</a></li>
                                            @endif
                                            @if(Auth::user()->can('kategori.ekle'))        
                                            <li><a href="{{route('kategori.ekle')}}">Kategori Ekle</a></li>
                                            @endif
                                    </li>
                                </ul>
                            </li>
                            @endif
                            
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Alt Kategoriler</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">

                                    <li>
                                            <li><a href="{{route('altkategori.liste')}}">Liste</a></li>
                                            <li><a href="{{route('altkategori.ekle')}}">Alt Kategori Ekle</a></li>
                                    </li>
                                </ul>
                            </li>
                            <li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Ürünler</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">

                                    <li>
                                            <li><a href="{{route('urun.liste')}}">Liste</a></li>
                                            <li><a href="{{route('urun.ekle')}}">Ürün Ekle</a></li>
                                    </li>
                                </ul>
                            </li>
                            <li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Süreçler</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">

                                    <li>
                                            <li><a href="{{route('surec.liste')}}">Liste</a></li>
                                            <li><a href="{{route('surec.ekle')}}">Süreç Ekle</a></li>
                                    </li>
                                </ul>
                            </li>
                            <li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Yorumlar</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">

                                    <li>
                                            <li><a href="{{route('yorum.liste')}}">Liste</a></li>
                                            <li><a href="{{route('yorum.ekle')}}">Yorum Ekle</a></li>
                                    </li>
                                </ul>
                            </li>
                            <li>


                                
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Seo Ayarları</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">

                                    <li>
                                            <li><a href="{{route('seo.duzenle')}}">Güncelle</a></li>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                

                         
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Roller ve İzinler</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">

                                    <li>
                                            <li><a href="{{route('izin.liste')}}">İzinler Liste</a></li>
                                            <li><a href="{{route('rol.liste')}}">Roller Liste</a></li>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Yetkiler</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                            <li><a href="{{route('rol.yetki.liste')}}">Role Yetki Liste</a></li>
                                            <li><a href="{{route('rol.izin.verme')}}">Role Yetki Ver</a></li>
                                            
                                    </li>
                                </ul>
                            </li>
                    

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Kullanıcılar</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">

                                    <li>
                                            <li><a href="{{route('kullanici.liste')}}">Kullanıcı Liste</a></li>
                                    </li>
                                </ul>
                            </li>
                            

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Layouts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                            <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                            <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                            <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                            <li><a href="layouts-preloader.html">Preloader</a></li>
                                            <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                            <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                                            <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                                            <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                                            <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>







                            <li class="menu-title">Pages</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Authentication</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="auth-login.html">Login</a></li>
                                    <li><a href="auth-register.html">Register</a></li>
                                    <li><a href="auth-recoverpw.html">Recover Password</a></li>
                                    <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-profile-line"></i>
                                    <span>Utility</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html">Starter Page</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>