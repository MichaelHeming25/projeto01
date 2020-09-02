<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav" id="nav">
                <li style="border-top: 1px solid #f5f5fa;"><a href="{{ route('index') }}" class="active"><i class="fas fa-home style"></i> <span>Dashboard</span></a></li>
                
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fas fa-user style"></i><span>Usúarios</span> <i class="icon-submenu fas fa-chevron-right" style="margin-left:1rem;"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ route('index.usuarios') }}" class="">Editar / Remover</a></li>
                            <li><a href="{{ route('cadastrar.usuarios') }}" class="">Cadastrar</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fas fa-user-friends style"></i><span>Clientes</span> <i class="icon-submenu fas fa-chevron-right" style="margin-left:1rem;"></i></a>
                    <div id="subPages2" class="collapse">
                        <ul class="nav">
                            <li><a href="{{ route('index.clientes') }}" class="">Editar / Remover</a></li>
                            <li><a href="{{ route('cadastrar.clientes') }}" class="">Cadastrar</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</div>