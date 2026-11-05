#!/usr/bin/env bash
set -euo pipefail
ORIGIN="$(cd "$(dirname "$0")" && pwd)"
TARGET="$(dirname "$ORIGIN")/novalens-laravel"
command -v composer >/dev/null || { echo "Instala PHP e Composer primeiro."; exit 1; }
test ! -e "$TARGET" || { echo "Pasta novalens-laravel já existe."; exit 1; }
composer create-project laravel/laravel "$TARGET" '^12.0'
cp -R "$ORIGIN"/app "$ORIGIN"/bootstrap "$ORIGIN"/database "$ORIGIN"/resources "$ORIGIN"/routes "$ORIGIN"/tests "$TARGET"/
cp "$ORIGIN"/README.md "$TARGET"/README.md
cd "$TARGET"
test -f .env || cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
echo "Executa: cd '$TARGET' && php artisan serve"
