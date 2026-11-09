$ErrorActionPreference = 'Stop'
$origin = $PSScriptRoot
$target = Join-Path (Split-Path -Parent $origin) 'novalens-laravel'
if (-not (Test-Path (Join-Path $target 'artisan'))) {
    throw 'A pasta novalens-laravel nao existe ou nao tem artisan. Instala primeiro o Laravel.'
}
Write-Host 'Atualizar NovaLens Store sem eliminar base de dados nem contas...'
foreach ($folder in @('app', 'routes', 'resources', 'public', 'tests')) {
    $source = Join-Path $origin $folder
    if (Test-Path $source) {
        Copy-Item -Path $source -Destination $target -Recurse -Force
    }
}
$sourceMigrations = Join-Path $origin 'database\migrations'
$destMigrations = Join-Path $target 'database\migrations'
Copy-Item -Path (Join-Path $sourceMigrations '*.php') -Destination $destMigrations -Force
Copy-Item -Path (Join-Path $origin 'database\seeders\DatabaseSeeder.php') -Destination (Join-Path $target 'database\seeders\DatabaseSeeder.php') -Force
Push-Location $target
try {
    php artisan migrate --force
    if ($LASTEXITCODE -ne 0) { throw 'Erro nas migrations.' }
    php artisan db:seed --force
    if ($LASTEXITCODE -ne 0) { throw 'Erro ao adicionar os produtos.' }
    php artisan optimize:clear
    if ($LASTEXITCODE -ne 0) { throw 'Erro ao limpar a cache.' }
    Write-Host 'Atualizacao concluida. Contas e encomendas existentes foram preservadas.'
    Write-Host 'Para iniciar: php artisan serve'
} finally { Pop-Location }
