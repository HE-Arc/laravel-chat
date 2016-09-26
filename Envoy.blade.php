@servers(['web' => 'admin'])

@task('deploy')
    cd /var/www/html
    git pull origin master
@endtask
