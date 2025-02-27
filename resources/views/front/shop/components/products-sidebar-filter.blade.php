<form action="{{ request()->segment(2) == 'product' ? 'shop' : ''}}">
    <div class="filter-widget">
        <h4 class="fw-title">Danh Mục</h4>
        <ul class="filter-catagories">

            @foreach($categories as $category)
            <li><a href="shop/category/{{ $category->name}}">{{ $category->name }}</a></li>
            @endforeach

        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Thương Hiệu</h4>
        <div class="fw-brand-check">

            @foreach($brands as $brand)
            <div class="bc-item">
                <label for="bc-{{ $brand->id }}">
                    {{ $brand->name }}
                    <input type="checkbox" {{ (request("brand")[$brand->id] ?? '') == 'on' ? 'checked' :''}} id="bc-{{ $brand->id }}" name="brand[{{ $brand->id }}]" onchange="this.form.submit();">

                    <span class="checkmark"></span>
                </label>
            </div>
            @endforeach
        </div>
    </div>
    <!-- <div class="filter-widget">
        <h4 class="fw-title">Giá</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount">
                    <input type="text" id="maxamount">
                </div>
                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="33" data-max="98">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>

                </div>

            </div>
        </div>
        <a href="#" class="filter-btn">Lọc Sản Phẩm</a>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Màu sắc</h4>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" id="cs-black">
                <label for="cs-black" class="cs-black">đen</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-violet">
                <label for="cs-violet" class="cs-violet">tím</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-blue">
                <label for="cs-blue" class="cs-blue">xanh</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-yellow">
                <label for="cs-yellow" class="cs-yellow">vàng</label>
            </div>
          
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="s-size">
                <label for="s-size">s</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="m-size">
                <label for="m-size">m</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="l-size">
                <label for="l-size">l</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="xs-size">
                <label for="xs-size">xs</label>
            </div>

        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Thẻ</h4>
        <div class="fw-tags">
            <a href="#">Mũ</a>
            <a href="#">Phụ Kiện</a>
            <a href="#">Quần Áo</a>
            <a href="#">Túi Xách</a>
          
        </div>
    </div> -->
    <div class="col-span-12 mt-5 ">
        <h3 class=" pb-2.5">
            <a href="" class="icon leading-10 uppercase text-black relative font-medium pl-3.5 text-xl no-underline">Thống kê lượt truy cập</a>
        </h3>
        <div class="grid grid-cols-12 p-2.5 h-[375px] rounded-lg" style="border: 5px solid #000000;">
            <div class="col-span-12">
                <div class="text-center text-4xl">
                    <h1 class="text-2xl grays">{{$tongluottruycap}}</h1>
                </div>
            </div>
            @if($homnay > 0)
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-user-30.png" alt="" class="w-[17px]">Hôm nay
                </div>
                <p class="" style="padding: 5px;text-align: right;">{{$homnay}}</p>
            </div>
            @else
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-user-30.png" alt="" class="w-[17px]">Hôm nay
                </div>
                <p class="" style="padding: 5px;text-align: right;">0</p>
            </div>
            @endif
            @if($homqua)
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-account-48.png " alt="" class="w-[17px]">Hôm qua
                </div>
                <p class="" style="padding: 5px;text-align: right;">{{$homqua}}</p>
            </div>
            @else
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-account-48.png " alt="" class="w-[17px]">Hôm qua
                </div>
                <p class="" style="padding: 5px;text-align: right;">0</p>
            </div>
            @endif
            @if($tuannay)
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-user-30.png" alt="" class="w-[17px]">Tuần này
                </div>
                <p class="" style="padding: 5px;text-align: right;">{{$tuannay}}</p>
            </div>
            @else
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-user-30.png" alt="" class="w-[17px]">Tuần này
                </div>
                <p class="" style="padding: 5px;text-align: right;">0</p>
            </div>
            @endif
            @if($thangnay)
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-account-48.png" alt="" class="w-[17px]">Tháng này
                </div>
                <p class="" style="padding: 5px;text-align: right;">{{$thangnay}}</p>
            </div>
            @else
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-account-48.png" alt="" class="w-[17px]">Tháng này
                </div>
                <p class="" style="padding: 5px;text-align: right;">0</p>
            </div>
            @endif
            @if($thangqua)
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-account-48.png" alt="" class="w-[17px]">Tháng qua
                </div>
                <p class="" style="padding: 5px;text-align: right;">{{$thangqua}}</p>
            </div>
            @else
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-account-48.png" alt="" class="w-[17px]">Tháng qua
                </div>
                <p class="" style="padding: 5px;text-align: right;">0</p>
            </div>
            @endif
            @if($tongluottruycap)
            <div class="col-span-12  flex place-content-around items-center">
                <div class="flex">
                    <img src="../images/icons8-combo-chart-48.png" alt="" class="w-[17px]">Tất cả
                </div>
                <p class="" style="padding: 5px;text-align: right;">{{$tongluottruycap}}</p>
            </div>
            @endif
        </div>
    </div>
</form>