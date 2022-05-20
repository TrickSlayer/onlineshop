<?php

namespace App\Jobs;

use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteImg implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $files = Storage::allFiles("public/uploads");
        foreach ($files as $file){
            $newstr = str_replace("public","storage",$file);
            $result = Category::where('thumb','/'.$newstr)->first();
            if (is_null($result)){
                Storage::delete($file);
            }
        }

        $directs = Storage::allDirectories("public/uploads");
        foreach ($directs as $direct){
            $result = Storage::allFiles($direct);
            if (empty($result)){
                Storage::deleteDirectory($direct);
            }
        }
    }
}
