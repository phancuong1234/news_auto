<?php

namespace App\Traits;

trait Upload
{   //save ảnh
    public function saveImg($imgFile,$path)
    {
        if (isset($imgFile)) {
            $strDefault = config('setting.str_default');
            $tokenName = substr(str_shuffle($strDefault), 0, 16); //tạo token
            $file = $imgFile;
            $fileExtension = $imgFile->getClientOriginalExtension(); //lấy đuôi file
            $nameFile = explode('.',$imgFile->getClientOriginalName()); // lấy tên file
            $newName = 'images-'.time().'-'.$tokenName.'.'.$fileExtension;
            $path = public_path($path); //path lưu ảnh
            $imgFile = $newName;
            $file->move($path, $newName);

            return $newName;
        }
    }
}
