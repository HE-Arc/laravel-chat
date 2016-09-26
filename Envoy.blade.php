@servers(['web' => 'admin'])

@task('deploy')
    cd /var/www/laravel-chat
    git pull origin master
    composer install
    php artisan migrate --no-interaction --force
@endtask
