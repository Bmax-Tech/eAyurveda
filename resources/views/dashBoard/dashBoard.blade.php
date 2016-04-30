
        <!-- ************************************* -->

<div width="100%" style="margin: 5px;padding: 5px;background: #FFF">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-lime">
                        <div class="inner">
                            <h3><?php echo $top_count; ?> </h3>
                            <p>Registered Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
                            <h3><?php echo $new_count; ?> </h3>
                            <p>New Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <h3><?php echo $formal_doctor_count; ?> </h3>
                            <p>Formal Doctors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $nonformal_doctor_count; ?></h3>
                            <p>Non Formal Doctors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">User Registrations</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="revenue-chart" style="height: 300px;"></div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <!-- DONUT CHART -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Users</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                </div><!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Doctor Registrations</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="line-chart" style="height: 300px;"></div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <!-- BAR CHART -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Doctors Registrations</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="bar-chart" style="height: 300px;"></div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                </div><!-- /.col (RIGHT) -->
            </div><!-- /.row -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div>
<!-- ************************************* -->
