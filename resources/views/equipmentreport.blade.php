<html>
  <head>
    <style>
      .pdf-container{
          position: relative;
      }

      .header-wrapper{
          text-align: center;
          margin: 30px 0 40px 0;
      }

      .logo{
          width: 100px;
          display: block;
      }

      .address{
          margin: 0;
      }

      .footer-wrapper{
          position: absolute;
          bottom: 0;
          text-align: center;
      }
  </style>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  </head>
  <body>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              {{-- <h1 class="m-0 text-dark">Starter Page</h1> --}}
            </div><!-- /.col -->
           
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pdf-container">
                                <div class="header-wrapper">
                                    
                                </div>
                              <table class="table table-bordered">
  
                                  <thead>
                                      <tr>
                                        <th colspan="3" style="text-align: center">
                                          <img src="{{URL::asset('/image/logo1.png')}}" alt="GYMMS" class="profile-user-img img-fluid img-circle" height="160" width="1600">
                                        </th>
                                      </tr>
                                      <tr>
                                        <th colspan="3" style="text-align: center">State of Equipments report</th>
                                      </tr>
                                      
                                      <tr>
                                          <th style="text-align: left">No</th> &nbsp;
                                          <th style="text-align: right">Equipment Name</th> &nbsp;
                                          <th style="text-align: right">Equipment state</th> &nbsp;
                                      </tr>
                                  </thead>
     
                                  <tbody>
     
                                     @if (count($equipments) < 1)
                                         <tr>
                                             <td>No Equipment found</td>
                                         </tr>
                                     @else
                                         @foreach ($equipments as $equipment)
                                         <tr>
                                             <td style="text-align: left">{{ $equipment->id }}</td> &nbsp;&nbsp;&nbsp;
                                             <td style="text-align: right">{{ $equipment->Equipmentname }}</td> &nbsp;&nbsp;&nbsp;
                                             <td style="text-align: right">{{ $equipment->State_of_equipment }}</td> &nbsp;&nbsp;&nbsp;
                                         </tr>
                                         @endforeach
                                     
                                     @endif 
                                     
                                  </tbody>
                              </table>
                               
                              <div class="footer_wrapper">
                                  <p class="address"> Footer address: 455 Mount Eden Road, Mount Eden, Merisho</p>
                              </div>
                            </div>
                             
                        </div>
                    </div>
                </div> 
  
              </div> 
  
              {{-- <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
  
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                  </p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div><!-- /.card --> --}}
            
           
          
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
   
  
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020 <a href="#">Tersly-encoding</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->
  
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  
  <script src="{{ asset('js/app.js') }}"></script>
  
  </body>
  
</html>


