<form action="{{ route("admin.{$type}.{$action}" , ['id' => $content->id]) }}" method="post" class="needs-validation @if($errors->any()) was-validated @endif">
    @csrf
    <div class="row">
        <div class="col-lg-9">
            <div class="mb-3 from-group has-validation">
                <label for="title" class="form-label"><b>Title</b></label>
                {{
                    html()
                    ->text()
                    ->name('title')
                    ->value(old('title', $content->title))
                    ->class(['form-control', 'form-control-lg', $errors->has('title')? 'is-invalid':''])
                    ->attributes(
                        [
                            'required',
                            'min' => '10'
                        ]
                    )
                }}
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 from-group has-validation">
                <label for="title" class="form-label"><b>Slug</b></label>
                {{
                    html()
                    ->text()
                    ->name('slug')
                    ->value(old('slug', $content->title))
                    ->class(['form-control', 'form-control-lg', $errors->has('slug')? 'is-invalid':''])
                    ->attributes(
                        [
                            'required',
                        ]
                    )
                }}
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ 
                    html()
                    ->textarea()
                    ->name('content')
                    ->value(old('content',$content->content))
                    ->class(['summernote']) 
                }}
            </div>
            {{-- <x-admin.cards.metabox /> --}}
        </div>
        <div class="col-lg-3">
            
            <div class="meta-box side mb-3">
                <div class="card card-primary card-outline">
                    <div class="card-header p-2">
                        <h4 class="card-title"><strong>Publishing</strong></h4>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary btn-sm">Publish</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="meta-box side mb-3">
                <div class="card card-primary card-outline">
                    <div class="card-header p-2">
                        <h4 class="card-title"><strong>Featured Image</strong></h4>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 from-group has-validation dropzone">
                            <div class="drop-media">
                                <div class="dz-message needsclick">
                                    Drag & Drop files here or click to upload
                                </div>
                            </div>
                            
                            {{-- <input type="file" name="" class="drop-media"> --}}
                            {{-- <label for="title" class="form-label"><b>Category</b></label>
                            {{
                                html()
                                ->select()
                                ->multiple()
                                ->name("taxonomies[categories][]")
                                ->value(old("taxonomies[categories]"))
                                ->class(['form-control', $errors->has('title')? 'is-invalid':''])
                                ->options([
                                    '1' => 'et',
                                    '4' => 'quam',
                                ])
                            }} --}}
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .metawith-fixed-height{
                    max-height: 200px;
                    overflow-y: auto
                }
            </style>
            @php
                $oldterms = $content->terms()->pluck('term_id')->all();
            @endphp
            @foreach ($taxonomies as $taxonomy)
            <div class="meta-box side mb-3">
                <div class="card card-primary card-outline">
                    <div class="card-header p-2">
                        <h4 class="card-title"><strong>Product {{ucfirst($taxonomy->name)}}</strong></h4>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> </div>
                    </div>
                    <div class="card-body">
                        
                            <div class="metawith-fixed-height">
                                
                                @foreach ($taxonomy->terms()->get() as $term)
                                    <div class="mb-2 from-group has-validation">
                                    {{
                                        html()
                                            ->checkbox("taxonomies[{$taxonomy->slug}][]" , in_array( $term->id, $oldterms ), old("taxonomies[{$taxonomy->slug}][]"))
                                            ->attributes(['id' => "taxonomies[{$taxonomy->slug}][{$term->id}]"])
                                            ->value($term->id)
                                            ->class(['form-check-input'])

                                    }}
                                    {{
                                        html()
                                            ->label($term->name,"taxonomies[{$taxonomy->slug}][{$term->id}]")

                                    }}
                                    </div>
                                @endforeach
                                
                            </div>
                    </div>
                </div>
            </div>
            @endforeach

            
        </div>
    </div>
</form>

{{-- {{$content->terms('categories')->get()}} --}}