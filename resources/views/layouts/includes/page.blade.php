<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="/">
                            <!-- Logo icon image, you can use font-icon also --><b>
                            <!--This is dark logo icon--><img src="{{asset('app-assets/plugins/images/admin-logo.png')}}" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="{{asset('app-assets/plugins/images/admin-logo-dark.png')}}" alt="home" class="light-logo" />
                         </b>
                            <!-- Logo text image you can use text also --><span class="hidden-xs">
                            <!--This is dark logo text--><img src="{{asset('app-assets/plugins/images/admin-text-dark.png')}}" alt="home" class="dark-logo" /><!--This is light logo text--><img src="{{asset('app-assets/plugins/images/admin-text-dark.png')}}" alt="home" class="light-logo" />
                         </span> </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>

                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{asset('app-assets/plugins/images/menu.jpg')}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Menu</b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">

                            <li><a href="/alunos"><i class="ti-user"></i> Alunos</a></li>
                            <li><a href="/professores"><i class="icon-note"></i> Professores</a></li>
                            <li><a href="/cursos"><i class="ti-wallet"></i> cursos</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/relatorio_dinamico"><i class="ti-bar-chart"></i> Relatorios</a></li>

                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Ações</span></h3> </div>
                <ul class="nav" id="side-menu">

                    <li> <a href="#" class="waves-effect"><i class="fa fa-file-text fa-fw"></i> <span class="hide-menu">MENU<span class="fa arrow"></span><span class="label label-rouded label-warning pull-right"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-account-plus fa-fw"></i> <span class="hide-menu">Cadastros</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li> <a href="/professores"><i class="icon-note fa-fw"></i> <span class="hide-menu">Professor</span></a></li>
                                    <li> <a href="/alunos"><i class="ti-user fa-fw"></i> <span class="hide-menu">Aluno</span></a></li>
                                    <li> <a href="/cursos"><i class="ti-wallet fa-fw"></i> <span class="hide-menu">Curso</span></a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)" class="waves-effect"><i class=" ti-bar-chart fa-fw"></i><span class="hide-menu">Relatorios</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="/relatorio_dinamico"><i class="fa-fw">A</i> <span class="hide-menu">Alunos</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="devider"></li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
