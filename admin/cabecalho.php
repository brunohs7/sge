<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha'])  == true))
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('location: login.php');
}
$logado = $_SESSION['nome'];
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	
  <title>SGE - Sistema de Gerenciamento Escolar</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php" style="height:150px;">
        <img src="../img/logo-sges3.png" width="80%">        
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="fas fa-user"></i>
          <span>Painel</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Ações
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-layer-group"></i>
          <span>Alunos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="consultar_aluno.php">Consultar Aluno</a>
            <a class="collapse-item" href="cadastrar_aluno.php">Cadastrar Aluno</a>
          </div>
        </div>
      </li>
      <!--Nav item - Paginas cadastrar-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Professores</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="consultar_professor.php">Consultar Professor</a>
            <a class="collapse-item" href="cadastrar_professor.php">Cadastrar Professor</a>
          </div>
        </div>
      </li>
             


      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie" aria-expanded="true" aria-controls="collapseUtilitie">
          <i class="fas fa-archive"></i>
          <span>Turmas</span>
        </a>
        <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="consultar_alunos_da_turma.php">Consultar Turmas</a>
            <a class="collapse-item" href="cadastrar_turma.php">Criar nova Turma</a>
            <a class="collapse-item" href="montar_turma.php">Montar Turma</a>			
           </div>
        </div>
      </li>
      <!-- nav item - disciplina -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
          <i class="fas fa-fw fa-folder"></i>
          <span>Disciplinas</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="consultar_disciplina.php">Consultar Disciplina</a>
            <a class="collapse-item" href="cadastrar_disciplina.php">Cadastrar Disciplina</a>
			<a class="collapse-item" href="vincular_disciplina.php">Vincular Disciplina à Turma</a>
           </div>
        </div>
      </li>
      <!-- Divider -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="lancamento_de_notas.php">
          <i class="fas fa-archive"></i>
          <span>Lançamento de Notas</span>
        </a>
		</li>
	  <li class="nav-item">
        <a class="nav-link collapsed" href="lancamento_de_faltas.php">
          <i class="fas fa-archive"></i>
          <span>Lançar Faltas</span>
        </a>		
      </li>
	  <li class="nav-item">
        <a class="nav-link collapsed" href="enviar_arquivo.php">
          <i class="fas fa-archive"></i>
          <span>Enviar Arquivos</span>
        </a>		
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
     
      
             <!-- Nav Item - sair -->
      <li class="nav-item">
        <a class="nav-link" href="sair.php">
          <i class="fas fa-sign-out-alt"></i>
          <span>Sair</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            

            <!-- Nav Item - Messages -->
           

            <!-- Nav Item - User Information -->
            

          </ul>

        </nav>
        <!-- End of Topbar -->
