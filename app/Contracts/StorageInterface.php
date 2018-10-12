<?php
/**
 * Created by PhpStorm.
 * User: emeka
 * Date: 10/12/18
 * Time: 4:17 AM
 */

namespace App\Contracts;

interface StorageInterface
{
    public function getFileUrl($uri, $lifeSpan = null);

    public function putObject($file, $uri);

    public function deleteObject($uri);
}