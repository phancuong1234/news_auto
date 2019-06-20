<?php

namespace App\Traits;

trait Upload
{
    public function saveImg($imgFile, $path)
    {
        if (isset($imgFile)) {
            $strDefault = config('setting.str_default');
            $tokenName = substr(str_shuffle($strDefault), 0, 16);
            $file = $imgFile;
            $fileExtension = $imgFile->getClientOriginalExtension();
            $nameFile = explode('.',$imgFile->getClientOriginalName());
            $newName = 'images-'.time().'-'.$tokenName.'.'.$fileExtension;
            $path = public_path($path);
            $imgFile = $newName;
            $file->move($path, $newName);

            return $newName;
        }
    }
}
