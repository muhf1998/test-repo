<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function uploadFile($file)
    {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'zip', 'rar');

        $fileDestination = '';

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) {
                    $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                    $fileDestination = 'dist/file_upload/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    Flash::setFlash('Berhasil Upload File', '', 'success');
                } else {
                    Flash::setFlash('Gagal Upload,', ' ukuran file terlalu besar', 'danger');
                }
            } else {
                Flash::setFlash('Gagal Upload,', ' tidak dapat mengupload file ini', 'danger');
            }
        } else {
            Flash::setFlash('Type file hanya', 'jpg, jpeg, png, pdf, zip, rar', 'danger');
        }

        return $fileDestination;
    }

    public function uploadImage($file)
    {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        $fileDestination = '';

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                    $fileDestination = 'dist/file_upload/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    Flash::setFlash('Berhasil Upload File', '', 'success');
                } else {
                    Flash::setFlash('Gagal Upload,', ' ukuran file terlalu besar', 'danger');
                }
            } else {
                Flash::setFlash('Gagal Upload,', ' tidak dapat mengupload file ini', 'danger');
            }
        } else {
            Flash::setFlash('Type file hanya', 'jpg, jpeg, png', 'danger');
        }

        return $fileDestination;
    }

    public function unlink($file)
    {
        unlink($file);
        return true;
    }
}
