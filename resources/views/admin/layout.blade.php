<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">


  <title>Simply Accounting</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/v4-shims.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/css/dashboard.css') }}">

  <!-- DatePicker -->
  {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />


  <!-- PLUGINS CSS STYLE -->
  <link href="{{ URL::asset('admin/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

  
  <!-- Font Awesome CSS Style -->
  <link rel="stylesheet" href="text/css" href="{{ URL::asset('admin/assets/css/font-awesome.css') }}">
  <link rel="stylesheet" href="text/css" href="{{ URL::asset('admin/assets/css/font-awesome.min.css') }}">


  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>


  <!-- No Extra plugin used -->
  
  
  <script type="text/javascript" src="{{ URL::asset('admin/assets/js/jquery-ui-1.12.1/jquery-ui.js') }}"></script>

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/js/jquery-ui-1.12.1/jquery-ui.css') }}">

  
  <link href="{{ URL::asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  
  
  
  <link href="{{ URL::asset('admin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
  
  
  
  <link href="{{ URL::asset('admin/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" />
  
  

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ URL::asset('admin/assets/css/sleek.css') }}" />

  

  <!-- FAVICON -->
  <link href="{{ URL::asset('admin/assets/img/logo.png') }}" rel="shortcut icon" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <script src="{{ URL::asset('admin/assets/js/jquery.mask.min') }}"></script>
  <script src="{{ URL::asset('admin/assets/js/jquery-1.11.2.min') }}"></script>
  <script src="{{ URL::asset('admin/assets/js/terbilang') }}"></script>
  <script>
    $(document).ready(function($)){
      $('#phone').mask("Rp. 9.999.999.999", {placeholder:"Rp. 0.000.000.000"})
    }
  </script>


  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ URL::asset('admin/assets/plugins/nprogress/nprogress.js') }}"></script>
</head>


<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
  
  <script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
  </script>

  <div class="mobile-sticky-body-overlay"></div>

  
  <div id="toaster"></div>
  

  <div class="wrapper">
    <!-- Github Link -->

    
    @include('admin.partials.sidebar')

    <div class="page-wrapper">
        @include('admin.partials.header')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
</div>

  <script src="{{ URL::asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>



<script src="{{ URL::asset('admin/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/jekyll-search.min.js') }}"></script>



<script src="{{ URL::asset('admin/assets/plugins/charts/Chart.min.js') }}"></script>
  


<script src="{{ URL::asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
  


<script src="{{ URL::asset('admin/assets/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
  


<script src="{{ URL::asset('admin/assets/plugins/toastr/toastr.min.js') }}"></script>
  


<script src="{{ URL::asset('admin/assets/js/sleek.bundle.js') }}"></script>


<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script src="{{ URL::asset('admin/assets/js/jquery.mask.min') }}"></script>
<script src="{{ URL::asset('admin/assets/js/jquery-1.11.2.min') }}"></script>
<script src="{{ URL::asset('admin/assets/js/terbilang') }}"></script>
<script type="text/javascript">
function inputTerbilang() {
  //membuat inputan otomatis jadi mata uang
  $('.mata-uang').mask('0.000.000.000', {reverse: true});

  //mengambil data uang yang akan dirubah jadi terbilang
  var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

  //menampilkan hasil dari terbilang
  document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
}
</script>

<script type="text/javascript">
    $('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });  
</script>


</body>

<script type="text/javascript">
  $(document).ready( function () {
      $('.data').DataTable();
  } );
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.input-tanggal').datepicker();		
	});
</script>

</html>
