<?php

namespace App\Services;


use Aws\S3\Exception\S3Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class S3Service {
    const FILE_PREFIX_AUDIO_VERIFICATIONS = 'r';

    public function upload(UploadedFile $file, $relativeUrl, $privacy = 'public') {
        $fullUrl = $this->uploadContent(file_get_contents($file->getRealPath()), $relativeUrl, $privacy);
        return $fullUrl;
    }

    public function uploadContent($content, $relativeUrl, $privacy = 'public') {
        try {
            Storage::disk('s3')->put(self::getRelativeURL($relativeUrl), $content, $privacy);
        } catch (S3Exception $e) {
            throw $e;
        }

        return self::getFullURL($relativeUrl, null);
    }

    public static function getRelativeURL($nameSpace, $dir = null) {
        if ($dir) {
            return $dir . '/' . $nameSpace;
        }

        return $nameSpace;
    }

    public static function getFullURL($nameSpace, $dir = null) {
        $region  = Config::get('filesystems.disks.s3.region');
        $bucket  = Config::get('filesystems.disks.s3.bucket');
        $baseURL = 'https://s3-' . $region . '.amazonaws.com/' . $bucket . '/';

        return $baseURL . self::getRelativeURL($nameSpace, $dir);
    }

    public function uploadContentWithUrl($url, $relativeUrl, $privacy = 'public') {
        if (is_null($url)) {
            return $url;
        }

        $fullUrl = $this->uploadContent(file_get_contents($url), $relativeUrl, $privacy);

        return $fullUrl;
    }

    public function getPreSignedImageUrl($fileName, $dir) {
        $client = Storage::disk('s3')->getDriver()->getAdapter()->getClient();

        $command = $client->getCommand('PutObject', [
            'Bucket' => Config::get('filesystems.disks.s3.bucket'),
            'Key'    => self::getRelativeURL($fileName, $dir),
            'ACL'    => 'public-read',
        ]);

        $request = $client->createPresignedRequest($command, '+10 minute');

        $url = (string)$request->getUri();

        return $url;
    }

}