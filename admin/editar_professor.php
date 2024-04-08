<?php 
	include 'cabecalho.php';
	$idprofessor = $_GET['idprofessor'];
	$cadastro= isset($_REQUEST['cadastro']) ? $_REQUEST['cadastro'] : '1'; 
	require_once "../classes/conecta.class.php";
	$sql = "SELECT * FROM tbprofessor WHERE idprofessor=$idprofessor ORDER BY nome_completo;";
	$stmt = Conecta::abrirConexao()->prepare($sql);
	$stmt->execute();
	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);	
	foreach ( $linhas as $linha ) {
	}
	if($cadastro=="ok"){
							echo  "<script language=javascript>alert( 'Dados alterados com sucesso!' );</script>";
						}
	if($cadastro=="erro"){
							echo  "<script language=javascript>alert( 'Erro ao alterar os dados!');</script>";
						}						
	?>		
	
	<div class="container-fluid"><br>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary">Editar cadastro do Professor: <?php echo $linha['nome_completo'];?></h4>
			</div>
			<div class="card-body">
			<form method="POST" action="edita_professor.php?idprofessor=<?php echo $linha['idprofessor'];?>">
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <label>Nome Completo</label>
				  <input type="text" class="form-control" id="nome_completo" value="<?php echo $linha['nome_completo'];?>" name="nome_completo">
				</div>
				<div class="form-group col-md-2">
				  <label>CPF</label>
				  <input type="text" class="form-control cpf-mask" id="cpf" value="<?php echo $linha['cpf'];?>" name="cpf">
				</div>
				<div class="form-group col-md-2">
				  <label>RG</label>
				  <input type="text" class="form-control" id="rg" value="<?php echo $linha['rg'];?>" name="rg">
				</div>
				<div class="form-group col-md-2">
				  <label>MASP</label>
				  <input type="text" class="form-control" id="rg" value="<?php echo $linha['masp'];?>" name="masp">
				</div>
			  </div>
			  <div class="form-row">
					<div class="form-group col-md-4">
					  <label>Logradouro</label>
					  <input type="text" class="form-control" id="logradouro" value="<?php echo $linha['logradouro'];?>" name="logradouro">
					</div>
					<div class="form-group col-md-1">
					  <label>Número</label>
					  <input type="text" class="form-control " id="numero" value="<?php echo $linha['numero'];?>" name="numero">
					</div>
					<div class="form-group col-md-1">
					  <label>Complem.</label>
					  <input type="text" class="form-control" id="complemento" value="<?php echo $linha['complemento'];?>" name="complemento">
					</div>
					 <div class="form-group col-md-2">
					  <label>Bairro</label>
					  <input type="text" class="form-control" id="bairro" value="<?php echo $linha['bairro'];?>" name="bairro">
					</div>
					<div class="form-group col-md-2">
					  <label>Cidade</label>
					  <input type="text" class="form-control" id="cidade" value="<?php echo $linha['cidade'];?>" name="cidade">
					</div>
					<div class="form-group col-md-2">
					  <label>Estado</label>
					  <select id="inputState" class="form-control" name="uf">
						<option selected><?php echo $linha['estado'];?></option>
						<option>SP</option>
						<option>RJ</option>
						<option>MG</option>
						<option>PR</option>
						<option>GO</option>
						<option>SC</option>
						<option>RS</option>
						<option>DF</option>
						<option>ES</option>
						<option>BA</option>
						<option>SE</option>
						<option>PB</option>
						<option>AM</option>
						<option>AC</option>
						<option>AL</option>
						<option>PI</option>
						<option>RN</option>
						<option>CE</option>
						<option>PA</option>
						<option>MA</option>
						<option>TO</option>
						<option>RR</option>
						<option>RO</option>
						<option>MT</option>
						<option>AM</option>
					  </select>
					</div>
			 </div>	
			 <div class="form-row">
			 	  <div class="form-group col-md-4">
					  <label>Formação</label>
					  <input type="text" class="form-control" id="telefone" value="<?php echo $linha['formacao'];?>" name="formacao">
					</div>
				  <div class="form-group col-md-2">
					  <label>Telefone</label>
					  <input type="text" class="form-control phone-ddd-mask" id="telefone" value="<?php echo $linha['telefone'];?>" name="telefone">
					</div>
					<div class="form-group col-md-2">
					  <label>Telefone de Recado</label>
					  <input type="text" class="form-control phone-ddd-mask" id="telefone_recado" value="<?php echo $linha['telefone_recado'];?>" name="telefone_recado">
					</div>
					<div class="form-group col-md-2">
					  <label>E-mail</label>
					  <input type="email" class="form-control" id="email" value="<?php echo $linha['email'];?>" name="email">
					</div>
					<div class="form-group col-md-2">
					  <label>E-mail Alternativo</label>
					  <input type="email" class="form-control" id="email_alternativo" value="<?php echo $linha['email_alternativo'];?>" name="email_alternativo">
					</div>					
			  </div>		
			  <button type="submit" class="btn btn-primary">Editar Cadastro</button>				  
			</form>
			</div>
		</div>
	</div>

<?php
	include 'rodape.php';
?>