<?php
ini_set('memory_limit', '2048M');  //设置运行时候的内存限制，克隆网站较大的时候可以使用，较小则随意
require_once '../vendor/autoload.php';
use Ares333\CurlMulti\AutoClone;
$url = array(
    'http://www.laruence.com/manual' => array(
        '/' => null
    )
);
$dir = __DIR__ . '/static';
$cacheDir = __DIR__ . '/cache';
if (! file_exists($dir)) {
    mkdir($dir);
}
if (! file_exists($cacheDir)) {
    mkdir($cacheDir);
}
$clone = new AutoClone($url, $dir);
$clone->overwrite = true;
$clone->getCurl()->maxThread = 3;  //并发数量，默认为3
$clone->getCurl()->cache['enable'] = true;
$clone->getCurl()->cache['enableDownload'] = true;
$clone->getCurl()->cache['dir'] = $cacheDir;
$clone->getCurl()->cache['compress'] = true;
$clone->start();
