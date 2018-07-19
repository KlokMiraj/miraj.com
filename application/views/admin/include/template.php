<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/') ?>css/main.css">
        <!-- bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jquery -->


        <title>Find Your Music</title>
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries-->
        <!--if lt IE 9
        script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
        script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
        -->
    </head>
    <body class="sidebar-mini fixed">
        <div class="wrapper">
            <!-- Navbar-->
            <header class="main-header hidden-print"><a class="logo" href="<?= base_url('admin/dashboard') ?>">Find Your Music</a>
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
                    <!-- Navbar Right Menu-->
                    <div class="navbar-custom-menu">
                        <ul class="top-nav">
                            <!--Notification Menu-->
                            <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o fa-lg"></i></a>
                                <ul class="dropdown-menu">

                                    <li class="not-head">You have 4 new notifications.</li>
                                    <li class="not-footer"><a href="#">See all notifications.</a></li>
                                </ul>
                            </li>
                            <!-- User Menu-->
                            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                                <ul class="dropdown-menu settings-menu">
                                    <li><a href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>

                                    <li><a href="<?= base_url('admin/profiles/'); ?>"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                                    <li><a href="<?= base_url('admin/sign-out') ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <?php $this->load->view('admin/include/sideBar'); ?>

            <div class="content-wrapper">
                <div class="page-title">
                    <div>
                        <?php if (isset($title)): ?>
                            <h1><i class="fa fa-dashboard"></i> <?php echo $title;
                    else: echo "Dashboard";
                    endif; ?></h1>
                        <p> <?= $role_title ?></p>
                    </div>
                    <div>
                        <ul class="breadcrumb">
                            <li><i class="fa fa-home fa-lg"></i></li>
                            <li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                        </ul>
                    </div>
                </div>

                <!--ID filtering for the profile extraction-->
                <?php
                if (isset($res)) {
                    $res = $res;
                } else {
                    $res = "";
                }
                ?>

                <div class="row">
                    <?php if (isset($main_page)): ?>
                        <?php $this->load->view($main_page,$res); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Javascripts-->
        <script src="<?= base_url('assets/admin/') ?>js/jquery-2.1.4.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/essential-plugins.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/bootstrap.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/plugins/pace.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>js/main.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/admin/') ?>js/plugins/chart.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/admin/') ?>js/plugins/jquery.vmap.min.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/admin/') ?>js/plugins/jquery.vmap.world.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/admin/') ?>js/plugins/jquery.vmap.sampledata.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var data = {
                    labels: ["January", "February", "March", "April", "May"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86]
                        }
                    ]
                };
                var ctxl = $("#lineChartDemo").get(0).getContext("2d");
                var lineChart = new Chart(ctxl).Line(data);

                var map = $('#demo-map');
                map.vectorMap({
                    map: 'world_en',
                    backgroundColor: '#fff',
                    color: '#333',
                    hoverOpacity: 0.7,
                    selectedColor: '#666666',
                    enableZoom: true,
                    showTooltip: true,
                    scaleColors: ['#C8EEFF', '#006491'],
                    values: sample_data,
                    normalizeFunction: 'polynomial'
                });
            });
        </script>
    </body>
</html>