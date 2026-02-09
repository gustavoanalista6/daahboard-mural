<div class="table-responsive">
    <table class="table" id="detalhes-table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Filial</th>
                <th>Curso</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalhes as $detalhe)
            <tr>
                <td>{{ $detalhe->title }}</td>
                <td>{{ $detalhe->nome_filial }}</td>
                <td>{{ $detalhe->curso }}</td>
                <td>
                    {!! Form::open(['route' => ['detalhes.destroy', $detalhe->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detalhes.show', [$detalhe->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detalhes.edit', [$detalhe->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>