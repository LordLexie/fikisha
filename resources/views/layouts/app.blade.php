<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>


  <title>Dashboard</title>

   <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ URL::asset('includes/plugins/fontawesome-free/css/all.min.css')}} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('includes/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('includes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('includes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  
   <link rel="stylesheet" href="{{URL::asset('includes/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{URL::asset('includes/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{URL::asset('includes/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{URL::asset('includes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{URL::asset('includes/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('includes/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{URL::asset('includes/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('includes/plugins/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{URL::asset('includes/dist/css/custom.css')}}">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
 
    <ul class="navbar-nav ml-auto">
     
   
      <li class="nav-item">
 
		<b>
		<a class="nav-link"  style = "color:red;"   href="{{route('logout')}}" title = "Logout" role="button"><i
            class="fas fa-power-off"></i>
		</a>
		</b>
		
	
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{URL::asset('includes/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">FIKISHA APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::asset('includes/dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">
          
          @if(isset($_SESSION['username']))
          {{$_SESSION['username']}}
          @endif
          </a>
        </div>
      </div>
		
		   <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
      <li class="nav-item">
      <a href="{{route('dashboard')}}" class="nav-link">
      <i class="nav-icon fa fa-home"></i>
      Dashboard
      </a>
      </li>

      <li class="nav-item">
      <a href="{{route('clients')}}" class="nav-link">
      <i class="nav-icon fa fa-users"></i>
      Customers
      </a>
      </li>

      <li class="nav-item">
      <a href="{{route('fleet')}}" class="nav-link">
      <i class="nav-icon fa fa-truck"></i>
      Fleet
      </a>
      </li>
          
      </ul>
      </nav>
		
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content" style = "padding-top:5px;">       
		@yield('content')
    </div>
  </div>
  
  <!-- Main Footer -->
  <footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
  </div>
  <!-- Default to the left -->
  <strong>
  <a href=""><i><small>Powered by Francis Alexie</small></i></a>
  </strong> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{URL::asset('includes/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{URL::asset('includes/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('includes/dist/js/adminlte.min.js')}}"></script>
<script src="{{URL::asset('includes/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('includes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('includes/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('includes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>   

<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('includes/dist/js/demo.js')}}"></script>
<script src="{{URL::asset('includes/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
  $(function () {

  

 $.ajax({
    type:"GET",
    url:"http://127.0.0.1:8000/api/home_stats",
    success: function(data){
    
    $('.pending').text(data.pending)
    $('.loading').text(data.loading)
    $('.dispatched').text(data.dispatched)
    $('.delivered').text(data.delivered)

    $('.available').text(data.available)
    $('.loading_trucks').text(data.loading_trucks)
    $('.on_transit').text(data.on_transit)

    $('.clients').text(data.clients)

    }
  });

  // Pop up modals
  $('.show_modal').click(function(){
  $('#modal-default').modal()
  });

  $('.edit_client').click(function(){
  $id = $(this).attr('data');

  $.ajax({
    type:"GET",
    url:"http://127.0.0.1:8000/api/user_details/"+$id,
    success: function(data){
    
    $('.client_id').val($id)
    $('.name').val(data.client.name)
    $('.phone').val(data.client.phone)
    $('.email').val(data.client.email)
    $('#modal-success').modal()
    $('#modal-success').modal()

    }
  });

  });

  $('.update_customer').click(function(event){
    event.preventDefault()

    $client_id = $('.client_id').val()
    $name = $('.name').val()
    $phone = $('.phone').val()
    $email = $('.email').val()

    $.ajax({
      type:'POST',
      url:'http://127.0.0.1:8000/api/update_user/',
      data:{client_id:$client_id,name: $name,phone: $phone,email:$email},
      success: function(data){
      location.reload();
      //$('#modal-success').modal('hide')
      }
    });
  });

  $('.delete_client').click(function(){
  $id = $(this).attr('data')

  $.ajax({
    type:'GET',
    url:'http://127.0.0.1:8000/api/delete_customer/'+$id,
    success: function(data)
    {
      location.reload();
    }
  });

  });

  $('.save_order').click(function(){

  $customer = $('.customer').val();
  $from = $('.from').val();
  $to = $('.to').val();
  $description = $('.description').val();

  $.ajax({
    type:'POST',
    url: 'http://127.0.0.1:8000/api/add_order',
    data: {customer:$customer,from:$from,to:$to,description:$description},
    success: function(){
    location.reload();
    }
  });

  });

  $('.edit_truck').click(function(){

  $id = $(this).attr('data')

  $.ajax({
    type: 'GET',
    url: 'http://127.0.0.1:8000/api/truck_details/'+$id,
    success : function(data){

    $('.registration').val(data.truck.registration)
    $('.type').val(data.truck.type)
    $('.truck_id').val(data.truck.id)

    $('#modal-success').modal()
    }
  })

  })

  $('.update_truck').click(function(event){

    event.preventDefault()

    $id = $('.truck_id').val()
    $registration = $('.registration').val()
    $type = $('.type').val()

    $.ajax({
      type: 'POST',
      url: 'http://127.0.0.1:8000/api/update_truck',
      data: {id:$id,registration:$registration,type:$type},
      success: function(data){
      location.reload();
      }
    })

  })

  $('.delete_truck').click(function(){
  $id = $(this).attr('data')

  $.ajax({
    type: 'GET',
    url: 'http://127.0.0.1:8000/api/delete_truck/'+$id,
    success: function(){
    location.reload();
    }
  })

  })

  $('.assign_order').click(function(){
  $('#modal-assign').modal()
  $id = $(this).attr('data')
  $('#order_id').val($id)
  });

  $('.link_truck').click(function(){
  $order = $('#order_id').val()
  $truck = $('#truck_id').val()

   $.ajax({
    type: 'GET',
    url: 'http://127.0.0.1:8000/api/assign_truck/'+$order+'/'+$truck,
    success: function(){
     location.reload();
    }
  })

  });

  $('.dispatch_order').click(function(){
  $id = $(this).attr('data')
  
  $.ajax({
  type: 'GET',
  url: 'http://127.0.0.1:8000/api/dispatch/'+$id,
  success: function(){
    location.reload();
  }
  })

  });

  $('.deliver_order').click(function(){
  $id = $(this).attr('data')
  
  $.ajax({
  type: 'GET',
  url: 'http://127.0.0.1:8000/api/deliver/'+$id,
  success: function(){
    location.reload();
  }
  })

  });

  });


</script>

</body>
</html>
