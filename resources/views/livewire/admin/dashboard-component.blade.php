
<!--Start Dashboard Content-->
<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true" >
    <div class="container-fluid py-1 px-3">
        {{-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav> --}}
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <ul class="navbar-nav  justify-content-end">


                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('images/logo.png')}}" alt="My Profile" title="My Profile" class="management-astudio-icon">
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); closest('form').submit();" class="text-reset text-decoration-none mb-3 d-block">
                                    <div class="row align-items-center m-0 w-100">
                                        <div class="col-4 p-0 w-100 text-center">
                                            <h6 class="font-weight-bolder mb-0 centered">Log out</h6>
                                        </div>
                                    </div>
                                </a>
                            </form>
                            <a href="{{route('admin.change.password')}}" class="text-reset text-decoration-none d-block">
                                <div class="row align-items-center m-0 w-100">
                                    <div class="col-4 p-0 w-100 text-center">
                                        <h6 class="font-weight-bolder mb-0 centered ">Change password</h6>
                                    </div>
                                </div>
                            </a>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
{{-- <div class="container-fluid py-4">
    <div class="row">

    </div>
</div> --}}

<!--End Dashboard Content-->
