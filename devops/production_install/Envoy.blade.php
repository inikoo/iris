{{--
//  Author: Raul Perusquia <raul@inikoo.com>
//  Created: Sun, 02 Oct 2022 16:59 Malaysia Time, Kuala Lumpur, Malaysia
//  Copyright (c) 2022, Inikoo
//  Version 4.0
--}}

@include('../../vendor/autoload.php')


@setup
$dotenv = Dotenv\Dotenv::createImmutable('../../envs');
$dotenv->load();
// Sanity checks

if (empty($_ENV['DEPLOYMENT_HOST'])) {
exit('ERROR: DEPLOYMENT_HOST var empty or not defined');
}
$host=$_ENV['DEPLOYMENT_HOST'];

if (empty($_ENV['DEPLOYMENT_USER'])) {
exit('ERROR: DEPLOYMENT_USER var empty or not defined');
}
$user=$_ENV['DEPLOYMENT_USER'];

if (empty($_ENV['DEPLOYMENT_PATH'])) {
exit('ERROR: DEPLOYMENT_PATH var empty or not defined');
}
if(!$env){
    $env='staging';
}

$base_path=$_ENV['DEPLOYMENT_PATH'];
$path=$base_path.'/'.$env;



if (empty($_ENV['PRODUCTION_ADMIN_EMAIL'])) {
exit('ERROR: PRODUCTION_ADMIN_EMAIL var empty or not defined');
}
$adminEmail=$_ENV['PRODUCTION_ADMIN_EMAIL'];

if (empty($_ENV['PRODUCTION_ADMIN_CODE'])) {
exit('ERROR: PRODUCTION_ADMIN_CODE var empty or not defined');
}
$adminCode=$_ENV['PRODUCTION_ADMIN_CODE'];

if (empty($_ENV['PRODUCTION_ADMIN_NANE'])) {
exit('ERROR: PRODUCTION_ADMIN_NANE var empty or not defined');
}
$adminName=$_ENV['PRODUCTION_ADMIN_NANE'];



$date = ( new DateTime )->format('Y-m-d_H_i_s');

$current_release_dir = $path . '/current';
$releases_dir = $path . '/releases';
$repo_dir = $base_path . '/repo';
$new_release_dir = $releases_dir . '/' . $date;


// Command or path to invoke PHP
$php = empty($php) ? 'php8.2' : $php;
$branch = empty($branch) ? 'main' : $branch;

$deployment_key=null;

$skip_build=false;

@endsetup

@servers(['production' => $user.'@'.$host,'localhost' => '127.0.0.1'])

@task('install', ['on' => 'production','confirm' => true])

sudo rm -rf {{ $path }}/envs
sudo rm -rf {{ $path }}/storage

mkdir -p {{ $path }}/envs
sudo chgrp -R www-data {{ $path }}/envs
sudo chmod g+s {{ $path }}/envs
cp {{ $base_path }}/env.{{$env}} {{ $path }}/envs/.env
sudo chmod g+r {{ $path }}/envs/.env
sudo chgrp -R www-data {{ $path }}/envs
sudo chmod g+s {{ $path }}/envs
mkdir -p {{ $new_release_dir }}
mkdir -p {{ $new_release_dir }}/public/

echo "***********************************************************************"
echo "* Pulling repo *"
cd {{$repo_dir}}
git pull origin {{ $branch }}
cp {{$repo_dir}}/devops/production_install/domain.php {{ $path }}
sudo chgrp www-data {{ $path }}/domain.php

cp -R {{$repo_dir}}/storage {{ $path }}
sudo chgrp -R www-data {{ $path }}/storage
sudo chmod g+s {{ $path }}/storage


echo "***********************************************************************"
echo "* moving code from {{ $repo_dir }} to {{ $new_release_dir }} * AAA"
rsync   -rlptgoDPzSlh  --no-p --chmod=g=rwX  --delete  --stats --exclude-from={{ $repo_dir }}/devops/deployment/deployment-exclude-list.txt {{ $repo_dir }}/ {{ $new_release_dir }}
echo "rsync done"

sudo chgrp www-data {{ $new_release_dir }}/bootstrap/cache

rm -f {{ $path }}/envs/.env.*
ln -nsf {{ $path }}/envs {{ $new_release_dir }}/envs
ln -nsf {{ $path }}/storage {{ $new_release_dir }}/storage
ln -nsf {{ $path }}/storage/app/public {{ $new_release_dir }}/public/storage
ln -nsf {{ $path }}/domain.php {{ $new_release_dir }}/config/

echo "***********************************************************************"
echo "* Composer install *"
cd {{$new_release_dir}}
{{$php}}  /usr/local/bin/composer install --no-ansi --no-dev --no-interaction --no-plugins --no-progress --no-scripts --optimize-autoloader --prefer-dist

echo "***********************************************************************"
echo "* NPM install *"
cd {{$new_release_dir}}
npm install

echo "***********************************************************************"
echo "* build VUE *"
cd {{$new_release_dir}}
ln -sf {{ $base_path }}/assets/private/ {{ $new_release_dir }}/resources/
npm run build

echo "***********************************************************************"
echo "migrating DB and seeding"
cd {{ $new_release_dir }}

{{$php}} artisan optimize:clear --quiet
{{$php}} artisan migrate:refresh --force
{{$php}} artisan db:seed --force
{{$php}} artisan create:first-deployment
{{$php}} artisan create:admin-user {{ $adminCode }} '{{ $adminName }}' {{ $adminEmail }}

echo "***********************************************************************"
echo '* Clearing cache and optimising *'

cd {{ $new_release_dir }}
{{ $php }} artisan --version


cd {{ $new_release_dir }}
{{ $php }} artisan optimize:clear --quiet
{{$php}}  /usr/local/bin/composer dump-autoload -o --quiet
echo "Queue restarted"
#{{ $php }} artisan queue:restart --quiet

echo "Cache"
{{ $php }} artisan config:cache --quiet
{{ $php }} artisan view:cache --quiet

# Only use when no closure used in routes
{{ $php }} artisan route:cache --quiet

rm -rf node_modules

echo "***********************************************************************"
echo "* Activating new release ({{ $new_release_dir }} -> {{ $current_release_dir }}) *"
ln -nsf {{ $new_release_dir }} {{ $current_release_dir }}


@endtask

