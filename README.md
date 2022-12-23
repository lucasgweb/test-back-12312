# Desafio Supera Inovação e Tecnologia

O desafio consiste em construir uma pagina web onde os usuários possam fazer o cadastro/login, gerenciar seus veículos e as manutenções.

### Highlights

- Login e Cadastro.
- Confirmação de email.(Manual)
- Recuperação de senha.(Manual)
- Pagina home consumindo uma api para exibir as manutenções para os proximos 7 dias.
- Crud de veículos com seleção do veículo via API https://parallelum.com.br/fipe.
- Crud de manutençôes com duas tabelas, manutenções futuras e historico de todas as manutenções.
- Todos os cruds foram criados usando a tecnologia **livewire**

Link do projeto hospedado:  https://supera.lucasweb.me/

## Uso

Por padrão só é criado um unico usuario

Email
>test@example.com

Senha
>password

## Installation

## Utilização
Pode clonar este repositório OU baixar o .zip

Ao descompactar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.

Vá até à pasta do projeto, pelo *prompt/terminal* e execute:
> composer install

> npm install 

Depois é só aguardar.

## Configuração

Ainda na pasta root renomeie o arquivo .env.example para .env
>cp .env.example .env

Crie um banco de dados e configure as variaveis de ambiente.

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=supera
DB_USERNAME=root
DB_PASSWORD=
```

Execute as migrations do projeto
>php artisan migrate:fresh

Execute os seedes para popular o banco de dados
>php artisan db:seed

Gere uma nova key para o projeto
>php artisan key:generate

## Executando o projeto

Execute o servidor do laravel
>php artisan serve

Execute o npm
>npm run dev

## License

The MIT License (MIT). Please see [License File](https://github.com/lucasgweb/framework/blob/master/LICENSE) for more information.
