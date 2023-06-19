#
# Author: Raul Perusquia <raul@inikoo.com>
# Created: Mon, 19 Jun 2023 08:36:16 Malaysia Time, Kuala Lumpur, Malaysia
# Copyright (c) 2023, Raul A Perusquia Flores
#


sudo chgrp -R www-data envs
sudo chmod g+s envs
sudo chmod g+r envs/.env
sudo rm -rf envs/.env.*
sudo chgrp -R www-data envs
sudo chmod g+s envs

sudo chgrp -R www-data storage
sudo chmod g+s storage

php8.2 composer install
npm install
php8.2 artisan migrate:refresh --force
php8.2 artisan db:seed --force
php8.2 artisan create:admin-user aiku 'Aiku' hello@exmaple.com
