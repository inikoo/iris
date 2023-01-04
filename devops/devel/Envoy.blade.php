{{--
//  Author: Raul Perusquia <raul@inikoo.com>
//  Created: Sun, 01 Jan 2023 13:54 Malaysia Time, Kuala Lumpur, Malaysia
//  Copyright (c) 2022, Inikoo
//  Version 4.0
--}}

@include('../../vendor/autoload.php')


@setup
$dotenv = Dotenv\Dotenv::createImmutable('../../envs');
$dotenv->load();

$path=$_ENV['DEVEL_PATH'];
$php = empty($php) ? 'php8.2' : $php;
if (empty($_ENV['PRODUCTION_ADMIN_EMAIL'])) {
exit('ERROR: PRODUCTION_ADMIN_EMAIL var empty or not defined');
}
$adminEmail=$_ENV['PRODUCTION_ADMIN_EMAIL'];

if (empty($_ENV['PRODUCTION_ADMIN_CODE'])) {
exit('ERROR: PRODUCTION_ADMIN_CODE var empty or not defined');
}
$adminCode=$_ENV['PRODUCTION_ADMIN_CODE'];

if (empty($_ENV['PRODUCTION_ADMIN_NAME'])) {
exit('ERROR: PRODUCTION_ADMIN_NAME var empty or not defined');
}
$adminName=$_ENV['PRODUCTION_ADMIN_NAME'];
@endsetup

@servers(['localhost' => '127.0.0.1'])



@task('install')


sudo chgrp -R www-data {{ $path }}/envs
sudo chmod g+s {{ $path }}/envs
sudo chmod g+r {{ $path }}/envs/.env
sudo rm -rf {{ $path }}/envs/.env.*
sudo chgrp -R www-data {{ $path }}/envs
sudo chmod g+s {{ $path }}/envs



sudo chgrp -R www-data {{ $path }}/storage
sudo chmod g+s {{ $path }}/storage

cd {{$path}}

{{$php}}  composer update

npm install

{{$php}} artisan migrate:refresh --force
{{$php}} artisan db:seed --force

{{$php}} artisan create:admin-user {{ $adminCode }} '{{ $adminName }}' {{ $adminEmail }}



@endtask

