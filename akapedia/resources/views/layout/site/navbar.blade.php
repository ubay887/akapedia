<nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-center">
    <a class="navbar-brand" href="#">Akademi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('site.akademik') }}">Akademik <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('site.about') }}">About <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i
                        class="lnr lnr-question-circle"></i>
                    <span>Login</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    <form action="{{ route('site_login') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="password" class="form-control" id="">
                        </div>
                        <button class="btn btn-primary" type="submit">Login</button>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</nav>
