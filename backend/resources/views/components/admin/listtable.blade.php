<div class="card card-primary card-outline">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th width="{{ $column['width'] }}">{{ $column['label'] }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $item)
                    <tr>
                        @foreach ($columns as $column)
                            @if ($column['key'] === 'thumbnail')
                                <td><img src="{{ $item->{$column['key']} }}" width="50" height="50"></td>
                            @elseif ($column['key'] === 'action')
                                <td>
                                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            @else
                                <td>{{ $item->{$column['key']} }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                
            </tbody>
        </table>

        
    </div>
    <div class="card-footer">
        {{ $data->appends(request()->query())->links() }}
    </div>
</div>
