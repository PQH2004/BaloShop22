@extends('admin.layout.master')
@section('title', 'Thống Kê')

@section('body')

<!-- Main -->
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph2 icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Thống Kê
                    <div class="page-title-subheading">
                        Quản lý thống kê doanh thu và các số liệu khác
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Overview -->
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Tổng Doanh Thu</h5>
                    <p>{{ number_format($totalRevenue) }} VND</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Số Sản Phẩm</h5>
                    <p>{{ $productCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Số Khách Hàng</h5>
                    <p>{{ $customerCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Số Đơn Hàng</h5>
                    <p>{{ $orderCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue Chart -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Biểu đồ Doanh Thu</h5>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ensure that the element exists before attempting to access its context
    var chartElement = document.getElementById('revenueChart');
    
    if (chartElement) {
        var ctx = chartElement.getContext('2d');
        
        var revenueChart = new Chart(ctx, {
            type: 'line',
            data: {!! json_encode($chartData) !!},
            options: {
                scales: {
                    x: {
                        type: 'category',
                        labels: {!! json_encode($chartData['labels']) !!}
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    } else {
        console.error('The chart element was not found in the DOM.');
    }
</script>


@endsection
