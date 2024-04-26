<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request, $name, $folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        // Use dots (.) instead of commas (,) in the storeAs function
        $request->file($name)->storeAs('attachments/' . $folder, $file_name, 'bahya');
    }

    public function deleteFile($name)
    {
        // Check for file existence in the 'bahya' disk
        $exists = Storage::disk('bahya')->exists('attachments/library/' . $name);

        if ($exists) {
            // Delete the file from the 'bahya' disk
            Storage::disk('bahya')->delete('attachments/library/' . $name);
        }
    }
}
