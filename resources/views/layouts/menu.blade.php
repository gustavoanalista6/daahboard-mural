
<li class="{{ Request::is('filials*') ? 'active' : '' }}">
    <a href="{{ route('filials.index') }}"><i class="fa far fa-map-marked-alt"></i><span style="margin-left:15px;">Filial</span></a>
</li>



<li class="{{ Request::is('cursos*') ? 'active' : '' }}">
    <a href="{{ route('cursos.index') }}"><i class="fa far fa-graduation-cap"></i><span style="margin-left:15px;">Curso</span></a>
</li>

<li class="{{ Request::is('detalhes*') ? 'active' : '' }}">
    <a href="{{ route('detalhes.index') }}"><i class="fa far fa-chalkboard-teacher"></i><span style="margin-left:15px;">Detalhes Curso</span></a>
</li>


<br>

<li class="nav-item" style="color: #b8c7ce; padding-left: 10px"><h4>Informações</h4></li>

<li class="{{ Request::is('calendarioEscolars*') ? 'active' : '' }}">
    <a href="{{ route('calendarioEscolars.index') }}"><i class="fa far fa-calendar-alt"></i><span style="margin-left:15px;">Calendário Escolar</span></a>
</li>

<li class="{{ Request::is('credenciamentos*') ? 'active' : '' }}">
    <a href="{{ route('credenciamentos.index') }}"><i class="fa fas fa-id-card"></i><span style="margin-left:15px;">Credenciamentos</span></a>
</li>

<li class="{{ Request::is('dirigentes*') ? 'active' : '' }}">
    <a href="{{ route('dirigentes.index') }}"><i class="fa fas fa-user-tie"></i><span style="margin-left:15px;">Dirigentes</span></a>
</li>

<li class="{{ Request::is('legislacaos*') ? 'active' : '' }}">
    <a href="{{ route('legislacaos.index') }}"><i class="nav-icon fas fas fa-gavel"></i><span style="margin-left:20px;">Legislação</span></a>
</li>


<li class="{{ Request::is('servicos*') ? 'active' : '' }}">
    <a href="{{ route('servicos.index') }}"><i class="nav-icon fas fa-user-circle"></i><span style="margin-left:20px;">Serviços</span></a>
</li>


<li class="{{ Request::is('mapaSalas*') ? 'active' : '' }}">
    <a href="{{ route('mapaSalas.index') }}"><i class="fa fa-edit"></i><span style="margin-left:15px;">Mapa Salas</span></a>
</li>

<li class="{{ Request::is('informacaos*') ? 'active' : '' }}">
    <a href="{{ route('informacaos.index') }}"><i class="fa fa-info-circle"></i><span style="margin-left:15px;">Outras Informações</span></a>
</li>

<br>
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="nav-icon fas fa-user-circle"></i><span style="margin-left:15px;">Gestão Usuários</span></a>
</li>


<li class="nav-item" >
    <a href="#" class="nav-link"  
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display:flex; width:100%; align-items:center; margin-bottom:0px">
        <i class="nav-icon fas fa-sign-out-alt" ></i>
        <p style="margin-left:15px; margin-bottom:0px">Sair</p>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>

