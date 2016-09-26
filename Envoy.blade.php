@servers(['web' => 'admin'])

@task('deploy')
    cd /var/www/laravel-chat
    git pull origin master
    composer install
    npm install
    gulp --production
    php artisan migrate --no-interaction --force
@endtask
