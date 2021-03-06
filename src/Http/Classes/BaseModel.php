<?php

namespace BakerySoft\LaravelBakerySoft\Http\Classes;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public static function _destroy($imagePath = null)
    {
        self::removeImage($imagePath, request('id')); // remove image if exists
        if (!is_array(request('id'))) {
            return self::destroy(request('id'));
        }
        return self::deleteMultiRow($imagePath);
    }

    public static function deleteMultiRow($imagePath)
    {
        foreach (request('id') as  $value) {
            if ($value['name'] == 'id[]') {
                self::removeImage($imagePath, $value['value']); //remove image if exists
                self::find((int) $value['value'])->delete();
            }
        }
        return true;
    }

    public static function convertPostToArray()
    {
        return explode('&', request()->all()['data']);
    }

    public static function handlePost($post)
    {
        return explode('=', $post)[1];
    }

    public static function removeImage($imagePath, $id)
    {
        if (empty($imagePath)) {
            return;
        }
        $object = self::find($id);
        deleteFile($imagePath . $object->image);
    }
}
