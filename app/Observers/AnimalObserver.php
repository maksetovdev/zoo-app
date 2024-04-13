<?php

namespace App\Observers;

use App\Models\Animal;
use Illuminate\Support\Facades\Storage;
class AnimalObserver
{
    /**
     * Handle the Animal "created" event.
     */
    public function created(Animal $animal): void
    {
        //
    }

    /**
     * Handle the Animal "updated" event.
     */
    public function updated(Animal $animal): void
    {
        //
    }

    /**
     * Handle the Animal "deleted" event.
     */
    public function deleting(Animal $animal): void
    {
        //deleting image, location
        $location = $animal->location;
        $location->delete();

        $imgs = $animal->images;
        foreach ($imgs as $img) {
         Storage::delete('animal-img/'.$img->img_name);
        }
    }

    /**
     * Handle the Animal "restored" event.
     */
    public function restored(Animal $animal): void
    {
        //
    }

    /**
     * Handle the Animal "force deleted" event.
     */
    public function forceDeleted(Animal $animal): void
    {
        //
    }
}
