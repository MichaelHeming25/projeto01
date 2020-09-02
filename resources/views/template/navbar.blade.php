<nav class="navbar navbar-default navbar-fixed-top">

    <div class="logo-button">
        <div class="brand">
            <a href="{{ route('index') }}">
                <img src="{{ asset('logo_projeto.png') }}" alt="" srcset="">
            </a>
        </div>
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <div class="container-fluid">
        
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <ul class="dropdown-menu" style=" background-size:cover;background-position: top center;">
                        <div class="body-drop">
                            <div class="body1">
                                <span style="background: rgba(202, 250, 255, 0.19);color: rgb(38, 196, 214);border-radius: 0.5rem; padding: 0;margin-left: 1rem;width: 5rem;display: flex;align-items: center;height: 4rem;justify-content: center;font-size: 2rem;"><?PHP echo strtoupper(Auth::user()->name[0]) . substr(Auth::user()->name, strpos(' ', Auth::user()->name), 0) ?></span>
                                <span style="padding-left: 1rem;font-size:2rem;">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <div class="header">
                            <li><a href="{{ route('index.usuarios') }}"><i class="lnr lnr-user" style="padding-right:1rem;"></i> <span>My Profile</span><i class="icon-submenu fas fa-chevron-right" style="margin-left:1rem;"></i></a></li>
                            <li><a href="{{ route('index.usuarios') }}"><i class="lnr lnr-cog" style="padding-right:1rem;"></i> <span>Settings</span><i class="icon-submenu fas fa-chevron-right" style="margin-left:1rem;"></i></a></li>
                            <li><a href="{{ route('logout') }}"><i class="lnr lnr-exit" style="padding-right:1rem;"></i><span>Logout</span><i class="icon-submenu fas fa-chevron-right" style="margin-left:1rem;"></i></a></li>
                        </div>
                    </ul>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-submenu lnr lnr-chevron-down"></i>
                        <span>{{ Auth::user()->name }}</span>
                        <span style="background: rgba(202, 250, 255, 0.19);color: rgb(38, 196, 214);border-radius: 0.5rem; padding: 0;margin-right: 1rem;width: 4rem;display: flex;align-items: center;height: 3rem;justify-content: center;font-size: 2rem;">
                            <?PHP echo strtoupper(Auth::user()->name[0]) . substr(Auth::user()->name, strpos(' ', Auth::user()->name), 0) ?>
                        </span> 
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>
<script src="{{ asset('jquery.js') }}"></script>
<script src="{{ asset('dropdown.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.logo-button button').click(function (){
            $(this).toggleClass("active")
            // $(".lado-direito2").toggleClass("active")
        });
    });
</script>