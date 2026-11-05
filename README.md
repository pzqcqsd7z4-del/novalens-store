# NovaLens Store

Loja escolar de **capas, acessórios e câmaras**, com Laravel 12, Blade, Tailwind CSS (CDN) e SQLite.

## Instalação (Windows)
Requer PHP 8.2+, Composer e extensão pdo_sqlite. Faz clone deste repositório e executa o instalador:
```powershell
powershell -ExecutionPolicy Bypass -File .\INSTALAR-WINDOWS.ps1
```
O script cria uma pasta irmã `novalens-laravel` com o Laravel e aplica os ficheiros da loja. Depois:
```powershell
cd ..\novalens-laravel
php artisan serve
```
Abre http://127.0.0.1:8000.

## Funcionalidades
Catálogo e pesquisa; categorias; página de produto; registo e login; gestão privada de produtos; carrinho em sessão; checkout demonstrativo; encomendas na base de dados; stock; validação e CSRF.

## Administrador
Regista uma conta, abre `php artisan tinker` e executa:
```php
$user = \App\Models\User::where('email','teu@email.pt')->firstOrFail();
$user->is_admin = true;
$user->save();
```
Depois inicia sessão novamente e visita `/admin/produtos`.

**Aviso:** Não realiza pagamentos reais e não está preparado para produção. Nunca publiques .env, passwords ou dados reais.
