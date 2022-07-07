<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
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
            $newurl = str_replace("public","storage",$file);
            $category = Category::where('thumb','/'.$newurl)->first();
            $product = Product::where('thumb','/'.$newurl)->first();
            $avatarShop = Shop::where('avatar','/'.$newurl)->first();
            $backgroundShop = Shop::where('background','/'.$newurl)->first();
            if (is_null($category) && is_null($product) && is_null($avatarShop) && is_null($backgroundShop)){
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

    public $uniqueFor = 60;
}
