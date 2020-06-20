<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'nazaha');

// Project repository
set('repository', 'git@172.16.19.53:swunit/nazaha-kpis.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', [
    '.env'
]);
add('shared_dirs', [
    'storage', 'public/uploads'
]);

// Writable dirs by web server
add('writable_dirs', [
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);

set('allow_anonymous_stats', false);

// Hosts


host('172.21.1.77')
    ->stage('production')
    ->set('branch', 'master')
    ->user('eserv')
    ->set('deploy_path', '/home/eserv/production/backend/nazaha');

// Tasks

desc('Execute artisan migrate');
task('artisan:migrate', function () {
  $output1 = run('{{bin/php}} {{release_path}}/artisan migrate --force');
  writeln('<info>' . $output1 . '</info>');
  $output2 = run('{{bin/php}} {{release_path}}/artisan module:migrate --force');
  writeln('<info>' . "Modules: ". $output2 . '</info>');
});

desc('Execute artisan migrate:rollback');
task('artisan:migrate:rollback', function () {
    $output1 = run('{{bin/php}} {{release_path}}/artisan migrate:rollback --force');
    writeln('<info>' . $output1 . '</info>');
    $output2 = run('{{bin/php}} {{release_path}}/artisan module:migrate --force');
    writeln('<info>' . "Modules: ".$output2 . '</info>');
});

desc('Execute artisan db:seed');
task('artisan:db:seed', function () {
    $output = run('{{bin/php}} {{release_path}}/artisan db:seed --force');
    writeln('<info>' . $output . '</info>');
});

desc('Execute artisan cache:clear');
task('artisan:cache:clear', function () {
    run('{{bin/php}} {{release_path}}/artisan cache:clear');
});

desc('Execute artisan config:cache');
task('artisan:config:cache', function () {
    run('{{bin/php}} {{release_path}}/artisan config:cache');
});

desc('Execute artisan route:cache');
task('artisan:route:cache', function () {
    run('{{bin/php}} {{release_path}}/artisan route:cache');
});




desc('Restart Queue');
task('queue:restart', function () {
    run('sudo supervisorctl reread');
   run('sudo supervisorctl update');
    run('sudo supervisorctl stop comt-staging-worker:*');
    run('sudo supervisorctl start comt-staging-worker:*');
});

desc('Composer Install');
task('composer:install', function () {
     cd('{{release_path}}');
     run("composer install --no-dev");
});


/**
 * Task deploy:public_disk support the public disk.
 * To run this task automatically, please add below line to your deploy.php file
 *
 *     before('deploy:symlink', 'deploy:public_disk');
 *
 * @see https://laravel.com/docs/5.2/filesystem#configuration
 */
desc('Make symlink for public disk');
task('deploy:public_disk', function () {
    // Remove from source.
    run('if [ -d $(echo {{release_path}}/public/storage) ]; then rm -rf {{release_path}}/public/storage; fi');

    // Create shared dir if it does not exist.
    run('mkdir -p {{deploy_path}}/shared/storage/app/public');

    // Symlink shared dir to release dir
    run('{{bin/symlink}} {{deploy_path}}/shared/storage/app/public {{release_path}}/public/storage');
});

/**
 * Main task
 */
desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'composer:install',
    'artisan:migrate',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);

after('deploy', 'success');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
