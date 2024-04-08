<?php 
	include 'cabecalho.php';
	$cadastro= isset($_REQUEST['cadastro']) ? $_REQUEST['cadastro'] : '1'; 
	if($cadastro=="ok"){
							echo  "<script language=javascript>alert( 'Cadastro realizado com sucesso!' );</script>";
						}
	if($cadastro=="erro"){
							echo  "<script language=javascript>alert( 'Erro ao cadastrar o aluno!');</script>";
						}
	?>	
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
			
	<script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#logradouro").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#inputState").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro").val("Buscando endereço...");
                        $("#bairro").val("Buscando endereço...");
                        $("#cidade").val("Buscando endereço...");
                        $("#inputState").val("Buscando endereço...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#inputState").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
	</head>	
	
			<div class="container-fluid"><br>
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h4 class="m-0 font-weight-bold text-primary">Cadastrar novo Aluno</h4>
					</div>
					<div class="card-body">
						<form method="POST" action="cadastra_aluno.php">
						  <div class="form-row">
							<div class="form-group col-md-4">
							  <label>Nome Completo</label>
							  <input type="text" required="" class="form-control" id="nome_completo" name="nome_completo">
							</div>
							<div class="form-group col-md-2">
							  <label>Data Nasc.</label>
							  <input type="date" required="" class="form-control" id="data_nascimento" name="data_nascimento">
							</div>				
							<div class="form-group col-md-2">
							  <label>CPF</label>
							 <input type="text" required="" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00">
							</div>
							<div class="form-group col-md-2">
							  <label>RG</label>
							  <input type="text" required="" class="form-control rg-mask" placeholder="00.000.000" >
							</div>
							<div class="form-group col-md-2">
							  <label>Matrícula</label>
							  <input type="text" required="" class="form-control" id="matricula_aluno" name="matricula_aluno">
							</div>					
						  </div>
						  <div class="form-row">
								<div class="form-group col-md-3">
								  <label>Logradouro</label>
								  <input type="text" required="" class="form-control" id="logradouro" name="logradouro">
								</div>
								<div class="form-group col-md-1">
								  <label>Número</label>
								  <input type="number" required="" class="form-control" id="numero" name="numero">
								</div>
								<div class="form-group col-md-1">
								  <label>Complem.</label>
								  <input type="text" class="form-control" id="complemento" name="complemento">
								</div>
								 <div class="form-group col-md-2">
								  <label>Bairro</label>
								  <input type="text" required="" class="form-control" id="bairro" name="bairro">
								</div>
								<div class="form-group col-md-2">
								  <label>Cidade</label>
								  <input type="text" required="" class="form-control" id="cidade" name="cidade">
								</div>
								<div class="form-group col-md-1">
								  <label>Estado</label>
								  <select id="inputState"  required="" class="form-control" name="uf">
									<option selected>MG</option>
									<option>SP</option>
									<option>RJ</option>
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
								  <input type="text" required="" class="form-control cep-mask" id="cep" name="cep" placeholder="Ex.: 00000-000">
								</div>					
						  </div>
						  <div class="form-row">
							  <div class="form-group col-md-6">
								  <label>Nome da Mãe</label>
								  <input type="text" required="" class="form-control" id="nome_da_mae" name="nome_da_mae">
								</div>
								<div class="form-group col-md-6">
								  <label>Nome do Pai</label>
								  <input type="text" required="" class="form-control" id="nome_do_pai" name="nome_do_pai">
								</div>
						  </div>
						  <div class="form-row">
							  <div class="form-group col-md-2">
								  <label>Telefone</label>
								  <input type="text" required="" class="form-control phone-ddd-mask" id="telefone" name="telefone">
								</div>
								<div class="form-group col-md-2">
								  <label>Telefone de Recado</label>
								  <input type="text" class="form-control phone-ddd-mask" id="telefone_recado" name="telefone_recado">
								</div>
								<div class="form-group col-md-2">
								  <label>E-mail</label>
								  <input type="email" required="" class="form-control" id="email" name="email">
								</div>
								<div class="form-group col-md-2">
								  <label>E-mail Alternativo</label>
								  <input type="email" class="form-control" id="email_alternativo" name="email_alternativo">
								</div>
								<div class="form-group col-md-2">
								  <label>Usuário</label>
								  <input type="text" required="" class="form-control" id="usuario" name="usuario">
								</div>
								<div class="form-group col-md-2">
								  <label>Senha</label>
								  <input type="password" required="" class="form-control" id="senha" name="senha">
								</div>					
					  </div>
					  <button type="submit" class="btn btn-primary">Cadastrar</button>
					</form>
				</div>
			</div>
		</div>
<?php
	include 'rodape.php';
?>