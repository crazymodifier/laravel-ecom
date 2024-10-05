@extends('admin.layout')

@section('admin-hero')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">{{ucfirst($type)}}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

@endsection

@section('content')
    
    <div class="row">
        <div class="col-lg-3">
            <div class="bg-light">
                <div class="card-header">
                    <h3 class="card-title">
                        Create New
                    </h3>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">Thumbnail</th>
                                <th >Name</th>
                                <th width="25%">Slug</th>
                                <th width="10%">Parent</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($terms as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td><img src="{{$item->thumbnail}}" width="50" height="50"></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->slug}}</td>
                                    <td>{{$item->parent}}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                    
                </div>
                <div class="card-footer">
                    {{ $terms->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection