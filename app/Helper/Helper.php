<?php
namespace App\Helper;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class Helper
{
    /**
     * @return array|string|null
     */
    public static function indexUrl(): ?string
    {
        $segmentsToRemove = ['add', 'edit', 'delete', 'detail'];
        
        $currentUrl = URL::current();

        foreach ($segmentsToRemove as $segment) {
            $pattern = "/\b$segment\b.*$/i";
            $currentUrl = preg_replace($pattern, '', $currentUrl);
        }

        return $currentUrl ?: null;
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
            return \Illuminate\Support\Str::substr($string, 0, $limit) . "...";
        }
        return $string;
    }

    /**
     * Generate routes for a controller.
     *
     * @param string $controller
     * @param array  $getUrls
     * @param array  $postUrls
     * @return void
     */
    public static function routeGenerator(string $controller, array $getUrls = [], array $postUrls = []): void
    {
        $defaultGetUrls = [
            '/' => 'index',
            '/{id}/edit' => 'edit',
            '/add' => 'getAdd',
        ];

        $defaultPostUrls = [
            '/post' => 'postAdd',
            '/{id}/update' => 'update',
        ];

        $getUrls = array_merge($defaultGetUrls, $getUrls);
        $postUrls = array_merge($defaultPostUrls, $postUrls);

        foreach ($getUrls as $url => $method) {
            Route::get($url, $controller . '@' . $method);
        }

        foreach ($postUrls as $url => $method) {
            Route::post($url, $controller . '@' . $method);
        }
    }
}


