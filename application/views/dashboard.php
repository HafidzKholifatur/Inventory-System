

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php if($is_admin == true): ?>

        <div class="row">
          <a href="<?php echo base_url('products/') ?>">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              
              <div class="small-box bg-aqua" style="border-radius : .35rem;">
                
                <div class="inner" style="background: linear-gradient(to right, #00c6ff, #0072ff);">
                  <p>Total Products</p>

                  <h3><?php echo $total_products ?></h3>                
                </div>              
                <div class="icon">
                  <!-- <i class="ion ion-bag"></i> -->
                  <i class="fas fa-shopping-bag fa-xs" style="color:#fff;"></i>
                </div>
                <!-- <a href="<?php echo base_url('products/') ?>" class="small-box-footer" style="border-radius: 0rem .0rem .35rem .35rem;">More info <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
          </a>
            <!-- ./col -->
          <a href="<?php echo base_url('orders/') ?>">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green" style="border-radius : .35rem;">
                <div class="inner"  style=" background: linear-gradient(to right, #fdc830, #f37335);">
                  <p>Total Paid Orders</p>
                  
                  
                  <h3><?php echo $total_paid_orders ?></h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars " style="color:#fff;"></i>
                </div>
                <!-- <a href="<?php echo base_url('orders/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
          </a>
            <!-- ./col -->
          <a href="<?php echo base_url('users/') ?>" >
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow" style="border-radius : .35rem;">
                <div class="inner" style="background: linear-gradient(to right, #38ef7d, #11998e);">
                  <p>Total Users</p>


                  <h3><?php echo $total_users; ?></h3>
                </div>
                <div class="icon">
                  <i class="fas fa-users fa-xs" style="color:#fff;"></i>
                </div>
                <!-- <a href="<?php echo base_url('users/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
          </a>
            <!-- ./col -->
          <a href="<?php echo base_url('stores/') ?>" >
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red" style="border-radius : .35rem;">
                <div class="inner" style=" background: linear-gradient(to right, #ff512f, #dd2476);">
                  <p>Total Stores</p>


                  <h3><?php echo $total_stores ?></h3>
                </div>
                <div class="icon">
                  <i class="fas fa-store fa-xs" style="color:#fff;"></i>
                </div>
                <!-- <a href="<?php echo base_url('stores/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
          </a>
            <!-- ./col -->
        </div>
        <!-- /.row -->
      <?php endif; ?>
      

    <!-- /.content -->



    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-md-12">
          <form class="form-inline" action="<?php echo base_url('dashboard/') ?>" method="POST">
            <div class="form-group">
              <label for="date">Year</label>
              <select class="form-control" name="select_year" id="select_year">
                <?php foreach ($report_years as $key => $value): ?>
                  <option value="<?php echo $value ?>" <?php if($value == $selected_year) { echo "selected"; } ?>><?php echo $value; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #4e73df; border: none;">Submit</button>
          </form>
        </div>

        <br /> <br />

                 <div class="col-md-6 ">
           <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Total Paid Orders - Report Data</h3>
            </div>
           <div class="box-body">
              <table id="datatables" class="table table-bordered table-striped table responsive-sm  " >
                <tr>
                  <th>Month - Year</th> 
                  <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                  <?php foreach ($results as $k => $v): ?>
                    <tr>
                      <td><?php echo $k; ?></td>
                      <td><?php 
                      
                        echo $company_currency .' ' . $v;
                        //echo $v;
                      
                      ?></td>
                    </tr>
                  <?php endforeach ?>
                  
                </tbody>
                <tbody>
                  <tr>
                    <th>Total Amount</th>
                    <th>
                      <?php //echo $company_currency . ' ' . array_sum($parking_data); ?>
                      <?php echo array_sum($results); ?>
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


        <div class="col-md-6">

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total Parking - Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:515px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

      </div>

          <!-- /.box -->
         
      

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->


  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    }); 
  </script>

   <script type="text/javascript">

    $(document).ready(function() {
      $("#reportNav").addClass('active');
    }); 

    var report_data = <?php echo '[' . implode(',', $results) . ']'; ?>;
    

    $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
     var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : report_data
        }
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#00f5d4';
    barChartData.datasets[0].strokeColor = '#00f5d4';
    barChartData.datasets[0].pointColor  = '#00f5d4';
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
  </script>



