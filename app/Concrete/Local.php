<?php
/**
 * Created by PhpStorm.
 * User: emeka
 * Date: 10/12/18
 * Time: 4:18 AM
 */

namespace App\Concrete;

use App\Contracts\StorageInterface;

class Local implements StorageInterface
{
    protected $baseDir;

    public function __construct()
    {
        $this->baseDir = 'public/uploads/';
    }

    public function getFileUrl($uri, $lifeSpan = null)
    {
        return $this->baseDir.$uri;
    }

    public function putObject($file, $uri)
    {
        $dir = $this->baseDir.current(explode('/', $uri));
        if (!is_dir($dir)) {
            if (!mkdir($dir)) {
                return false;
            }
        }
        chmod($dir, 0777);

        $moved = move_uploaded_file($file, $this->baseDir.$uri);

        return $moved;
    }

    public function deleteObject($uri)
    {
        $fullUri = $this->baseDir.$uri;

        if(!file_exists($fullUri))
        {
            return false;
        }
        return unlink($fullUri);
    }
}