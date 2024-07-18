<?php

namespace App\Observers;

use App\Models\Saudara;

class SaudaraObserver
{
    public function creating(Saudara $saudara)
    {
        do {
            $maxId = Saudara::max('id');
            $newId = 'S' . str_pad((int) substr($maxId, 1) + 1, 3, '0', STR_PAD_LEFT);
        } while (Saudara::where('id', $newId)->exists()); // Check if the new ID already exists

        $saudara->id = $newId;
    }
}