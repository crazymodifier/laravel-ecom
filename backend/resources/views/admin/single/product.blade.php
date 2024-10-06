@extends('admin.layout')
@section('content')
    <x-admin.edit type="products" :sideMeta="$side_metas"/>
@endsection


@section('scripts')
    <script>
        jQuery(document).ready(function(){
            jQuery('.summernote').summernote({
                height: 400
            })
        })
    </script>
@endsection