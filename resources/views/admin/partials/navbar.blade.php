<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('admin.index')}}">
            <img src="assets/images/COUNTRY DEALERS LOGO AZ.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{route('admin.index')}}">
            <img src="assets/images/COUNTRY DEALERS LOGO AZ.svg" alt="logo" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    {{-- <img src="assets/images/COUNTRY DEALERS LOGO AZ.svg" alt="logo" /> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
                        <i class="fas fa-cog text-primary"></i>
                        Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" id="logoutBtn" style="cursor: pointer">
                        <i class="fas fa-power-off text-primary"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

@section('bottom-scripts')
<script>
    $('#logoutBtn').on('click' , function(){
        $('#logout-form').submit();
    })
</script>
@endsection
