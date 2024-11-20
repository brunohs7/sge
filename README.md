# Sistema de Cadastro de Alunos

Este projeto é uma aplicação web para realizar o cadastro de alunos, desenvolvido com o objetivo de facilitar o gerenciamento de informações estudantis. Ele utiliza uma interface responsiva e integrada com a API ViaCEP para preenchimento automático de endereços com base no CEP.

## Funcionalidades

- Cadastro de alunos com campos como:
  - Nome completo, data de nascimento, CPF, RG, matrícula.
  - Endereço completo (logradouro, número, complemento, bairro, cidade, estado, CEP).
  - Informações dos pais ou responsáveis.
  - Contato (telefone, e-mail) e credenciais de acesso (usuário e senha).
- Preenchimento automático do endereço com a API [ViaCEP](https://viacep.com.br/).
- Mensagens de alerta para confirmação de sucesso ou erro no cadastro.

## Tecnologias Utilizadas

- **Frontend:**
  - HTML, CSS, SCSS
  - JavaScript
- **Backend:**
  - PHP
- **Bibliotecas e APIs:**
  - jQuery para manipulação DOM e requisições AJAX.
  - API ViaCEP para consulta de endereços.

## Estrutura do Projeto

- **Arquivos principais:**
  - `cadastrar_aluno.php`: Página principal para o cadastro de alunos.
  - `cabecalho.php` e `rodape.php`: Componentes reutilizáveis para o cabeçalho e rodapé da aplicação.
  - `cadastra_aluno.php`: Arquivo responsável por processar e armazenar os dados do formulário no banco de dados.
- **Recursos:**
  - Máscaras de entrada para CPF, RG, CEP, telefone, etc.
  - Validação e limpeza automática de campos quando necessário.

## Como Usar

1. Clone este repositório em sua máquina local:
   ```bash
   git clone https://github.com/seu_usuario/nome_do_repositorio.git
   ```
2. Certifique-se de que você possui um servidor web com suporte a PHP configurado (como XAMPP ou WAMP).
3. Abra o arquivo cadastrar_aluno.php no navegador através do servidor.
4. Preencha os campos necessários e clique em "Cadastrar".

## Requisitos do Sistema
- Servidor web com PHP (versão 7.4 ou superior).
- Conexão ativa com a internet para o uso da API ViaCEP.

## Observações
- O projeto está em desenvolvimento e pode incluir funcionalidades adicionais no futuro, como autenticação, relatórios e exportação de dados.
- Caso o endereço não seja encontrado, verifique o formato do CEP e tente novamente.

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request com melhorias e sugestões.