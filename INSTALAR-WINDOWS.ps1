$ErrorActionPreference = 'Stop'
if (-not (Get-Command composer -ErrorAction SilentlyContinue)) { throw 'Instala PHP e Composer primeiro.' }
$origin = $PSScriptRoot
$parent = Split-Path -Parent $origin
$target = Join-Path $parent 'novalens-laravel'
if (Test-Path $target) { throw 'A pasta novalens-laravel ja existe.' }
composer create-project laravel/laravel $target '^12.0'
if ($LASTEXITCODE -ne 0) { throw 'Falhou a instalacao do Laravel.' }
Get-ChildItem -Force $origin | Where-Object { $_.Name -notin @('INSTALAR-WINDOWS.ps1','README.md','.git') } | ForEach-Object { Copy-Item $_.FullName -Destination $target -Recurse -Force }
& (Join-Path $origin 'CORRIGIR-PHP85.ps1')
Set-Location $target
if (-not (Test-Path .env)) { Copy-Item .env.example .env }
php artisan key:generate
New-Item -ItemType File -Force -Path database/database.sqlite | Out-Null
php artisan migrate --seed
Write-Host 'Pronto! Executa: cd novalens-laravel; php artisan serve'
