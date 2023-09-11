<header>


    <div class="container-fluid">
        <div class="row header-primary" style="background-color: #1c1c43;">

            <div class="col-sm-4">
                <div>
                    <a href="{{ route('welcome') }}"> <img class="header-img"
                            src="{{ asset('frontend/img/header_logo.png') }}" style="height: 120px; width: 140px"
                            alt="logo" class="my-2 mx-2 text-center">
                    </a>
                    {{-- <strong class="name">Area Rental</strong> --}}
                    {{-- <div class="mb-3" style="margin-left: 12px;" id="time"></div> --}}
                </div>

            </div>
            <div class="col-sm-8">
                <h1 class="header-h1"
                    style="font-size: 2.5rem; margin-top: 45px; font-weight: 700; color: REBECCAPURPLE;">
                    Welcome to Commercial Space
                </h1>
            </div>
        </div>
    </div>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        {{-- <a class="navbar-brand" href="{{ route('welcome') }}"></a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('house.all') }}">All Available Spaces</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
                </li>


                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    @if (Auth::user()->role_id == 2)
                        <li class="nav-item"><a class="nav-link" href="{{ route('landlord.dashboard') }}">Dashboard</a></li>
                    @endif
                    @if (Auth::user()->role_id == 3)
                        <li class="nav-item"><a class="nav-link" href="{{ route('renter.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('renter.view.wishlist') }}">Wishlist</a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="/chatify">Message</a></li>
                    @endif
                    @if (Auth::user()->role_id == 1)
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    @endif
                @endguest
            </ul>
        </div>
    </nav>


</header>

<script type="text/javascript">
    var date = new Date();
    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
        "November", "December"
    ];
    document.getElementById("time").innerHTML = '<strong>' + days[date.getDay()] + '</strong>' + ', ' + months[date
        .getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();
</script>
