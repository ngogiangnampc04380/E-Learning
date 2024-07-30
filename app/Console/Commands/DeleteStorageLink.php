<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteStorageLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:unlink';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the storage link';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $link = public_path('storage');
        if (file_exists($link)) {
            if (unlink($link)) {
                $this->info('Storage link deleted successfully.');
            } else {
                $this->error('Failed to delete storage link.');
            }
        } else {
            $this->error('Storage link does not exist.');
        }
    }
}
