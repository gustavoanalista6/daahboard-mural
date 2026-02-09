<div class="table-responsive">
    <table class="table" id="informacaos-table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Icon</th>
                <th>Filial</th>
                <th>Habilitado</th>
                <th>Rota</th>
                <th>Url PDF</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($informacaos as $informacao)
            <tr>
                <td>{{ $informacao->title }}</td>
                <td>{{ $informacao->icon }}</td>
                <td>{{ $informacao->nome_filial }}</td>
                <td>{{ $informacao->enable == 1? 'sim': '' }}</td>
                <td>{{ $informacao->route }}</td>
                <td>{{ $informacao->url_pdf }}</td>
                <td>
                    {!! Form::open(['route' => ['informacaos.destroy', $informacao->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('informacaos.show', [$informacao->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('informacaos.edit', [$informacao->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>