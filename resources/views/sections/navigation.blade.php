<!-- Navigation - select your nav color - dark-nav or white-nav -->
<nav id="navigation" class="white-nav relative-nav">
    <!-- Navigation -->
    <div class="navigation double-nav raleway">
        <!-- Navigation Inner -->
        <div class="nav-inner clearfix">

            <!-- Logo Area -->
            <div class="logo f-left">
                <!-- Logo Link -->
                <a href="#" class="logo-link scroll">
                    <!-- Logo Image / data-second-logo for only white nav -->
                    <img src="{{ asset('/images/logo/logo_dark_red.png') }}" data-second-logo='../../images/logo/logo_dark_red.png' alt="crexis_logo" />
                </a>
            </div>
            <!-- End Logo Area -->

            <!-- Mobile Menu Button -->
            <a class="mobile-nav-button"><i class="fa fa-bars"></i></a>

            <!-- Navigation Links -->
            <div class="nav-menu clearfix f-right">

                <!-- Nav List -->
                <ul class="nav uppercase normal">

                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>

                    <li>
                        <a href="{{ url('users') }}">Bloggers</a>
                    </li>

                    <li>
                        <a href="{{ url('article/create') }}"><i class="fa fa-plus"></i> Article</a>
                    </li>

                    <li class="dropdown-toggle nav-toggle"><a href="#" class="tahoma"><i class="fa fa-user"></i> My account</a>
                        <!-- DropDown Menu -->
                        <ul class="dropdown-menu pull-right clearfix">
                            @if(!Auth::user())
                                <li class="ml-20 mt-15 mr-20 mb-15 raleway mini-text gray">
                                    <form action="{{ url('auth/login') }}" method="post" class="search-form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="text" name="email" class="transparent uppercase" placeholder="Email">
                                        <input type="password" name="password" class="transparent uppercase" placeholder="Password">
                                        <input type="submit" value="Log In" class="btn-default" />
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ url('auth/register') }}" class="text-right"><i class="fa fa-user-plus"></i> Register</a>
                                </li>
                                <li>
                                    <a href="{{ url('auth/password') }}" class="text-right"><i class="fa fa-question"></i>forgot password</a>

                                </li>
                            @else
                                <li>
                                    <a href="{{ url('user/profile') }}"><i class="fa fa-gears"></i> Profile</a>
                                    <a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out"></i> Log Out</a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    <li class="dropdown-toggle nav-toggle"><a href="#" class="tahoma"><i class="fa fa-search"></i></a>
                        <!-- DropDown Menu -->
                        <ul class="dropdown-menu pull-right clearfix">
                            <li class="ml-20 mt-15 mr-20 mb-15 raleway mini-text gray">
                                <form method="post" class="search-form">

                                    <input type="text" name="search" id="search" class="transparent uppercase" placeholder="Search...">
                                    <button type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- End Nav List -->
            </div>
            <!-- End Navigation Links -->
        </div>
        <!-- End Navigation Inner -->

    </div>

</nav>
<!-- End Nav -->