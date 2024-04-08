<?php 
	include 'cabecalho.php';
	require_once "../classes/conecta.class.php";
	
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
		  <div class="d-flex flex-column mb-4 shadow">
				<div class="p-2 bg-white"><h1 class="h3 mb-0 text-white-800">Bem vindo <?php echo $logado;?></h1></div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <!-- menu dos avisos  -->
				   <ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Recente</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Avisos</a>
					  </li> 
					  <li class="nav-item">
						<a class="nav-link" id="contact2-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">Oportunidade</a>
					  </li>
					  </ul>
					  
                                  
                  </div>
				<!-- mensagens exibidas -->
				<div id="section1" class="container-fluid" id="recente">
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<?php
                        $sql = " SELECT * from tbaviso WHERE tipo != 'tarefas' ORDER BY data DESC LIMIT 5;";
                        $stmt = Conecta::abrirConexao()->prepare($sql); 
                        $stmt->execute();
                        $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          foreach ( $linhas as $linha ) {
							echo '<div class="col-lg-9 mb-1">
									<div class="card '; 
									if ($linha["tipo"]== "Avisos") {
										echo "bg-warning";
									
									}else if ($linha["tipo"] == "Oportunidade"){
										echo "bg-info";
									}
									echo ' text-white shadow">
									<div class="card-body">';
                            echo ("<tr><td>");
                            echo($linha['tipo']);
                            echo("</td><br><td>");
                            echo($linha['mensagem']);
                            echo("</td><br><td>");
                            echo "</br>";
                            echo($linha['data']);
                            echo("</td><br></tr>");
                           ?>
						   </div>
						   </div>
						   </div>
						   <?php
						    }
						?>
					  </div>
					  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<?php
                           $sql = "SELECT * from tbaviso where tipo='Avisos' ORDER BY data DESC LIMIT 5;";
                            $stmt= Conecta::abrirConexao()->prepare($sql); 
                            $stmt->execute();
                            $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ( $linhas as $linha ) {
                              ?>
                              <div class="col-lg-9 mb-3">
                                <div class="card bg-warning text-white shadow">
                                  <div class="card-body">
                            <?php    
                            echo ("<tr><td>");
                            echo($linha['mensagem']);
                            echo("</td><br><td>");
                            echo "</br>";
                            echo($linha['data']);
                            echo("</td><br></tr>");
                           ?>
                           </div> 
                          </div>
                          </div> 
                          <?php  
                          }
                        ?>  
						</div>
					  
					  <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
						<?php
                           $sql = "SELECT * from tbaviso where tipo='Oportunidade' ORDER BY data DESC LIMIT 5;";
                            $stmt= Conecta::abrirConexao()->prepare($sql); 
                            $stmt->execute();
                            $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ( $linhas as $linha ) {
                              ?>
                              <div class="col-lg-9 mb-3">
                                <div class="card bg-info text-white shadow">
                                  <div class="card-body">
                            <?php    
                            echo ("<tr><td>");
                            echo($linha['mensagem']);
                            echo("</td><br><td>");
                            echo "</br>";
                            echo($linha['data']);
                            echo("</td><br></tr>");
                           ?>
                           </div> 
                          </div>
                          </div> 
                          <?php  
                          }
                        ?> 
					  </div>
					</div>
								
                <!-- Card Body -->
               
              </div>
			  </div>
            </div>
				<!-- Div da mensagem  -->
            <div class="col-xl-4 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-left justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary" >Arquivos</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
					<?php
					//prepara o SQL para listar usuários
					$sql = "SELECT * FROM tbarquivos;";
					$stmt = Conecta::abrirConexao()->prepare($sql);
					$stmt->execute();
					//percorre por todos os registros encontrados e armazena num array
					$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ( $linhas as $linha ) {
							echo '<a href="'.$linha['nome_arquivo'].'" download>'.$linha['nome_arquivo'].'</a><br>';
						}
					
					?>
				</div>
            </div>
          </div>
            
          <!-- Content Row -->         
        
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

<?php
	include 'rodape.php';
?>