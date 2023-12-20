<?php

use Illuminate\Support\Facades\URL;

class Helper
{
    /**
     * @return array|string|null
     */
    public static function indexUrl(): array|string|null
    {
        $pattern = '/add/i';
        $indexUrl = preg_replace("/\bedit\b.*$/", '', preg_replace($pattern, '', URL::current()));
        $indexUrl = preg_replace("/\bdelete\b.*$/", "", $indexUrl);
        $indexUrl = preg_replace("/\badd\b.*$/", "", $indexUrl);
        return preg_replace("/\bdetail\b.*$/", '', $indexUrl);
    }
    public static function imageUpload($uploadPath, $file)
    {
        $fileNames = [];

        // Determine the filesystem disk
        $filesystemDisk = env("FILESYSTEM_DISK");

        // Process the file or array of files
        $files = is_array($file) ? $file : [$file];

        foreach ($files as $f) {
            $fileName = time() . '.' . $f->getClientOriginalName();
            $f->move(public_path($uploadPath), $fileName);
            $fileNames[] = url('/') . "/" . $uploadPath . "/" . $fileName;
        }

        return is_array($file) ? implode(",", $fileNames) : $fileNames[0];
    }


    /**
     * @param $string
     * @param $limit
     * @return mixed|string
     */
    public static function subStr($string, $limit): mixed
    {
        if (strlen($string) > $limit) {
            return \Illuminate\Support\Str::substr($string, 0,$limit) . "...";
        }
        return $string;
    }
}
