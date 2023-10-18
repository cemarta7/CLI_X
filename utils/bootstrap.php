<?php
function include_if_exists($file)
{
  if (file_exists($file))
  {
    echo "this file exist ".$file."\n";
    return include $file;
  }else{
    echo "this file DOES NOT exist ".$file."\n";
  }
}

function folder_exist($folder)
{
    // Get canonicalized absolute pathname
    $path = realpath($folder);

    // If it exist, check if it's a directory
    return ($path !== false and is_dir($path)) ? $path : false;
}


if ((! $loader = include_if_exists(__DIR__ .'/../../../autoload.php'))&&(! $loader = include_if_exists(__DIR__ . '/../vendor/autoload.php')))
{
  die(
    'You must set up the project dependencies, run the following commands:'.PHP_EOL.
    'curl -s http://getcomposer.org/installer | php'.PHP_EOL.
    'php composer.phar install'.PHP_EOL
  );
}
