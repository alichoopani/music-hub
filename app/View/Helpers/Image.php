<?php

namespace App\View\Helpers;

use Illuminate\Support\Str;

Trait Image
{
    public function setImageFunction($value, $attribute_name, $destination_path)
    {
        if ($value == null) {
            \Storage::disk('public')->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (Str::startsWith($value, 'data:image')) {
            $image = \Image::make($value);
            if(preg_match('/^(image\/)(.*)$/', $image->mime(), $match)){
                $extension = strtolower($match[2]);
                $filename = md5($value.time()).'.' . $extension;
                \Storage::disk('public')->put($destination_path . '/' . $filename, $image->stream());

                if($this->{$attribute_name}){
                    \Storage::disk('public')->delete($this->{$attribute_name});
                }

                $public_destination_path = Str::after($destination_path, 'public');
                $this->attributes[$attribute_name] = $public_destination_path . '/' . $filename;
            }
        }else{
            if(!Str::startsWith($value, ['http://', 'https://'])){
                $this->attributes[$attribute_name] = $value;
            }
        }
    }

    public function setImagesFunction($values, $attribute_single, $attribute_name, $destination_path)
    {
        if ($values == null) {
            \Storage::disk('public')->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = [];
        }

        $images = [];
        foreach ($values as $key => $value){
            $value = $value['picture'];
            if($value == null) continue;

            if (Str::startsWith($value, 'data:image')) {
                $image = \Image::make($value);
                if(preg_match('/^(image\/)(.*)$/', $image->mime(), $match)){
                    $extension = strtolower($match[2]);
                    $filename = md5($value.time()).'.' . $extension;
                    \Storage::disk('public')->put($destination_path . '/' . $filename, $image->stream());

                    $public_destination_path = Str::after($destination_path, 'public');
                    $images[$key] = new \stdClass();
                    $images[$key]->{$attribute_single} = $public_destination_path . '/' . $filename;
                }
            }else{
                if(!Str::startsWith($value, ['http://', 'https://'])){
                    $images[$key] = new \stdClass();
                    $images[$key]->{$attribute_single} = $value;
                }else{
                    $value = preg_split('/\/storage\//', $value, 2);
                    if(count($value) == 2){
                        $images[$key] = new \stdClass();
                        $images[$key]->{$attribute_single} = $value[1];
                    }
                }
            }
        }

        $this->attributes[$attribute_name] = json_encode($images);
    }
}
