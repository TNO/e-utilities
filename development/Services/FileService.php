<?php
declare(strict_types=1);

class FileService
{

    /**
     * @param string $path
     * @param bool $recursive
     * @return void
     */
    public function makeDirectory(string $path, int $mode = 0755, bool $recursive = true)
    {
        mkdir($path, $mode, $recursive);
    }
}
