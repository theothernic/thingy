#! /usr/bin/env bash

#20191106, nbarr: attempting to get this script's location.
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
cd ${SCRIPT_DIR}

#20180713, nbarr: created this file to be run in -any- env.
source ./.env

php artisan down
npm install
npm run production
php artisan migrate --force

# 20180907, nbarr: disabling this because it's creating
#  too many DB entries.
# 20180905, nbarr: running passport installer
#if [ ! -f ".passport-installed" ]; then
#  php artisan passport:install;
#  touch .passport-intalled;
#fi

# 20180829, nbarr: turning off the bootstrap action.
# php artisan app:bootstrap
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:clear
php artisan up
