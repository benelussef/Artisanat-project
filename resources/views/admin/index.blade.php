<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.toplinks')

</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('admin.menu')

            <!-- STATISTIC-->
            <section class="statistic mt-5">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">{{$users->count()}}</h2>
                                    <span class="desc">Users</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">{{$products->count()}}</h2>
                                    <span class="desc">Products</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">{{$orders->count()}}</h2>
                                    <span class="desc">Orders</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">{{$totalpaid}} MAD</h2>
                                    <span class="desc">total earnings</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- RECENT REPORT 2-->
                                <div class="recent-report2">
                                    <h3 class="title-3">Monthly Orders</h3>
                                    <div class="chart-info">
                                    </div>
                                    <div class="recent-report__chart">
                                        <canvas id="line-chart" width="800" height="450"></canvas>
                                    </div>
                                </div>
                                <!-- END RECENT REPORT 2             -->
                            </div>
                            <div class="col-xl-4">
                                <!-- TASK PROGRESS-->
                                <div class="task-progress">
                                    <h3 class="title-3">Best Selling Products</h3>
                                    <div class="au-skill-container">
                                        @for ($i = 0; $i < 4 ; $i++)
                                        <div class="au-progress">
                                            <span class="au-progress__title">{{$bestSelling[0][$i]['product_name']}}</span>
                                            <div class="au-progress__bar mt-3 pt-3">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="{{($bestSelling[0][$i]['total'] / $orders->count())*100}}">
                                                    <span class="au-progress__value js-value"></span>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                                <!-- END TASK PROGRESS-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @include('admin.footer')

            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <script src="{{asset("https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js")}}"></script>

  @include('admin.bottomlinks')
</body>
<script>
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'],
    datasets: [ { 
        data: [
        {{$montlyEarning[0]}},
        {{$montlyEarning[1]}},
        {{$montlyEarning[2]}},
        {{$montlyEarning[3]}},
        {{$montlyEarning[4]}},
        {{$montlyEarning[5]}},
        {{$montlyEarning[6]}},
        {{$montlyEarning[7]}},
        {{$montlyEarning[8]}},
        {{$montlyEarning[9]}},
        {{$montlyEarning[10]}},
        {{$montlyEarning[11]}}
         ],
        label: "monthly Earning",
        borderColor: "#8e5ea2",
        fill: false
      }
    ]
  },
});
</script>
</html>
<!-- end document-->
