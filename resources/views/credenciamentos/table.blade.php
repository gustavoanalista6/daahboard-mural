<div class="table-responsive">
    <table class="table" id="credenciamentos-table">
        <thead>
            <tr>
                <th>Url PDF</th>
        <th>Filial</th>
        <th>Titulo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($credenciamentos as $credenciamento)
            <tr>
                <td>{{ $credenciamento->url }}</td>
            <td>{{ $credenciamento->nome_filial }}</td>
            <td>{{ $credenciamento->title }}</td>
                <td>
                    {!! Form::open(['route' => ['credenciamentos.destroy', $credenciamento->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('credenciamentos.show', [$credenciamento->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('credenciamentos.edit', [$credenciamento->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
