@extends('admin.layout.master')
@section('title', 'User')

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
                   Người dùng
                    <div class="page-title-subheading">
                        Chi tiết tài khoản
                    </div>
                </div>
            </div>

        </div>
    </div>

    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a href="./admin/user/{{ $user->id }}/edit" class="nav-link">
                <span class="btn-icon-wrapper pr-2 opacity-8">
                    <i class="fa fa-edit fa-w-20"></i>
                </span>
                <span>Sửa</span>
            </a>
        </li>

        <li class="nav-item delete">
            <form action="" method="post">
                <button class="nav-link btn" type="submit" onclick="return confirm('Do you really want to delete this item?')">
                    <span class="btn-icon-wrapper pr-2 opacity-8">
                        <i class="fa fa-trash fa-w-20"></i>
                    </span>
                    <span>Xóa</span>
                </button>
            </form>
        </li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body display_data">
                    <div class="position-relative row form-group">
                        <label for="image" class="col-md-3 text-md-right col-form-label">Ảnh</label>
                        <div class="col-md-9 col-xl-8">
                            <p>
                                <img style="height: 200px;" class="rounded-circle" 
                                data-toggle="tooltip" title="Avatar" 
                                data-placement="bottom" src="./front/img/user/{{ $user->avatar ?? 'dfPost.jpg'}}" alt="Avatar">
                            </p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="name" class="col-md-3 text-md-right col-form-label">
                            Tên
                        </label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ $user->name}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ $user->email}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="company_name" class="col-md-3 text-md-right col-form-label">
                            Nơi làm việc 
                        </label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ $user->company_name}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="country" class="col-md-3 text-md-right col-form-label">Nơi ở</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ $user->country}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="street_address" class="col-md-3 text-md-right col-form-label">
                            Địa chỉ </label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ $user->street_address}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                            Mã Zip</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ $user->poscode_zip}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="town_city" class="col-md-3 text-md-right col-form-label">
                            Town City</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ $user->town_city}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="phone" class="col-md-3 text-md-right col-form-label">Số điện thoại</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ $user->phone }}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="level" class="col-md-3 text-md-right col-form-label">Cấp độ</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ \App\Ultilities\Constant::$user_level[$user->level] }}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="description" class="col-md-3 text-md-right col-form-label">Miêu tả</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{ $user->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
