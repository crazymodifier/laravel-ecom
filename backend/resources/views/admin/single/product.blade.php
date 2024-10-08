@extends('admin.layout')
@section('content')
    <x-admin.edit type="products" :content="$content"/>
@endsection


@section('scripts')
    <script>
        jQuery(document).ready(function(){
            jQuery('.summernote').summernote({
                height: 400
            })

            console.log('sd');
            
            let myDropzone = new Dropzone(".drop-media", { 
                url: "{{ route('admin.image.create') }}",
                init: function() {
                    this.on("addedfile", file => {
                    console.log(file);
                    });
                },
                thumbnailMethod:"contain",
                paramName: 'image',
                headers: {
                    'X-CSRF-TOKEN' : jQuery('meta[name="csrf-token"]').attr('content')
                },
                success : function(file, res){
                    console.log(res);
                    
                }
            });
        })


    </script>
@endsection