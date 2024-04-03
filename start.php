<?php

function say($message) {
    echo "\033[2J\033[H";
    echo $message;
}

$process = 4;

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

say("- Ready to go!");

?>
