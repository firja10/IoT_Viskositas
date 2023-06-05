@extends('adminlte.layouts')

@section('content')



    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
  
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 id="kecepatan_motor"></h3> <h3>RPM</h3>
  
                  <p>Kecepatan Motor DC</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3 id="kuat_arus"></h3> <h3>A</h3>
  
                  <p>Arus Motor DC</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 id="tegangan"></h3> <h3>V</h3>
  
                  <p>Tegangan Motor DC</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3 id="viskositas"></h3><h3>cP</h3>
  
                  <p>Viskositas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
  
          <!-- Line Chart -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                RPM
              </h3>
  
              <div class="card-tools">
              </div>
            </div>
            <div class="card-body">
              {{-- <div id="line-chart" style="height: 300px;"></div>
              <div id="chartLegend"></div>
              <br>

              <div id="line-chart-coba" style="height: 300px;"></div> --}}


              <div id="data_kecepatan_motor" style="height: 300px;"></div>
              <div class="chartLegend"></div>

              <div id="data_kuat_arus" style="height: 300px;"></div>
              <div class="chartLegendCurrent"></div>

              <div id="data_tegangan" style="height: 300px;"></div>
              <div class="chartLegendVoltage"></div>

              <div id="data_viskositas" style="height: 300px;"></div>
              <div class="chartLegendViskositas"></div>
             
            
            </div>
            <!-- /.card-body-->
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
  
    
@endsection