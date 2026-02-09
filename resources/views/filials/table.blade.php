<div class="table-responsive">
    <table class="table" id="filials-table">
        <thead>
            <tr>
                <th>Nome Filial</th>
        
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($filials as $filial)
            <tr>
                <td>{{ $filial->nome_filial }}</td>
        
                <td>
                    {!! Form::open(['route' => ['filials.destroy', $filial->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('filials.show', [$filial->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('filials.edit', [$filial->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
