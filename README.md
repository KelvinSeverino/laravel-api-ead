# Laravel-Api-EAD

## ❓ Para que serve?
Este repositorio se trata de um projeto desenvolvido em laravel 9 para aprendizado realizado pelo curso de API Laravel EAD da EspecializaTI.

## 💻 Pré-requisitos
Antes de começar, verifique se você atendeu aos seguintes requisitos:
* docker
* docker-compose
* composer

### 💻 Como executar

Baixar repositório
```sh
git clone https://github.com/KelvinSeverino/laravel-api-ead.git
```

Acessar diretório do projeto
```sh
cd laravel-api-ead
```

Crie o arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```
APP_NAME="API Laravel EAD"
APP_ENV=local
APP_KEY=base64:LF1zuBxkwREoRSEEqDHTIvQamxeAR1t+jBGUloEoCzM=
APP_DEBUG=true
APP_URL=http://localhost:8080
APP_URL_FRONTEND=http://localhost:8080

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=ead
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=redis
FILESYSTEM_DISK=local
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
SESSION_LIFETIME=120

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp-mail.provedor.com
MAIL_PORT=587
MAIL_USERNAME=kelvin@email.com
MAIL_PASSWORD=senha1234"
MAIL_ENCRYPTION=STARTTLS
MAIL_FROM_ADDRESS="kelvin@email.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Iniciar os containers
```sh
docker-compose up -d
```

Acessar o container do projeto
```sh
docker-compose exec app bash
```

Executar comando composer para realizar download de arquivos necessários
```sh
composer install
composer update
```

Gerar key do projeto Laravel
```sh
php artisan key:generate
```

Sair do container
```sh
exit
```

Feito os processo acima, você poderá acessar a API pelo link em [http://localhost:8080](http://localhost:8080)