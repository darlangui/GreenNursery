
# GreenNursery - Projeto de Estudo (Ecommerce de Plantas)

O GreenNursery é um projeto de estudo que simula um ecommerce de plantas. Consiste em duas partes distintas: o front-end desenvolvido com Vue.js e a API RESTful construída utilizando Laravel. Este repositório contém o código-fonte completo para ambas as aplicações.
## Objetivo

O objetivo principal deste projeto é proporcionar uma oportunidade de aprendizado prático, permitindo que os desenvolvedores pratiquem conceitos importantes de desenvolvimento web, como:

    - Desenvolvimento de interfaces interativas com Vue.js.
    - Criação de uma API RESTful utilizando Laravel.
    - Manipulação de dados de um banco de dados em um contexto de ecommerce.
    - Prática de boas práticas de programação, organização de código e padrões de projeto.

## Tecnologias Utilizadas

    - Front-end: Vue.js
    - Back-end: Laravel (API RESTful)
    - Banco de Dados: MySQL ou outro banco de dados compatível com Laravel
    - Gerenciamento de Estado (Front-end): Vuex.
    - Autenticação: JWT (JSON Web Tokens) para autenticação via API.
    - Estilização: CSS3 com possibilidade de frameworks como Bootstrap, Vuetify, etc.
    - Dependências e Gerenciamento de Pacotes: npm (front-end), Composer (back-end)

## Instalação e Uso

### Siga os passos abaixo para configurar e executar o projeto localmente para fins de estudo:
Front-end (Vue.js)

    - Navegue até o diretório do front-end: cd frontend
    - Instale as dependências: npm install
    - Inicie o servidor de desenvolvimento: npm run serve
    - Acesse o front-end no seu navegador: http://localhost:8080

### Back-end (Laravel)

    - Navegue até o diretório do back-end: cd backend
    - Instale as dependências: composer install
    - Crie um arquivo de ambiente: cp .env.example .env
    - Configure o arquivo .env com as informações do banco de dados e outras configurações relevantes
    - Gere a chave de criptografia: php artisan key:generate
    - Crie o link simbólico: php artisan storage:link
    - Execute as migrações do banco de dados: php artisan migrate
    - Inicie o servidor de desenvolvimento: php artisan serve
    - Acesse a API no seu navegador ou cliente API: http://localhost:8000

Lembre-se de configurar corretamente as variáveis de ambiente, como as credenciais do banco de dados, as configurações do JWT e outras configurações específicas do projeto.
## Contribuição ao Aprendizado

Este projeto foi desenvolvido como parte de um exercício de aprendizado. Encorajamos os colaboradores a explorar, experimentar e adaptar o código de acordo com suas necessidades de estudo e compreensão dos conceitos abordados.
## Licença

Este projeto está licenciado sob a Licença MIT, o que significa que você é livre para utilizá-lo para fins de estudo e aprendizado.
#
Esperamos que o GreenNursery proporcione uma valiosa experiência de aprendizado ao simular o desenvolvimento de um ecommerce de plantas. Se tiver alguma dúvida ou feedback, não hesite em explorar e experimentar!
