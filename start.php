<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->useEnvironmentPath(__DIR__);
$app->loadEnvironmentFrom('.env');
$app->bootstrapWith([
    'Illuminate\Foundation\Bootstrap\LoadConfiguration',
    'Illuminate\Foundation\Bootstrap\HandleExceptions',
    'Illuminate\Foundation\Bootstrap\RegisterFacades',
    'Illuminate\Foundation\Bootstrap\RegisterProviders',
    'Illuminate\Foundation\Bootstrap\BootProviders',
]);
use Illuminate\Support\Facades\DB;

function say($message) {
    echo "\033[2J\033[H";
    echo $message;
    echo "\n";
}

$process = 8;

say("- Progress [0/{$process}]");
file_put_contents("download_composer.php", "<?php copy('https://getcomposer.org/installer', 'composer-setup.php'); ?>");

say("- Progress [1/{$process}]");
system("php download_composer.php");
unlink("download_composer.php");

say("- Progress [2/{$process}]");
file_put_contents("composer-setup.php", str_replace('$this->disableTls'." ? 'http' : 'https'", "'http'", file_get_contents("composer-setup.php")));
system('php composer-setup.php');
unlink("composer-setup.php");

say("- Progress [3/{$process}]");
system('php composer.phar install');
unlink("composer.phar");

say("- Progress [4/{$process}]");
$env_content = 'APP_NAME=Dynamitowy
APP_ENV=local
APP_KEY=
APP_DEBUG=false
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dynamitowy
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
';

file_put_contents(".env", $env_content);

say("- Progress [5/{$process}]");

system("php artisan key:generate");

say("- Progress [6/{$process}]");

system("php artisan config:cache");

say("- Progress [7/{$process}]");

$result = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", ['dynamitowy']);

if (!empty($result)) {
    system("php artisan migrate:refresh --seed");
} else {
    system("php artisan migrate --seed");
}

say("- Ready to go!");

?>
