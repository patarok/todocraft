<?php
namespace Deployer;

require 'recipe/common.php';

set('keep_releases', 3);
// Project name
set('application', 'hallergasse.at');

// Project repository
set('repository', 'git@github.com:pc-web-it/craft-buwog-hallergasse.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);
// Better Composer options
set('composer_options', 'install --verbose --prefer-dist --no-progress --no-interaction --optimize-autoloader');


// Shared files/dirs between deploys 
// Shared files/dirs between deploys
set('shared_files', [
    '.env',
    'scripts/.env.sh',
    'web/assets/api.json',
]);
set('shared_dirs', [
    'storage/backups',
    'storage/rebrand',
    'storage/userphotos',
    'web/uploads',
    'web/media',
    'translations',
]);
// Writable dirs by web server
set('writable_dirs', [
    'storage',
    'storage/runtime',
    'storage/logs',
    'storage/rebrand',
    'public/cpresources',
    'translations',
]);
set('allow_anonymous_stats', false);


// Set the default deploy environment to production
set('default_stage', 'staging');

// Disable multiplexing
set('ssh_multiplexing', false);


// Hosts

// Staging Server
host('demeter.pc-web.at')
    ->set('deploy_path', '/var/www/clients/client1/web117/web/app')
    ->set('bin/php', '/usr/bin/php7.4')
    ->set('bin/composer', '{{bin/php}} {{release_path}}/composer.phar')
    ->set('fcgi', '/var/lib/php7.0-fpm/web117.sock')
    ->set('tmp_dir', '/var/www/clients/client1/web117/tmp')
    ->set('branch', 'main')
    ->stage('staging')
    ->user('pc_webhallergasse')
    ->set('keep_releases', 1);


// Tasks
desc('Execute migrations');
task('craft:migrate', function () {
    run('{{bin/php}} {{release_path}}/craft migrate/up');
})->once();

desc('Execute sync');
task('craft:sync', function () {
    run('{{bin/php}} {{release_path}}/craft project-config/apply');
})->once();

task('deploy:assets', '
    cd {{release_path}}    
    npm install
    npm run build        
');

task('deploy:clearOpCache','
    {{bin/php}} cachetool.phar --fcgi={{fcgi}} --tmp-dir={{tmp_dir}} opcache:reset
');


desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:assets', //Build npm assets
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] Run migrations
after('deploy:vendors', 'craft:migrate');

after('deploy:symlink', 'craft:sync');

after('craft:sync', 'deploy:clearOpCache');

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
