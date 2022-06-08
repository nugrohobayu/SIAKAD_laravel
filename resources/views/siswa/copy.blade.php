  <nav class="navbar navbar-expand" style="background-color: #e3f2fd;">

    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle-collapsed" 
                data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1"
                aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/')}}">SIAKAD</a>
        </div>
        
   
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          <ul class="nav navbar-nav">
            
            {{-- <li class="nav-item ">
              <a class="nav-link" href="{{ url('/')}}">Beranda </a>
            </li> --}}
            
            @if (!empty($halaman) && $halaman == 'siswa')
            <li class="nav-item">
                <a class="nav-link" href="{{ url ('siswa')}}">Siswa <span class="sr-only">(current)</span></a>
            </li>
            @else
            <li><a href="{{ url ('siswa')}}"> Siswa </a></li>
            @endif
    
    
            @if (!empty($halaman) && $halaman == 'about')
            <li class="nav-item">
                <a class="nav-link" href="{{ url ('about')}}">About <span class="sr-only">(current)</span></a>
            </li>
            @else
            <li><a href="{{ url ('about')}}"> About </a></li>
            @endif
    
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Akun
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Buat</a>
                <a class="dropdown-item" href="#">Edit</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Keluar</a>
              </div>
            </li>
          </ul>
    
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div> <!--navbar collapse -->

    </div> <!--navbar fluid -->

</nav>