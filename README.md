# Setup-Docker-Laravel

## ❓ Para que serve?
Este repositorio se trata de uma estrtura para criação de projetos com Docker/Laravel com base no repositório criado originalmente pela EspecializaTI.

## 💻 Pré-requisitos
Antes de começar, verifique se você atendeu aos seguintes requisitos:
* docker
* docker-compose

### 💻 Como executar

Baixar repositório
```sh
git clone https://github.com/KelvinSeverino/setup-docker-laravel.git
```

Acessar diretório do repositorio
```sh
cd setup-docker-laravel/
```

Executar comando composer criar projeto laravel (laravel/laravel ./source/NomeDoProjeto)
```sh
composer -vvv create-project --prefer-dist laravel/laravel ./source/laravel "9.*" --prefer-dist
```

Acessar diretório do projeto
```sh
cd ./source/laravel/
```

Crie o arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```
APP_NAME="Setup LARAVEL"
APP_URL=http://localhost:8080

DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel_project
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
```

Voltar para a raiz da estrutura
```sh
cd ../../
```

Criar Link Simbolico do arquivo .env
```sh
ln -s ./source/laravel/.env .env
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
```

Gerar KEY do Laravel
```sh
php artisan key:generate
```

Sair do container
```sh
exit
```

Trocar timezone do arquivo app.php
```sh
sed -i "s/UTC/America\/\Sao_Paulo/g" ./source/laravel/config/app.php
```

Feito os processo acima, você poderá acessar o sistema pelo link em [http://localhost:8080](http://localhost:8080)