<nav class="navbar navbar-expand gap-3 align-items-center">
    <div class="mobile-toggle-icon fs-3">
        <i class="bi bi-list"></i>
    </div>
    <div class="top-navbar-right ms-auto">
        <ul class="navbar-nav align-items-center">
            <li class="nav-item dropdown dropdown-user-setting">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                    <div class="user-setting d-flex align-items-center">
                        <img src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}" class="user-img"
                            alt="">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}" alt=""
                                    class="rounded-circle" width="54" height="54">
                                <div class="ms-3">
                                    <h6 class="mb-0 dropdown-user-name">{{ auth()->user()->username }}</h6>
                                    <small class="mb-0 dropdown-user-designation text-secondary">Halo!
                                        {{ auth()->user()->username }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-user-profile.html">
                            <div class="d-flex align-items-center">
                                <div class=""><i class="bi bi-person-fill"></i></div>
                                <div class="ms-3"><span>Profile</span></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item">
                                <i class="bi bi-lock-fill"></i> Logout
                            </button>
                        </form>

                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
