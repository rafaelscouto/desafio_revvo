<?php

namespace Rafaelscouto\DesafioRevvo\Helpers;

class UploadHelper
{
    public static function uploadImage(array $file): ?string
    {
        if($file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../uploads/';
            if(!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('img_', true) . '.' . $extension;
            $filePath = $uploadDir . $fileName;

            if(move_uploaded_file($file['tmp_name'], $filePath)) {
                return '/uploads/' . $fileName;
            }
        }
        return null;
    }
}