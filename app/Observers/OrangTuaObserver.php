<?php

namespace App\Observers;

use App\Models\OrangTua;

class OrangTuaObserver
{
    public function creating(OrangTua $orangTua)
    {
        do{
            $maxId = OrangTua::max('id');
            $newId = 'OT' . str_pad((int) substr($maxId, 2) + 1, 3, '0', STR_PAD_LEFT);
        } while (OrangTua::where('id', $newId)->exists()); // Check if the new ID already exists

        $orangTua->id = $newId;

    }
}