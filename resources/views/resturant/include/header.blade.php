       <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{route('resturant.index')}}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="{{url('/')}}/site/assets/img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="{{route('resturant.index')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('services.index')}}" class="nav-item nav-link">Service</a>
                    <a href="{{route('about.index')}}" class="nav-item nav-link">About</a>
                    <a href="{{route('menuresturant.index')}}" class="nav-item nav-link">Menu</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{route('ourteam.index')}}" class="dropdown-item">Our Team</a>
                            <a href="{{route('testimonial.index')}}" class="dropdown-item">Testimonial</a>
                            @if(Auth::guard('customers')->check())
                                <a href="{{route('customer.statusbooking')}}" class="dropdown-item">StatusBookings</a>
                                <a href="" class="dropdown-item">My Orders</a>
                            @endif
                        </div>
                    </div>
                    @if(Auth::guard('customers')->check())
                        <a href="{{ route('customer.logout') }}" class="nav-item nav-link">LogOut</a>
                    @endif
                </div>
            </div>
            </nav>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                            @if(Auth::guard('customers')->check())
                                <a href="{{ route('booking_user.index') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
                                <a href="{{ route('order_user.index') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Order Online</a>
                            @else
                                <div role="alert" class="text-white">
                                    <p class="display-8">In order to book or order online, you must log in.</p>
                                    <a href="{{ route('login.form') }}" class="btn btn-primary py-2 px-4 animated slideInLeft">Login</a>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="{{url('/')}}/site/assets/img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->