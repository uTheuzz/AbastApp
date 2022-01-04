# AbastApp

Complete gasoline supply system, where it is possible to register vehicles, users and record gasoline expenses, informing the value, quantity and location. It is also possible to view the complete report by user of records and expenses.

Sistema de abastecimento de gasolina completo, onde é possível cadastrar veículos, usuários e registrar os gastos com gasolina, informando o valor, quantidade e local. Também é possível visualizar relatório completo por usuário dos registros e gastos.

System integrated with Google Maps API. - Sistema integrado com Google Maps API.

# Technologies - Tecnologias

- PHP Laravel
- JavaScript
- JQuery + Ajax
- Bootstrap
- Docker

# Installation process - Processo de instalação

1 - Clone the project into your environment - Clone o projeto em seu ambiente
	
    git clone https://github.com/uTheuzz/AbastApp.git

2 - Create the .env file according to the .env-example file (You can copy and paste) - Crie o arquivo .env de acordo com o arquivo .env-example (Pode copiar e colar)

2 - Navigate to the 'laradock' folder under 'AbastApp\laradock' - Navegue até a pasta 'laradock' em 'AbastApp\laradock'

3 - Start containers - Inicie os containers

	Windows: docker-compose up -d nginx mysql phpmyadmin
	Linux: sudo docker-compose up -d nginx mysql phpmyadmin

4 - Run migrations to generate the database - Rode as migrations para gerar o banco de dados

	Windows: docker-compose exec workspace php artisan migrate --seed
	Linux: sudo docker-compose exec workspace php artisan migrate --seed

5 - Access - Acesse http://localhost:8888
    
	User: admin@gmail.com
    Password: admin123

# Important informations - Informações importantes

DATA_PATH_HOST=~/.laradock/data

PHP_VERSION=8.0

NGINX_HOST_HTTP_PORT=8888

NGINX_HOST_HTTPS_PORT=543

MYSQL_PORT=8306

PMA_PORT=8081

WORKSPACE_SSH_PORT=9999

# Below are some pages of the system - Segue abaixo algumas páginas do sistema

Login Page - Página de Login
![Login](https://user-images.githubusercontent.com/72555652/146845923-63401ca0-eba9-4de8-b6c6-817e0b98a85d.png)

Register Page - Página de Registro
![Registro](https://user-images.githubusercontent.com/72555652/146858682-ff469237-d27a-46d2-9bff-6e4ecdf44813.png)

Dashboard Home Page - Página Inicial Dashboard
![Pagina Inicial - Dashboard](https://user-images.githubusercontent.com/72555652/146858758-383b3f52-f03f-4b9d-b277-03901b841ead.png)

User Registration and Listing - Cadastro e Listagem de Usuários
![Cadastro e Listagem de Usuários](https://user-images.githubusercontent.com/72555652/146858844-666f3da7-e330-4585-9706-45aaae293a80.png)

Vehicle Registration and Listing - Cadastro e Listagem de Veículos
![Cadastro e Listagem de Veículos](https://user-images.githubusercontent.com/72555652/146858909-2a4289d8-0c6d-4e1c-bda9-f66c99b7d598.png)

Bootstrap paging example - Bootstrap exemplo de paginação
![Paginação](https://user-images.githubusercontent.com/72555652/146859006-b8356930-fcb9-4fd4-bf82-a4fc258d9372.png)

