<?php

namespace App\Observers;

use App\Models\Anak;

class AnakObserver
{
    public function creating(Anak $anak)
    {
        do {
            $maxId = Anak::max('id');
            $newId = 'A' . str_pad((int) substr($maxId, 1) + 1, 3, '0', STR_PAD_LEFT);
        } while (Anak::where('id', $newId)->exists()); // Check if the new ID already exists

        $anak->id = $newId;
    }
}