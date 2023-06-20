
<div class="container-fluid background_color_default">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">
            <div class="row py-3">
                <div class="col">
                    <a href="{{ url('/control/panel/overview') }}" class="navbar-brand"><img src="{{ asset('/storage/images/default/logo.png') }}" height="30"></a>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="dropdown-toggle user_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent; border: 0;">
                                <div class="d-flex align-items-center" style="padding-right: 5px; border-top-right-radius: 15px; border-bottom-right-radius: 15px; border-top-left-radius: 15px; border-bottom-left-radius: 15px; box-shadow: 0 0 5px 0 #00ff8994;">
                                    <div class="flex-shrink-0">
                                        @if (auth()->guard('admin')->user()->avatar !== null)
                                            <img class="img-circle" src="{{ asset('/storage/' . auth()->guard('admin')->user()->avatar) }}" height="30" alt="User Image">
                                        @else
                                            <img class="img-circle" src="{{ asset('/storage/images/default/icons8-user-circle-30.png') }}" height="30" alt="User Image">
                                        @endif
                                    </div>
                                    <div class="flex-grow-1 text-white text-uppercase ms-1" style="font-size: 10px;">{{ auth()->guard('admin')->user()->name }}</div>
                                </div>
                            </button>
                            <ul class="dropdown-menu">
                                <li><h6 class="dropdown-header billing">Role: {{ auth()->guard('admin')->user()->role }}</h6></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item billing text-primary" href="{{ url('/control/panel/my-profile') }}">My Profile</a></li>
                                <li><a class="dropdown-item billing text-primary" href="{{ url('/control/panel/change-password') }}">Change Password</a></li>
                                <li><a class="dropdown-item billing text-primary" href="{{ url('/control/panel/sign-out') }}">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


