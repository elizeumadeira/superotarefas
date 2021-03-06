## Instalação
Instalação das dependencias
```sh
composer install
```

## Criar Arquivo de configuração
```sh
cp .env.example .env
```
Abrir o arquivo .env e inserir as credenciais do banco de dados
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

## Criar a chave
```sh
php artisan key:generate
```

## Criação banco de dados 
```sh
php artisan migrate:reset
php artisan migrate
```

## Listar as rotas
```sh
php artisan route:list
```

| Method| URI | Name| Action | Middleware |
| --- | --- | --- | --- | --- |
| GET/HEAD | tarefas | tarefas.index | App\Http\Controllers\TarefasController@index | web|
| POST | tarefas | tarefas.store | App\Http\Controllers\TarefasController@store | web|
| GET/HEAD | tarefas/create| tarefas.create| App\Http\Controllers\TarefasController@create| web|
| GET/HEAD | tarefas/{tarefa}| tarefas.show| App\Http\Controllers\TarefasController@show| web|
| PUT/PATCH | tarefas/{tarefa}| tarefas.update| App\Http\Controllers\TarefasController@update| web|
| DELETE | tarefas/{tarefa}| tarefas.destroy | App\Http\Controllers\TarefasController@destroy | web|
| GET/HEAD | tarefas/{tarefa}/edit | tarefas.edit| App\Http\Controllers\TarefasController@edit| web|

## Testar o Projeto (http://localhost:8000)
```sh
php artisan serve
```
