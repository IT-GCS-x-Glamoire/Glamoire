<div id="main" class='layout-navbar'>
    <header class='mb-2'>
        <nav class="navbar navbar-expand navbar-light ">
            <div class="container-fluid">
                <a href="#" class="burger-btn d-block">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    </ul>
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false"
                            style="text-decoration: none;">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600  text-capitalize">{{ Auth::user()->role }}</h6>
                                    <!-- Displaying the user's role -->
                                    <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->name }}</p>
                                    <!-- Displaying the user's name -->
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="{{ asset('assets/images/faces/2.jpg') }}">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Hello, John!</h6>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                    Settings</a></li>                        
                                <hr class="dropdown-divider">
                            </li>                            

                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>
