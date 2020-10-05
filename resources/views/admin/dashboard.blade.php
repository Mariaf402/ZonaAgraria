@extends('layouts.adminLayout.admin_design')
@section('content')
<body>

       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
             <div class="header-icon">
                <i class="fa fa-dashboard"></i>
             </div>
             <div class="header-title">
                <h1>ZonAgraria Dashboard</h1>
                <small>Bienvenido</small>
             </div>
          </section>
          <!-- Main content -->
          <section class="content">
             <div class="row" >
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                   <div id="cardbox1">
                      <div class="statistic-box">
                         <i class="fa fa-user-plus fa-3x"></i>
                         <div class="counter-number pull-right">
                            <span class="count-number"></span>
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                         </div>
                         <h3>Vededores</h3>
                      </div>
                   </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                   <div id="cardbox2">
                      <div class="statistic-box">
                         <i class="fa fa-user-secret fa-3x"></i>
                         <div class="counter-number pull-right">
                            <span class="count-number"></span>
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                         </div>
                         <h3>Administradores</h3>
                      </div>
                   </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                   <div id="cardbox3">
                      <div class="statistic-box">
                         <i class="fa fa-money fa-3x"></i>
                         <div class="counter-number pull-right">
                            <i class="ti ti-money"></i><span class="count-number"></span>
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                         </div>
                         <h3>Gastos</h3>
                      </div>
                   </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                   <div id="cardbox4">
                      <div class="statistic-box">
                         <i class="fa fa-files-o fa-3x"></i>
                         <div class="counter-number pull-right">
                            <span class="count-number"></span>
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                         </div>
                         <h3> Proyectos</h3>
                      </div>
                   </div>
                </div>
             </div>

             <div class="row">
                <!-- Barchart -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                   <div class="panel panel-bd lobidisable">
                      <div class="panel-heading">
                         <div class="panel-title">
                            <h4>Ingresos y gastos de este año (gráfico de barras)</h4>
                         </div>
                      </div>
                      <div class="panel-body">
                         <canvas id="barChart" height="150"></canvas>
                      </div>
                   </div>
                </div>
                <!-- bar chart -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                   <div class="panel panel-bd lobidisable">
                      <div class="panel-heading">
                         <div class="panel-title">
                            <h4>Weekly Earnings & Expenses</h4>
                         </div>
                      </div>
                      <div class="panel-body">
                         <canvas id="singelBarChart" height="323"></canvas>
                      </div>
                   </div>
                </div>
             </div>
             <!-- /.row -->
             <div class="row">
                <div class="col-xs-12 col-sm-8">
                   <div class="panel panel-bd lobidrag">
                      <div class="panel-heading">
                         <div class="panel-title">
                            <h4>Google Map</h4>
                         </div>
                      </div>
                      <div class="panel-body">
                         <div class="google-maps">
                            <iframe src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=15+Springfield+Way,+Hythe,+CT21+5SH&amp;aq=t&amp;sll=52.8382,-2.327815&amp;sspn=8.047465,13.666992&amp;ie=UTF8&amp;hq=&amp;hnear=15+Springfield+Way,+Hythe+CT21+5SH,+United+Kingdom&amp;t=m&amp;z=14&amp;ll=51.077429,1.121722&amp;output=embed"></iframe>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                   <div class="panel panel-bd lobidrag">
                      <div class="panel-heading">
                         <div class="panel-title">
                            <h4>Calendario</h4>
                         </div>
                      </div>
                      <!-- Monthly calender widget -->
                      <div class="panel panel-bd">
                         <div class="panel-body">
                            <div class="monthly_calender">
                               <div class="monthly" id="m_calendar"></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </section>
          <!-- /.content -->
       </div>
       <!-- /.content-wrapper -->

 </body>
<!--end-main-container-part-->

@endsection
