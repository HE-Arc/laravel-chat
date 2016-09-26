#!/bin/sh

# Fixes the file ownership to match the local user.
# Then starts php-fpm for you.

set -xe

username=laravel
folder=/var/www/html
statfile=${folder}/docker-compose.yml

uid=`stat -c %u ${statfile}`
gid=`stat -c %g ${statfile}`
my_uid=`id -u $username`
my_gid=`id -g $username`

if [ "${uid}" == 1 ]; then
    echo "The folder was mounted as root... cannot deal with it.."
elif [ "${my_uid}" != "${uid}" ]; then
    setfacl -R -m u:${username}:rwx ${folder}
    setfacl -R -m u:${username}:rwx ${folder}
fi

if [ "${gid}" == 1 ]; then
    echo "The folder was mounted as root... cannot deal with it.."
elif [ "${my_gid}" != "${gid}" ]; then
    groupname=`getent group ${gid} | cut -d: -f1`
    setfacl -R -m g:${groupname}:rwx ${folder}
    setfacl -dR -m g:${groupname}:rwx ${folder}
fi

setfacl -R -m u:www-data:rwx -m g:www-data:rwx ${folder}/storage ${folder}/bootstrap/cache

# run php-fpm
exec php-fpm
