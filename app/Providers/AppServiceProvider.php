<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Google\Cloud\Storage\StorageClient;
use League\Flysystem\Filesystem;
use League\Flysystem\GoogleCloudStorage\GoogleCloudStorageAdapter;
use App\Models\Course_Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Storage::extend('gcs', function ($app, $config) {
        //     $storageClient = new StorageClient([
        //         'projectId' => $config['project_id'],
        //         'keyFilePath' => $config['key_file'],
        //     ]);

        //     $bucket = $storageClient->bucket($config['bucket']);
        //     $adapter = new GoogleCloudStorageAdapter($bucket, $config['path_prefix'] ?? '');

        //     return new Filesystem($adapter);
        // });
        view()->composer('*', function ($view) {
            $categories = Course_Category::all();
            $view->with('categories', $categories);
        });
    }

    public function register(): void
    {
        //
    }
}
