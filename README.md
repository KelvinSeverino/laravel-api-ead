# App-Laravel

## ❓ Para que serve?
Este repositorio se trata de um projeto de web desenvolvido em laravel 9 para aprendizado realizado pelo curso de API Laravel EAD da EspecializaTI.

## 💻 Pré-requisitos
Antes de começar, verifique se você atendeu aos seguintes requisitos:
* docker
* docker-compose

## 💻 Arquivos Auxiliares
Caso precise, disponibilizei dois arquivos que montei para utilização e entendimento deste projeto, ambos estão em ./source/laravel/:
* API EAD.postman_collection.json
* Anotacoes_API_EAD.txt

### 💻 Como executar

Baixar repositório
```sh
git clone https://github.com/KelvinSeverino/laravel-api-ead.git
```

Acessar diretório do projeto
```sh
cd laravel-api-ead
```

Acessar diretório do projeto
```sh
cd ./source/laravel
```

Crie o arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```sh
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

Voltar a raiz do projeto
```sh
cd ../../
```

Criar link simbólico para o Docker ter acesso as variaveis de ambiente
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
composer update
```

Gerar key do projeto Laravel
```sh
php artisan key:generate
```

Criar tabelas no Banco de Dados
```sh
php artisan migrate
```

Acessar o terminal Tinker do Laravel
```sh
php artisan tinker
```

Acessar o terminal Tinker do Laravel
```sh
php artisan tinker
```

Criar um usuario de testes
```sh
User::factory()->create();
```

Pegar o email retornado do User criado
```sh
email@example.org
```

Sair do Tinker
```sh
exit
```

Sair do container
```sh
exit
```

Feito os processo acima, você poderá acessar a API pelo link em [http://localhost:8080](http://localhost:8080) e consumir as rotas disponibilizadas no arquivo mencionado no inicio deste README.