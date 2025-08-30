# Laravel StartKit UNESC

Um starter kit completo para desenvolvimento Laravel com Livewire, Alpine.js, TailwindCSS e DaisyUI, desenvolvido pela equipe UNESC.

## 🚀 Tecnologias

- **Backend:** Laravel 12.18.0+
- **Frontend:** Livewire (incluído no Laravel 12)
- **Styling:** TailwindCSS 4.0.14, Vite 6.2.2
- **Testing:** Pest 4.0, Larastan 3.4.2
- **Database:** SQLite (padrão), MySQL, PostgreSQL
- **Code Quality:** Laravel Pint, Rector, Peck

## 📋 Pré-requisitos

### Extensões PHP necessárias

Certifique-se de ter as seguintes extensões PHP instaladas:

```bash
# Extensões essenciais
sudo apt update
sudo apt install php-sqlite3 php-intl php-pcov

# Verificar extensões instaladas
php -m | grep -E "(sqlite|intl|pcov)"
```

### Extensões PHP recomendadas

```bash
# Para funcionalidades adicionais
sudo apt install php-mbstring php-xml php-curl php-zip php-gd
```

### Versões mínimas

- **PHP:** 8.4+
- **Composer:** 2.0+
- **Node.js:** 18+
- **NPM:** 8+

## 🛠️ Instalação

### 1. Clonar o repositório

```bash
git clone https://github.com/unesc/laravel-startkit-unesc.git
cd laravel-startkit-unesc
```

### 2. Instalar dependências PHP

```bash
composer install
```

### 3. Instalar dependências Node.js

```bash
npm install
```

### 4. Configurar ambiente

```bash
# Copiar arquivo de ambiente
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate
```

### 5. Configurar banco de dados

O projeto está configurado para usar **SQLite** por padrão. Para usar:

```bash
# Criar arquivo de banco SQLite
touch database/database.sqlite

# Executar migrações
php artisan migrate

# Executar seeders (se disponíveis)
php artisan db:seed
```

**Alternativa - MySQL/PostgreSQL:**

Edite o arquivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_startkit
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Compilar assets

```bash
# Desenvolvimento
npm run dev

# Produção
npm run build
```

### 7. Scripts de desenvolvimento úteis

```bash
# Setup completo do projeto
composer run setup

# Desenvolvimento com todos os serviços (Laravel + Queue + Logs + Vite)
composer run dev

# Linting e formatação
composer run lint

# Refatoração de código
composer run refactor
```

### 7. Scripts de desenvolvimento úteis

```bash
# Setup completo do projeto
composer run setup

# Desenvolvimento com todos os serviços (Laravel + Queue + Logs + Vite)
composer run dev

# Linting e formatação
composer run lint

# Refatoração de código
composer run refactor
```

## 🚀 Executando o projeto

### Opção 1: Comando único (recomendado)

```bash
# Executa todos os serviços em paralelo
composer run dev
```

