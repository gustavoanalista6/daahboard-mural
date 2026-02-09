<div class="table-responsive">
    <table class="table" id="mapaSalas-table">
        <thead>
            <tr>
                <th>Titulo</th>
        <th>Url Pdf</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mapaSalas as $mapaSala)
            <tr>
                <td>{{ $mapaSala->titulo }}</td>
            <td>{{ $mapaSala->url_pdf }}</td>
                <td>
                    {!! Form::open(['route' => ['mapaSalas.destroy', $mapaSala->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('mapaSalas.show', [$mapaSala->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('mapaSalas.edit', [$mapaSala->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
