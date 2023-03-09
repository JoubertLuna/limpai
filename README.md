### Projeto Sistema LARAVEL LIMPAI

Desenvolvido por Joubert Luna

### Instalando o projeto

### Clonar o repositório

....
Aqui
....

### Instalar as dependências

......
composer install
......

Ou em Ambiente de Desenvolvimento

......
composer update
......

### Criar arquivo de configurações de ambiente

Copiar o arquivo de exemplo `.env.example` para `.env` na raiz do projeto
configurar os detalhes da aplicação e conexão com o banco de dados.

### Criar a estrutura no banco de dados

.....
php artisan migrate
.....

### Criar usuário admin

.....
php artisan db:seed
Usuário: Administrador - Limpa ai
email: administrador@limpai.com
senha: @admin123
.....

### Iniciar o Servidor de desenvolvimento

.....
php artisan serve
.....