Este comando executa automaticamente:
- **Servidor Laravel** (http://localhost:8000)
- **Queue Worker** (processamento de filas)
- **Pail** (visualizador de logs em tempo real)
- **Vite** (hot reload para assets)

### Opção 2: Comandos separados

```bash
# Terminal 1: Servidor Laravel
php artisan serve

# Terminal 2: Vite (hot reload)
npm run dev

# Terminal 3: Queue Worker (opcional)
php artisan queue:listen --tries=1

# Terminal 4: Visualizador de logs (opcional)
php artisan pail --timeout=0
```

### Acessar a aplicação

- **URL:** http://localhost:8000
- **Admin:** http://localhost:8000/admin (se configurado)

## 🧪 Executando testes

### Testes básicos

```bash
# Executar TODOS os testes e verificações
composer run test

# Executar com Pest diretamente
./vendor/bin/pest

# Executar testes específicos
composer run test:unit      # Testes unitários com cobertura 100%
composer run test:types     # Verificação de tipos com Larastan
composer run test:typos     # Verificação de ortografia com Peck
composer run test:lint      # Linting e formatação com Pint
composer run test:refactor  # Verificação de refatoração com Rector
```

### Testes com cobertura

```bash
# Com PCOV (recomendado)
./vendor/bin/pest --parallel --coverage

# Com Xdebug
./vendor/bin/pest --parallel --coverage --coverage-html coverage/
```

### Verificação de código

```bash
# Verificação de ortografia
composer run test:typos

# Linting e formatação
composer run test:lint

# Verificação de tipos
composer run test:types

# Refatoração de código
composer run test:refactor

# Build de produção
npm run build
```

### Comandos Composer disponíveis

```bash
# Desenvolvimento
composer run dev          # Executa todos os serviços
composer run setup        # Setup completo do projeto

# Testes e Qualidade
composer run test         # Executa todos os testes
composer run test:unit    # Testes unitários
composer run test:types   # Verificação de tipos
composer run test:typos   # Verificação de ortografia
composer run test:lint    # Linting e formatação
composer run test:refactor # Verificação de refatoração

# Código
composer run lint         # Formatação e linting
composer run refactor     # Refatoração automática
```

## 📁 Estrutura do projeto

```
laravel-startkit-unesc/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Livewire/
│   ├── Models/
│   └── Services/
├── resources/
│   ├── views/
│   │   ├── components/
│   │   └── livewire/
│   ├── css/
│   └── js/
├── tests/
│   ├── Feature/
│   └── Unit/
├── database/
│   ├── migrations/
│   └── seeders/
└── config/
```

## 🎨 Componentes disponíveis

### Livewire Components
- Componentes reativos e interativos (incluído no Laravel 12)
- Gerenciamento de estado em tempo real
- Validação de formulários

### TailwindCSS + Vite
- TailwindCSS 4.0.14 com sistema de design utilitário
- Vite 6.2.2 para build rápido e hot reload
- Sistema de componentes responsivos

### Ferramentas de Qualidade
- **Laravel Pint:** Formatação automática de código
- **Larastan:** Análise estática de código
- **Rector:** Refatoração automática
- **Peck:** Verificação de ortografia
- **Pest:** Framework de testes moderno

## 🔧 Configurações adicionais

### Cache e otimização

```bash
# Limpar caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Otimizar para produção
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📋 Comandos Composer - Referência Completa

### 🚀 Desenvolvimento
```bash
composer run dev          # Executa todos os serviços em paralelo
composer run setup        # Setup completo: key, db, migrate, seed, build
```

### 🧪 Testes e Qualidade
```bash
composer run test         # Executa TODOS os testes e verificações
composer run test:unit    # Testes unitários com cobertura 100%
composer run test:types   # Verificação de tipos com Larastan
composer run test:typos   # Verificação de ortografia com Peck
composer run test:lint    # Linting e formatação com Pint
composer run test:refactor # Verificação de refatoração com Rector
```

### 🎨 Código e Formatação
```bash
composer run lint         # Formatação automática com Pint
composer run refactor     # Refatoração automática com Rector
```

### 📦 Comandos Artisan úteis
```bash
php artisan serve         # Servidor de desenvolvimento
php artisan queue:listen  # Processamento de filas
php artisan pail          # Visualizador de logs
php artisan migrate       # Executar migrações
php artisan db:seed       # Executar seeders
```

### Logs e debugging

```bash
# Ver logs em tempo real
tail -f storage/logs/laravel.log

# Debug mode
APP_DEBUG=true
```

## 🐛 Solução de problemas

### Erro: "could not find driver (Connection: sqlite)"
```bash
sudo apt install php-sqlite3
```

### Erro: "Class Spoofchecker not found"
```bash
sudo apt install php-intl
```

### Erro: "No code coverage driver is available"
```bash
sudo apt install php-pcov
# ou
sudo apt install php-xdebug
```

### Erro: "aspell: Permission denied"
```bash
sudo apt install aspell aspell-en
```

## 📚 Documentação adicional

- [Laravel 12 Documentation](https://laravel.com/docs/12.x)
- [Livewire Documentation](https://livewire.laravel.com/docs)
- [TailwindCSS 4 Documentation](https://tailwindcss.com/docs)
- [Vite Documentation](https://vitejs.dev/)
- [Pest PHP Documentation](https://pestphp.com/)
- [Laravel Pint Documentation](https://laravel.com/docs/pint)

## 🤝 Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👥 Equipe UNESC

Desenvolvido pela equipe de desenvolvimento da UNESC.

---

**Nota:** Este é um projeto em desenvolvimento ativo. Para suporte ou dúvidas, entre em contato com a equipe de desenvolvimento.
