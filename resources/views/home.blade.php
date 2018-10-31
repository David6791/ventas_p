<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SanJinez | Panel de Control</title>

  <!--link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"-->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('css/morris.css') }}">
  <!-- jvectormap -->

  

  <link rel="stylesheet" href="{{ asset('css/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap3-wysihtml5.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/myStyles.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>J</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>POLI</b>Clinico</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>            
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                {{ Auth::user()->name }} - Gerente de Ventas
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Mensajes</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Ventas</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Amigos</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Pefile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU DE NAVEGACION</li>        
        
        @role('admin_pacientes')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pacientes</span> 
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>           
          </a>
          <ul class="treeview-menu">
            @permission('Ver_Pacientes')<li><a href="index_patients" class="load-page"><i class="fa fa-circle-o"></i> Ver Pacientes</a></li>@endpermission
            @permission('Registrar_Pacientes')<li><a href="form_patients" class="load-page"><i class="fa fa-circle-o"></i> Registro Pacientes</a></li>@endpermission
          </ul>
        </li>
        @endrole 
        @role('admin_horarios')       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Administrar Horarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @permission('ver_horarios')<li><a href="index_schedules" class="load-page"><i class="fa fa-circle-o"></i> Ver Horarios</a></li>@endpermission
            @permission('asignacion_horarios')<li><a href="index_assignment" class="load-page"><i class="fa fa-circle-o"></i> Asignacion de Horarios</a></li>@endpermission
          </ul>
        </li>
        @endrole
        @role('admin_datos')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Datos del Sistema</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @permission('ver_especialidades')<li><a href="index_especialidades" class="load-page"><i class="fa fa-circle-o"></i> Especialidades</a></li>@endpermission
            @permission('ver_patologias')<li><a href="index_pathologies" class="load-page"><i class="fa fa-circle-o"></i> Patologias</a></li>@endpermission
            @permission('ver_datos_medicos')<li><a href="index_medical_dates" class="load-page"><i class="fa fa-circle-o"></i> Datos Medicos</a></li>@endpermission
            @permission('ver_datos_registro')<li><a href="index_dates_register" class="load-page"><i class="fa fa-circle-o"></i> Datos Cita Medica</a></li>@endpermission
            @permission('ver_grupos_enfermedad')<li><a href="index_group_disease" class="load-page"><i class="fa fa-circle-o"></i> Grupos Enfermedades</a></li>@endpermission
          </ul>
        </li>
        @endrole
        @role('admin_examen_medico')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Examenes Medicos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @permission('ver_exam_medic')<li><a href="index_examen_medic" class="load-page"><i class="fa fa-circle-o"></i> Ver Examenes Medicos</a></li>@endpermission            
          </ul>
        </li>
        @endrole
        @role('ver_historial_medico')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Historiales Medicos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @permission('ver_lista')<li><a href="view_medical_record" class="load-page"><i class="fa fa-circle-o"></i> Ver Lista</a></li>@endpermission
          </ul>
        </li>
        @endrole
        @role('citas_medicas')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Citas Medicas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @permission('ver_citas')<li><a href="view_medical_appointment" class="load-page"><i class="fa fa-circle-o"></i> Ver Citas</a></li>@endpermission
            @permission('crear_citas')<li><a href="create_medical_appointment" class="load-page"><i class="fa fa-circle-o"></i> Crear Citas Medicas</a></li>@endpermission
            @permission('emergencias')<li><a href="view_emergency" class="load-page"><i class="fa fa-circle-o"></i> Registrar Emergencia</a></li>@endpermission
            
            
          </ul>
        </li>        
        @endrole
        @role('editar_reserva')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Editar Reservas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
            @permission('editar_reserva')<li><a href="view_list_appinments" class="load-page"><i class="fa fa-circle-o"></i> Editar Reserva</a></li>@endpermission            
          </ul>
        </li> 
        @endrole
        @role('confirmar_citas')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Confirmar Citas Medicas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
            @permission('confirmar_reserva')<li><a href="index_confir" class="load-page"><i class="fa fa-circle-o"></i> Confirmar Cita Medica</a></li>@endpermission
          </ul>
        </li> 
        @endrole
        @role('citas_medicas')
        <li class="treeview">
          <a href="">
            <i class="fa fa-envelope"></i> <span>Atencion Citas Medicas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @permission('lista_cita')<li><a href="view_attention_lists" class="load-page"><i class="fa fa-circle-o"></i> Lista de Citas Medicas</a></li>@endpermission
            @permission('registro_examenes')<li><a href="view_attention_lists_examen" class="load-page"><i class="fa fa-circle-o"></i> Registro de Examenes Medicos</a></li>@endpermission
          </ul>
        </li>
        @endrole
        <li class="treeview">
          @role('super_admin')  
          <a href="#">
            <i class="fa fa-user"></i> <span>Administrador de Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>                 
          <ul class="treeview-menu">
            @permission('Roles')<li><a href="index_role" class="load-page"><i class="fa fa-circle-o"></i> Roles</a></li>@endpermission
            @permission('Permisos')<li><a href="index_permission" class="load-page"><i class="fa fa-circle-o"></i> Permisos</a></li>@endpermission
            @permission('Asi_roles')<li><a href="index_roles_roles" class="load-page"><i class="fa fa-circle-o"></i> Asignacion de Roles</a></li>@endpermission
            @permission('Asig_permi')<li><a href="index_roles_permission" class="load-page"><i class="fa fa-circle-o"></i> Asignacion de Permisos</a></li>@endpermission  
            @permission('Ver_medicos')<li><a href="index_medics" class="load-page"><i class="fa fa-circle-o"></i> Ver Usuarios</a></li>@endpermission
          </ul>
          @endrole
        </li>
        <li class="treeview">
          @role('estadisticas')  
          <a href="#">
            <i class="fa fa-user"></i> <span>Estadisticas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>                 
          <ul class="treeview-menu">
            @permission('Ver_estadisticas')<li><a href="index_statistics" class="load-page"><i class="fa fa-circle-o"></i> Ver Estadisticas</a></li>@endpermission
          </ul>
          @endrole
        </li>
        <li class="treeview">
          @role('reportes_usuario')  
          <a href="#">
            <i class="fa fa-user"></i> <span>Reportes Usuario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>                 
          <ul class="treeview-menu">
            @permission('Ver_reportes_usuario')<li><a href="index_reports" class="load-page"><i class="fa fa-circle-o"></i> Ver Reportes Usuario</a></li>@endpermission
          </ul>
          @endrole
        </li>  
        <li class="treeview">
          @role('reportes_general')  
          <a href="#">
            <i class="fa fa-user"></i> <span>Reportes General</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>                 
          <ul class="treeview-menu">
          @permission('Ver_reportes_general')<li><a href="index_reports_general" class="load-page"><i class="fa fa-circle-o"></i> Ver Reporte General</a></li>@endpermission
          </ul>
          @endrole
        </li> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bienvenido
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de Control</li>
      </ol>
    </section>

    <!-- Main content -->
    <!-- page content -->
    <div class="right_col content" role="main" id="contentGlobal">
        </div>
        <!-- /page content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1
    </div>
    <strong>Corporacion &copy; 2018 <a href="">Paola Cuellar</a>.</strong> Todos los Derechos Reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('js/raphael.min.js') }}"></script>
<script src="{{ asset('js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('js/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('js/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>

<script src="{{ asset('js/Chart.js') }}"></script>

<!--script src="{{ asset('js/sweetalert.js') }}"></script-->
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<!--script src="{{ asset('js/sweetalert2.min.js') }}"></script-->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>





<script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>

<script src="{{ asset('js/icheck.min.js') }}"></script>
<script src="{{ asset('js/myScripts.js') }}"></script>
</body>
</html>
