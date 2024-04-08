<?php 
	include 'cabecalho.php';
	$idaluno = $_SESSION['idaluno'];
	$cadastro= isset($_REQUEST['cadastro']) ? $_REQUEST['cadastro'] : '1'; 
	require_once "../classes/conecta.class.php";

	$sql = "SELECT * FROM tbaluno WHERE idaluno=$idaluno ORDER BY nome_completo;";
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
				<h4 class="m-0 font-weight-bold text-primary">Meus Dados</h4>
			</div>
			<div class="card-body">
			  <div class="form-row">
				<div class="form-group col-md-4">
				  <label>Nome Completo</label>
				  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['nome_completo'];?>"  disabled="">
				</div>
				<div class="form-group col-md-2">
				  <label>Data Nasc.</label>
				  <input type="date" class="form-control" id="disabledInput" value="<?php echo $linha['data_nascimento'];?>" disabled="">
				</div>				
				<div class="form-group col-md-2">
				  <label>CPF</label>
				  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['cpf'];?>" disabled="">
				</div>
				<div class="form-group col-md-2">
				  <label>RG</label>
				  <input type="text" class="form-control" id="disabledInput"value="<?php echo $linha['rg'];?>" disabled="">
				</div>
				<div class="form-group col-md-2">
				  <label>Matrícula</label>
				  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['matricula_aluno'];?>" disabled="">
				</div>	
			  </div>
			  <div class="form-row">
				  <div class="form-group col-md-6">
					  <label>Nome da Mãe</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['nome_da_mae'];?>" disabled="">
					</div>
					<div class="form-group col-md-6">
					  <label>Nome do Pai</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['nome_do_pai'];?>" disabled="">
					</div>
			  </div>
			  <div class="form-row">
					<div class="form-group col-md-3">
					  <label>Logradouro</label>
					  <input type="text" class="form-control" id="disabledInput"value="<?php echo $linha['logradouro'];?>" disabled="">
					</div>
					<div class="form-group col-md-1">
					  <label>Número</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['numero'];?>"disabled="">
					</div>
					<div class="form-group col-md-1">
					  <label>Complem.</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['complemento'];?>" disabled="">
					</div>
					 <div class="form-group col-md-2">
					  <label>Bairro</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['bairro'];?>" disabled="">
					</div>
					<div class="form-group col-md-2">
					  <label>Cidade</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['cidade'];?>" disabled="">
					</div>
					<div class="form-group col-md-1">
					  <label>Estado</label>
					  <select id="disabledInput"class="form-control" disabled="">
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
					<div class="form-group col-md-2">
					  <label>CEP</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['cep'];?>" disabled="">
					</div>					
			  </div>
			  
			  <div class="form-row">
				  <div class="form-group col-md-2">
					  <label>Telefone</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['telefone'];?>" disabled="">
					</div>
					<div class="form-group col-md-2">
					  <label>Telefone de Recado</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['telefone_recado'];?>" disabled="">
					</div>
					<div class="form-group col-md-3">
					  <label>E-mail</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['email'];?>" disabled="">
					</div>
					<div class="form-group col-md-3">
					  <label>E-mail Alternativo</label>
					  <input type="text" class="form-control" id="disabledInput" value="<?php echo $linha['email_alternativo'];?>" disabled="">
					</div>			
			  </div>
			</div>
		</div>
	</div>
<?php
	include 'rodape.php';
?>