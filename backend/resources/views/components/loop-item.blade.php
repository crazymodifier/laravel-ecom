<div class="col-md-6 col-lg-6 col-xl-4">
    <div class="rounded position-relative fruite-item">
        <a href="{{route('product.show', ['name' => $item->slug])}}" class="text-dark">
            <div class="fruite-img">
                <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
            </div>
            @php
                $category = $item->terms()->where('tax_slug', 'categories')->pluck('name')->first();
            @endphp
            @if ($category)
            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$category}}</div>
            @endif
            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                <h4>{{$item->title}}</h4>
                <p>{{$item->title}}</p>
                <div class="d-flex justify-content-between flex-lg-wrap">
                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                </div>
            </div>
        </a>
    </div>
</div>