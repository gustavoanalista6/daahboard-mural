<div class="table-responsive">
    <table class="table" id="cursos-table">
        <thead>
            <tr>
                <th>Filial</th>
        <th>Icon</th>
        <th>Categoria</th>
        <th>Subtitulo</th>
        <th>Titulo</th>
        <th>Rota</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->nome_filial }}</td>
            <td>{{ $curso->icon }}</td>
            <td>{{ $curso->category }}</td>
            <td>{{ $curso->subtitle }}</td>
            <td>{{ $curso->title }}</td>
            <td>{{ $curso->route }}</td>
                <td>
                    {!! Form::open(['route' => ['cursos.destroy', $curso->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cursos.show', [$curso->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('cursos.edit', [$curso->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
