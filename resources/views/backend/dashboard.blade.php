@extends('backend.master')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Tổng quan</h1>
<div class="row">
    <!--  Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tổng thu về</div>
                            <?php
                            	$sum = 0;
                            	$wait = 0;
	                            foreach ($orders as $key => $value) {
	                            	if($value->status=='Đã nhận hàng') $sum+=$value->grand_total;
	                            	if($value->status=='Chờ xử lý') $wait++;
	                            }
                            ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($sum)}}</div>
                    </div>
                    <div class="col-auto">
                        <b>VNĐ</b>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Đơn hàng chờ xử lý</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$wait}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Số khách hàng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($customers)}}</div>
                    </div>
                    <div class="col-auto">
                    	<i class="fas fa-male fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Lượt đánh giá</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($reviews)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Doanh thu trên ngày trong 15 ngày gần nhất</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-line">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Cơ cấu mặt hàng theo danh mục</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="pieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-warning"></i> {{$categories[0]->name}}
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> {{$categories[1]->name}}
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> {{$categories[2]->name}}
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-dark"></i> {{$categories[3]->name}}
                </span>
                <span>
                	<i class="fas fa-circle text-danger"></i> {{$categories[4]->name}}
                </span>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<?php
$names = array();
$counts = array();
foreach ($categories as $key => $value) {
 	$names[$key] = $value->name;
 	$counts[$key] = count($value->products);
 }
?>

<script type="text/javascript">
var lineChart = $('#lineChart');
var myChart1 = new Chart(lineChart,{
    type: 'line',
    data: {
        labels: <?php echo json_encode(array_keys($arrayLast)); ?>,
        datasets: [{
            label: "",
            fill : false,
            borderColor: "rgba(78, 115, 223, 1)",
            data: <?php echo json_encode(array_values($arrayLast)); ?>,
            borderWidth: 1
        }]
    },
    options: {
        legend:{
            display:false
        },
        tooltips:{
            callbacks:{
                label:function(tooltipItem){
                    return tooltipItem.yLabel+'đ';
                }
            }
        },
        scales: {
            xAxes: [{
                time: {
                  unit: 'date'
                },
                ticks: {
                  maxTicksLimit: 15
                }
            }],
            yAxes: [{
                ticks:{
                    callback: function(value) {
                        return value+'đ';
                    }
                }
            }]
        }
    }
});
var pieChart = $('#pieChart');
var myChart2 = new Chart(pieChart,{
	type: 'pie',
	data: {
    labels: <?php echo json_encode(array_values($names)); ?>,
    datasets: [{
      	data: <?php echo json_encode(array_values($counts)); ?>,
      	backgroundColor: ['#f6c23e', '#1cc88a', '#36b9cc','#5a5c69','#e74a3b'],
      	hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  	},
	options: {
	    maintainAspectRatio: false,
	    legend: {
	      display: false
	    },
	},
});
</script>
@endsection
