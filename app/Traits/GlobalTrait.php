<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Auth;
use Storage;
use Image;

trait GlobalTrait
{
    public function savePhoto($file, $db, $folder, $model)
    {
        $mainFileName = str_slug($db->name).'-'.time().'.'.$file->getClientOriginalExtension();

        if (!file_exists(storage_path($folder))) {
            mkdir(storage_path($folder), 0755, true);
        }

        if (count($db->medias) > 0) {
            $old_photo = $db->medias()->first()->filename;
            $old_folder = $db->medias()->first()->folder;
            $this->deletePhotoIfExists($old_folder, $old_photo);
        }

        $mainImage = Image::make($file)->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(storage_path($folder).$mainFileName);

        $path = explode('app/', $folder);

        $db->photo = $path[1].$mainFileName;
        $db->save();
        // Save Media
        // $this->saveMedia($db->id, $model, $path[1], $mainFileName, $file);
    }

    // public function saveMedia($id, $model, $folder, $filename, $file)
    // {
    //     $size = Storage::size($folder.$filename);
    //     $mime = Storage::mimeType($folder.$filename);
    //     $ext = pathinfo(storage_path().$folder.$filename, PATHINFO_EXTENSION);
    //
    //     $data = [
    //       'mediable_id' => $id,
    //       'mediable_type' => $model,
    //       'folder' => $folder,
    //       'filename' => $filename,
    //       'extension' => $ext,
    //       'mime' => $mime,
    //       'size' => $size,
    //     ];
    //
    //     $media = Media::where('mediable_id', $id)->where('mediable_type', $model)->first();
    //     if (!$media) {
    //         $media = Media::create($data);
    //     } else {
    //         $media->update($data);
    //     }
    //
    //     return $media;
    // }

    public function deletePhotoIfExists($path, $filename)
    {
        if (Storage::disk('local')->exists($path.$filename)) {
            Storage::delete($path.$filename);
        }
    }

    // public function deleteMedia($db, $model)
    // {
    //     $media = Media::where('mediable_id', $db->id)->where('mediable_type', $model)->first();
    //     if (count($media) > 0) {
    //         $this->deletePhotoIfExists($media->folder, $media->filename);
    //         $media->delete();
    //     }
    // }
}