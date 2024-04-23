<div class="navbarhome">
    <div class="containertest">
        <div class="logo">
            <h3>home</h3>
        </div>
        <div class="navhome">
            <ul>
                <li><a href="#">home</a></li>
                <li><a href="/buy">Buy</a></li>
                <li><a href="/rent">Rent</a></li>
                <li>
                    <a href="/props" class="nav-link dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Properties</a>
                    <ul class="dropdown arrow-top">
                        <li><a href="#">Condo</a></li>
                        <li><a href="#">Property Land</a></li>
                        <li><a href="#">Commercial Building</a></li>
                    </ul>
                </li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                <li class="">
                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link" href="/login">Login</a>
                        @endif
                        @if (Route::has('register'))
                            <a class="nav-link" href="/register">Register</a>
                        @endif
                    @else
                        <div class="dropdown">
                            <span class="nav-link dropdown-toggle" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </span>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profile">Profile</a>
                                <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                <div class="dropdown-divider"></div>
                                <a href="/logout" class="dropdown-item">Logout</a>


                            </div>
                        </div>

                    @endguest
                </li>
            </ul>
        </div>
    </div>
</div>
