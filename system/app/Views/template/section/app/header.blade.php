<header class="header">
                <nav class="navbar fixed-top">
                    <!-- Search Box-->
                    <div class="search-box">
                        <button class="dismiss"><i class="icon-close"></i></button>
                        <form id="searchForm" action="#" role="search">
                            <input type="search" placeholder="What are you looking for..." class="form-control">
                        </form>
                    </div>
                    <div class="container-fluid">
                        <div class="navbar-holder d-flex align-items-center justify-content-between">
                            <!-- Navbar Header-->
                            <div class="navbar-header">
                                <!-- Navbar Brand -->
                                <a href="index.html" class="navbar-brand">
                                    <div class="brand-text brand-big hidden-lg-down"><span>Teknik </span><strong> Informatika</strong></div>
                                    <div class="brand-text brand-small"><strong>IF</strong></div>
                                </a>
                                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                            </div>
                            <!-- Navbar Menu -->
                            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                                <!-- Search-->
                                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                                <li class="nav-item dropdown">
                                    <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                                        <i class="fa fa-user"></i>
                                        {{Auth::user()->nama}}
                                    </a>
                                    <ul aria-labelledby="notifications" class="dropdown-menu">
                                        <li>
                                            <a rel="nofollow" href="#" class="dropdown-item d-flex">
                                                <div class="msg-body">
                                                    <h3 class="h5">Setting</h3>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a rel="nofollow" href="#" class="dropdown-item d-flex">
                                                <div class="msg-body">
                                                    <h3 class="h5">Profile</h3>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a rel="nofollow" href="#" class="dropdown-item d-flex">
                                                <div class="msg-body">
                                                    <h3 class="h5">Logout</h3>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Logout    -->
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>