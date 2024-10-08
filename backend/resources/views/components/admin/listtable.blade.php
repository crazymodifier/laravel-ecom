<div class="card card-primary card-outline">
    <div class="card-body p-0">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th width="{{ $column['width'] }}">{{ $column['label'] }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($content as $item)
                {{-- {{json_encode($item)}} --}}
                    <tr>
                        @foreach ($columns as $column)
                            @if ($column['key'] === 'thumbnail')
                                <td><img src="{{ $item->{$column['key']} }}" width="50" height="50"></td>
                            @elseif ($column['key'] === 'action')
                                <td>
                                    <a href="{{ route( "admin.{$type}.edit",['id'=>$item->id] ) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            @elseif ($column['key'] === 'categories')
                                @php
                                    $categories = $item->terms()->where('tax_slug', 'categories')->pluck('name','term_id')->all();
                                @endphp

                                <td>
                                @if ($categories)
                                    @foreach ($categories as $cat)
                                        <span class="badge rounded-pill text-bg-primary">{{$cat}}</span>
                                    @endforeach
                                    @endif
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
        {{ $content->appends(request()->query())->links() }}
    </div>
</div>
