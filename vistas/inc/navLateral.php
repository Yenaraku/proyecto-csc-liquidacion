<nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Account)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <div class="sidenav-menu-heading d-sm-none">Account</div>
                            <!-- Sidenav Link (Alerts)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                                Alerts
                                <span class="badge badge-warning-soft text-warning ml-auto">4 New!</span>
                            </a>

                            <!-- Sidenav Menu Heading (Core)-->
                            <div class="sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="#">
                                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                                Tablero
                            </a>
                            <div class="sidenav-menu-heading">Gestion</div>
                            <a class="nav-link" href="charts.html">
                                <div class="nav-link-icon"><i data-feather="box"></i></div>
                                Compras
                            </a>
                            <!-- Sidenav Link (Tables)-->
                            <a class="nav-link" href="#">
                                <div class="nav-link-icon"><i data-feather="truck"></i></div>
                                Procesado
                            </a>
                            <a class="nav-link" href="#">
                                <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                                Cuentas de Cobro
                            </a>
                            
                            <!-- Sidenav Heading (Addons)-->
                            <div class="sidenav-menu-heading">Administrativos</div>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseUsuario" aria-expanded="false" aria-controls="collapseDashboards">
                                <div class="nav-link-icon"><i data-feather="users"></i></div>
                                Usuarios
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUsuario" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                    <a class="nav-link" href="<?php echo SERVERURL; ?>usuario">
                                        Usuarios
                                    </a>
                                    <a class="nav-link" href="<?php echo SERVERURL; ?>usuariotipo">
                                        Tipo Usuario
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseParametro" aria-expanded="false" aria-controls="collapseDashboards">
                                <div class="nav-link-icon"><i data-feather="tool"></i></div>
                                Parametros
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseParametro" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                    <a class="nav-link" href="<?php echo SERVERURL; ?>parametros">
                                        Parametros
                                    </a>
                                    <a class="nav-link" href="<?php echo SERVERURL; ?>tipoanimal">
                                        Tipo Animal
                                    </a>
                                    <a class="nav-link" href="<?php echo SERVERURL; ?>PlantaProceso">
                                        Planta Sacrificio
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?php echo SERVERURL; ?>tercero">
                                <div class="nav-link-icon"><i data-feather="home"></i></div>
                                Terceros
                            </a>
                            <a class="nav-link" href="<?php echo SERVERURL; ?>producto">
                                <div class="nav-link-icon"><i data-feather="gift"></i></div>
                                Productos
                            </a>
                            
                        </div>
                    </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content d-flex flex-row">
                            <div id="logo-principal">
                                <img src="<?php echo SERVERURL; ?>vistas/assets/img/logo/Logo-Carnes-Santacruz-1.png" alt="" width="70" height="70" style="margin-right: 10px;">
                            </div>
                            <div class="border-left" style="padding-left: 10px;">
                                <div class="sidenav-footer-subtitle">December 29, 2020</div>
                                <div class="sidenav-footer-title">Viviana Berdugo</div>
                                <div class="sidenav-footer-subtitle">Usuario: vivi</div>
                            </div>
                            
                        </div>
                    </div>
                </nav>