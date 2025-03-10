@extends('admin.layout.master')
@section('title', 'Product')

@section('body')

<!-- Main -->
<div class="app-main__inner">

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Sản phẩm
                    <div class="page-title-subheading">
                        <!-- View, create, update, delete and manage. -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form method="post" action="./admin/product" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative row form-group">
                            <label for="brand_id" class="col-md-3 text-md-right col-form-label">Thương hiệu</label>
                            <div class="col-md-9 col-xl-8">
                                <select required name="brand_id" id="brand_id" class="form-control">
                                    <option value="">-- Thương hiệu --</option>

                                    @foreach($brands as $brand)
                                    <option value={{$brand->id }}>
                                        {{$brand->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="product_category_id" class="col-md-3 text-md-right col-form-label">Danh mục</label>
                            <div class="col-md-9 col-xl-8">
                                <select required name="product_category_id" id="product_category_id" class="form-control">
                                    <option value="">-- Danh mục --</option>
                                    @foreach($productCategories as $prdCate)
                                    <option value={{$prdCate->id }}>
                                        {{$prdCate->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="name" id="name" placeholder="Nhập tên sản phẩm" type="text" class="form-control" value="">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="content" class="col-md-3 text-md-right col-form-label">Nội dung</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="content" id="content" placeholder="Nhập nội dung sản phẩm" type="text" class="form-control" value="">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="price" class="col-md-3 text-md-right col-form-label">Giá</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="price" id="price" placeholder="Giá sản phẩm " type="text" class="form-control" value="">
                            </div>
                        </div>
                       

                        <div class="position-relative row form-group">
                            <label for="discount" class="col-md-3 text-md-right col-form-label">Giảm giá</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="discount" id="discount" placeholder="Giảm giá" type="text" class="form-control" value="">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="weight" class="col-md-3 text-md-right col-form-label">Trọng lượng</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="weight" id="weight" placeholder="Kg" type="text" class="form-control" value="">
                            </div>
                        </div>


                        <div class="position-relative row form-group">
                            <label for="featured" class="col-md-3 text-md-right col-form-label">Nổi bật</label>
                            <div class="col-md-9 col-xl-8">
                                <div class="position-relative form-check pt-sm-2">
                                    <input name="featured" id="featured" type="checkbox" value="1" class="form-check-input">
                                    <label for="featured" class="form-check-label">Nổi bật</label>
                                </div>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description" class="col-md-3 text-md-right col-form-label">Miêu tả sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <textarea class="form-control" name="description" id="description" placeholder="Về sản phẩm"></textarea>
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="#" class="border-0 btn btn-outline-danger mr-1">
                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                        <i class="fa fa-times fa-w-20"></i>
                                    </span>
                                    <span>Hủy</span>
                                </a>

                                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-download fa-w-20"></i>
                                    </span>
                                    <span>Lưu</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection

<!--  CK Editor -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        CKEDITOR.replace('description');
    });
</script>