

<div class="product-item item {{ $product->tag}}">
    <div class="pi-pic">
        <img src="/front/img/products/{{ $product->productImages[0]->path ?? '' }}" alt="">
        @if($product->discount != null)
        <div class="sale">Sale</div>
        @endif


        <div class="icon">
        <i class="ti-heart"></i>
        </div>
        <ul>
            <li class="w-icon active"><a href=""><i class="icon_bag_alt"></i></a></li>
            <li class="quick-view"><a href="shop/product/{{ $product->id }}">+ Chi Tiết</a></li>
            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="catagory-name">{{$product->tag}}</div>
        <a href="shop/product/{{ $product->id }}">
            <h5>{{$product->name}}</h5>
        </a>
        <div class="product-price">

            @if ($product->discount != null)
        {{ $product->discount }}đ
            <span>{{ $product->price}}đ</span>

            @else
            <span>{{ $product->price}}đ</span>
            @endif
        </div>
    </div>
</div>





