<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request, $name, $folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/' . $folder, $file_name, 'bahya');
    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('bahya')->exists('attachments/library/' . $name);

        if ($exists) {
            Storage::disk('bahya')->delete('attachments/library/' . $name);
        }
    }
}
