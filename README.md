# README – Gerador de Currículos em PHP

Este projeto faz parte da atividade prática da disciplina de Desenvolvimento Web.
O objetivo é desenvolver uma aplicação que permita ao usuário preencher um formulário com suas informações pessoais, experiências profissionais, formação e referências, e gerar automaticamente um currículo formatado em outra página.

## Tecnologias utilizadas
- PHP para o processamento dos dados e geração do currículo
- HTML e CSS para a estrutura e organização das páginas
- Bootstrap 5 para melhorar a aparência, responsividade e disposição dos elementos
- JavaScript e jQuery para criar campos dinâmicos e calcular automaticamente a idade
- XAMPP como servidor local
- Git e GitHub para controle de versão

## Funcionalidades
- Formulário dividido em seções: dados pessoais, experiência profissional, formação e referências
- Cálculo automático da idade a partir da data de nascimento
- Botões para adicionar e remover campos dinamicamente
- Geração de currículo em uma nova página com os dados enviados pelo formulário
- Opção de imprimir ou salvar o currículo em PDF utilizando window.print()
- Layout responsivo com uso do Bootstrap
- Navegação simples com menu no topo das páginas

## Como executar o projeto
1. Instale e abra o XAMPP.
2. Coloque a pasta do projeto dentro do diretório:
   C:\xampp\htdocs\
3. Inicie o módulo Apache no painel do XAMPP.
4. Acesse no navegador:
   http://localhost/nomedapasta/

## Estrutura do projeto
index.php → Tela principal com o formulário
process.php → Página que gera o currículo
assets/css/styles.css → Arquivo de estilos
assets/js/app.js → Funções de JavaScript e jQuery
assets/img/ → Imagens opcionais
README.md → Descrição do projeto

## Protótipos das telas
Os protótipos das telas foram criados no Figma e incluem:
- Tela do formulário
- Tela do currículo gerado
Os arquivos foram exportados em PDF para envio junto à atividade.

## Observações finais
O projeto cumpre todos os requisitos da atividade, incluindo o uso de PHP, HTML, CSS, Bootstrap, JavaScript, jQuery, manipulação de arrays, criação de campos dinâmicos, geração de currículo e versionamento com Git e GitHub.
