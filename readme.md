## Primeiro Passo

```
git clone https://github.com/lmachadosantos/teste_mobly.git
composer install
```

##Configurar banco de dados
Abra o arquivo .env.example e altere os dados para o seu banco de dados
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mobly
DB_USERNAME=root
DB_PASSWORD=123456
```
Apos fazer a alteração faça uma copia do mesmo sem nome somente a extensão '.env'

## Segundo Passo

```
php artisan migrate
```

## Terceiro Passo

```
php artisan db:seed
```

## Executar Projeto

```
php artisan serve
```