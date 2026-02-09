<div class="table-responsive">
    <table class="table" id="dirigentes-table">
        <thead>
            <tr>
                <th>Cargo</th>
                <th>Nome</th>
                <th>Ordem</th>
                <th>Filial</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dirigentes as $dirigente)
            <tr>
                <td>{{ $dirigente->position }}</td>
                <td>{{ $dirigente->name }}</td>
                <td>{{ $dirigente->order }}</td>
                <td>{{ $dirigente->nome_filial }}</td>
                <td>
                    {!! Form::open(['route' => ['dirigentes.destroy', $dirigente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('dirigentes.show', [$dirigente->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('dirigentes.edit', [$dirigente->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>