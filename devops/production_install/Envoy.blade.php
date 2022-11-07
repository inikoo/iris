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
$path=$_ENV['DEPLOYMENT_PATH'];


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
$staging_dir = $path . '/staging';
$repo_dir = $path . '/repo';
$new_release_dir = $releases_dir . '/' . $date;


// Command or path to invoke PHP
$php = empty($php) ? 'php8.1' : $php;
$branch = empty($branch) ? 'main' : $branch;

$deployment_key=null;

$skip_build=false;

@endsetup

@servers(['production' => $user.'@'.$host,'localhost' => '127.0.0.1'])

@task('install', ['on' => 'production','confirm' => true])


rm -rf {{ $path }}/storage/tenants
rm -rf {{ $path }}/storage/logs/*

mkdir -p {{ $new_release_dir }}
mkdir -p {{ $new_release_dir }}/public/

echo "***********************************************************************"
echo "* Pulling repo *"
cd {{$repo_dir}}
git pull origin {{ $branch }}

echo "***********************************************************************"
echo "* staging code from {{ $repo_dir }} to {{ $staging_dir }} * AAA"
rsync   -rlptgoDPzSlh  --no-p --chmod=g=rwX  --delete  --stats --exclude-from={{ $repo_dir }}/devops/deployment/deployment-exclude-list.txt {{ $repo_dir }}/ {{ $staging_dir }}
echo "rsync done"

sudo chgrp www-data {{ $staging_dir }}/bootstrap/cache

echo "ln -nsf {{ $path }}/envs {{ $new_release_dir }}/envs"
ln -nsf {{ $path }}/envs {{ $new_release_dir }}/envs
ln -nsf {{ $path }}/storage {{ $new_release_dir }}/storage
ln -nsf {{ $path }}/storage/app/public {{ $new_release_dir }}/public/storage

echo "***********************************************************************"
echo "* Composer install *"
cd {{$staging_dir}}
{{$php}}  /usr/local/bin/composer install --no-ansi --no-dev --no-interaction --no-plugins --no-progress --no-scripts --optimize-autoloader --prefer-dist

echo "***********************************************************************"
echo "* NPM install *"
cd {{$staging_dir}}
npm install

echo "***********************************************************************"
echo "* build VUE *"
cd {{$staging_dir}}
ln -sf {{ $path }}/private/ {{ $staging_dir }}/resources/
npm run build


touch {{ $staging_dir }}/deploy-manifest.json
echo "***********************************************************************"
echo "* --- Sync code from {{ $staging_dir }}  to {{ $new_release_dir }} *"
rsync -auz --exclude 'node_modules' {{ $staging_dir }}/ {{ $new_release_dir }}

echo "***********************************************************************"
echo "migrating DB and seeding"
cd {{ $new_release_dir }}

{{$php}} artisan optimize:clear
{{$php}} artisan migrate:refresh --force
{{$php}} artisan db:seed --force
{{$php}} artisan create:first-deployment
{{$php}} artisan create:admin-user {{ $adminCode }} '{{ $adminName }}' -e={{ $adminEmail }}

echo "***********************************************************************"
echo '* Clearing cache and optimising *'

cd {{ $new_release_dir }}
{{ $php }} artisan --version


cd {{ $new_release_dir }}
{{ $php }} artisan optimize:clear --quiet
{{$php}}  /usr/local/bin/composer dump-autoload -o
echo "Queue restarted"
#{{ $php }} artisan queue:restart --quiet

echo "Cache"
{{ $php }} artisan config:cache
{{ $php }} artisan view:cache

# Only use when no closure used in routes
#{{ $php }} artisan optimize
{{ $php }} artisan route:cache

echo "***********************************************************************"
echo "* Activating new release ({{ $new_release_dir }} -> {{ $current_release_dir }}) *"
ln -nsf {{ $new_release_dir }} {{ $current_release_dir }}


@endtask

