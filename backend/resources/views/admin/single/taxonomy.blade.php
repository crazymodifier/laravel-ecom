@extends('admin.layout')

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
            <x-admin.listtable type="terms" taxonomy="{{$tax_data->slug}}" id="{{$tax_data->id}}"/>
        </div>
    </div>

@endsection