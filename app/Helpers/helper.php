<?php

if (!function_exists('fileUpload')) {
/**
     * A custom helper function to store file and return fileName.
     *
     * @param string $name
     * @return string
     */
    function fileUpload($media) {
        $file = $media;
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->storeAs('authors', $fileName, 'public');
        return $fileName;
    }
}