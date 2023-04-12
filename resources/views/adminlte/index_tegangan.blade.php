@extends('adminlte.layouts')

@section('content')
    

 
 
 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Tegangan Motor DC</h1>
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
         

       
      
       </div>
       <!-- /.row -->

       <!-- Line Chart -->
       <div class="card card-primary card-outline">
         <div class="card-header">
           <h3 class="card-title">
             <i class="far fa-chart-bar"></i>
             Volt
           </h3>

           <div class="card-tools">
           </div>
         </div>
         <div class="card-body">
           <div id="line-chart" style="height: 300px;"></div>
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