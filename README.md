# cuboconnect
 
## Para inicializar o projeto, será necessário seguir as demais instruções a seguir:

1. Copiar o arquivo .env.example para o .env
    - Mudar a variável **APP_DEBUG** para **true**, caso esteja em ambiente de desenvolvimento e para ambiente de produção, aplicar **false**

2. rodar o comando: **composer install**

3. Caso não conheça uma chave da aplicação, rodar o seguinte comando: **php artisan key:generate**

4. Realizar instalação do npm através do comando: **npm install** e após a finalização do mesmo rodar **npm run production** para criação dos arquivos css e js

5. Será necessário criar uma instância de banco de dados e setar as credenciais no .env

6. Rodar o comando **php artisan migrate** , afins de criar as tabelas do projeto.

7. Na sequência, rodar a seed para criação dos tipos de situação: **php artisan db:seed --class=SeedSituation**

8. Caso queira criar dados fakes na base basta rodar o comando: **php artisan db:seed --class=UsersFakeSeed**

9. Para rodar o projeto localmente: **php artisan serve**


## LOGS
1. Para acessar a sessão de logs de erros gerados pela aplicação durante a fase de desenvolvimento, é possível acessar a rota: **/logs**