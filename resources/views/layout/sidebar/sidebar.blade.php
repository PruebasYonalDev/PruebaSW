<!-- BEGIN: Main Menu-->

<div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
                <div class="main-menu-content">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


                        <!-- Inicio de Items de ejercicios -->
                        <li class=" navigation-header"><span data-i18n="Admin Panels">Ejercicios Software Web</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
                        </li>
                        <li class=" nav-item"><a href="{{ route('welcome') }}"><i class="la la-user"></i><span class="menu-title" data-i18n="eCommerce">Ejr 1: Login/Registro</span></a>
                        </li>
                        <li class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title" data-i18n="Travel &amp; Booking">Ejr 2: CRUD Productos</span></a>
                        <ul class="menu-content">
                                <li>
                                    <a class="menu-item" href="{{ route('product.index') }}"><i></i><span>Productos</span></a>
                                </li>
                                <li>
                                    <a class="menu-item" href="{{ route('category.index') }}"><i></i><span>Categorias</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class=" nav-item"><a href="{{ route('folder.index') }}"><i class="la la-folder"></i><span class="menu-title" data-i18n="Hospital">Ejr 3: Arbol de carpetas</span></a>
                        </li>
                        <li class=" nav-item"><a href="../crypto-menu-template"><i class="la la-file-text"></i><span class="menu-title" data-i18n="Crypto">Ejr 4: Archivos y correos</span></a>
                        <!-- Inicio de Items de ejercicios -->

                    </ul>
                </div>
            </div>

            <!-- END: Main Menu-->