<div class="table-responsive">
    <table class="table" id="legislacaos-table">
        <thead>
            <tr>
                <th>Titulo</th>
        <th>Url PDF</th>
        <th>Ordem</th>
        <th>Filial</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($legislacaos as $legislacao)
            <tr>
                <td>{{ $legislacao->title }}</td>
            <td>{{ $legislacao->url }}</td>
            <td>{{ $legislacao->order }}</td>
            <td>{{ $legislacao->nome_filial }}</td>
                <td>
                    {!! Form::open(['route' => ['legislacaos.destroy', $legislacao->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('legislacaos.show', [$legislacao->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('legislacaos.edit', [$legislacao->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
