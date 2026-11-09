# NovaLens Store

Loja online escolar de **capas, acessórios e câmaras**, construída com Laravel 12, Blade, Tailwind CSS e SQLite.

## O que está implementado
- Página inicial responsiva, pesquisa e filtro por categoria
- Seis produtos de exemplo e imagens SVG locais
- Página individual de produto
- Registo, login e logout com limitação de tentativas de login
- Carrinho de compras com atualização e remoção
- Checkout demonstrativo com validação de stock e transação na base de dados
- Histórico de encomendas do cliente
- Área reservada a administradores: CRUD de produtos e gestão do estado das encomendas
- Testes funcionais e workflow do GitHub Actions

## Instalação no Windows
Requer **PHP 8.2+**, **Composer** e as extensões PHP `pdo_sqlite`, `mbstring`, `openssl` e `fileinfo`.

1. Faz o clone do repositório:
   ```powershell
   git clone https://github.com/pzqcqsd7z4-del/novalens-store.git
   cd novalens-store
   ```
2. Executa:
   ```powershell
   powershell -ExecutionPolicy Bypass -File .\INSTALAR-WINDOWS.ps1
   ```
   O script cria uma pasta irmã chamada `novalens-laravel` com uma instalação completa do Laravel e os ficheiros da loja.
3. Inicia o servidor:
   ```powershell
   cd ..\novalens-laravel
   php artisan serve
   ```
4. Visita **http://127.0.0.1:8000**.

Para instalar em Linux, consulta `INSTALAR-LINUX.sh`.

## Tornar uma conta administradora
Regista uma conta e no terminal da pasta `novalens-laravel` executa:
```powershell
php artisan tinker
```
No Tinker:
```php
$user = \App\Models\User::where('email', 'teu@email.pt')->firstOrFail();
$user->is_admin = true;
$user->save();
```
Volta a iniciar sessão e abre `/admin/produtos` ou `/admin/encomendas`.

## Testes
Na pasta `novalens-laravel`:
```powershell
php artisan test
```
O repositório inclui também um workflow em `.github/workflows/laravel-tests.yml`.

## Plano de aulas
Ver [PLANO-15-AULAS.md](PLANO-15-AULAS.md).

## Avisos
**Projeto de demonstração.** Não processa pagamentos reais. Os produtos, preços e imagens são exemplos fictícios. Não publiques ficheiros `.env` ou credenciais e não coloques a loja em produção sem rever segurança, privacidade, configurações HTTPS, sistema de pagamentos e obrigações legais.

**Nota técnica:** este repositório contém o código específico da loja, não o código-base completo do Laravel. O instalador obtém esse código-base através do Composer.

## Corrigir avisos Deprecated no PHP 8.5
Se aparecer `PDO::MYSQL_ATTR_SSL_CA is deprecated`, executa na pasta `novalens-store`:
```powershell
git pull
powershell -ExecutionPolicy Bypass -File .\CORRIGIR-PHP85.ps1
```
O script cria uma cópia de segurança de `novalens-laravel/config/database.php`, substitui a constante por uma expressão compatível com PHP 8.2–8.5 e limpa a cache. Reinicia o servidor Laravel depois da correção.
