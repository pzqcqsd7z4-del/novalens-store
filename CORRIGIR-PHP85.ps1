$ErrorActionPreference = 'Stop'
$target = Join-Path (Split-Path -Parent $PSScriptRoot) 'novalens-laravel'
$config = Join-Path $target 'config\database.php'

if (-not (Test-Path -LiteralPath $config)) {
    throw "Nao encontrei o ficheiro: $config. Confirma que o Laravel esta instalado na pasta novalens-laravel."
}

$original = [System.IO.File]::ReadAllText($config)
if ($original.Contains('Pdo\Mysql::ATTR_SSL_CA')) {
    Write-Host 'A compatibilidade com PHP 8.4/8.5 ja esta corrigida.'
} else {
    $pattern = '\\?PDO::MYSQL_ATTR_SSL_CA'
    $replacement = '(PHP_VERSION_ID >= 80400 ? \Pdo\Mysql::ATTR_SSL_CA : \PDO::MYSQL_ATTR_SSL_CA)'
    $patched = [System.Text.RegularExpressions.Regex]::Replace($original, $pattern, $replacement)
    if ($patched -eq $original) {
        Write-Host 'A constante antiga nao foi encontrada. Sem alteracoes.'
    } else {
        Copy-Item -LiteralPath $config -Destination "$config.bak" -Force
        $utf8NoBom = New-Object System.Text.UTF8Encoding($false)
        [System.IO.File]::WriteAllText($config, $patched, $utf8NoBom)
        Write-Host 'Ficheiro config/database.php corrigido. Copia de seguranca: config/database.php.bak'
    }
}
Push-Location $target
try {
    php artisan config:clear
    if ($LASTEXITCODE -ne 0) { throw 'Falha em config:clear' }
    php artisan view:clear
    if ($LASTEXITCODE -ne 0) { throw 'Falha em view:clear' }
    Write-Host 'Concluido. Reinicia o servidor Laravel (Ctrl+C e php artisan serve).'
} finally { Pop-Location }
