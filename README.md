# cuboconnect
 
## Para inicializar o projeto, será necessário seguir as demais instruções a seguir:

1. Copiar o arquivo .env.example para o .env
    - Mudar a variável **APP_DEBUG** para **true**, caso esteja em ambiente de desenvolvimento e para ambiente de produção, aplicar **false**

2. rodar o comando: **composer install**

3. Caso não conheça uma chave da aplicação, rodar o seguinte comando: **php artisan key:generate**

4. Realizar instalação do npm através do comando: **npm install** e após a finalização do mesmo rodar **npm run production** para criação dos arquivos css e js

