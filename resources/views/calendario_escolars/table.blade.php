<div class="table-responsive">
    <table class="table" id="calendarioEscolars-table">
        <thead>
            <tr>
                <th>Url PDF</th>
        <th>Filial</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($calendarioEscolars as $calendarioEscolar)
            <tr>
                <td>{{ $calendarioEscolar->url }}</td>
            <td>{{ $calendarioEscolar->nome_filial }}</td>
                <td>
                    {!! Form::open(['route' => ['calendarioEscolars.destroy', $calendarioEscolar->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('calendarioEscolars.show', [$calendarioEscolar->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('calendarioEscolars.edit', [$calendarioEscolar->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
