<?php

error_reporting(E_ALL);

$token = "y0_AgAAAABX794DAAh7dwAAAADQ0rTRa3DMpO91TEGQoGFz5eSX0Niuupc";

class Redactor
{
    protected $disk;

    public function __construct($token)
    {
        $disk = new Arhitector\Yandex\Disk();
        $this->disk = $disk->setAccessToken($token);
    }

    public function getAll()
    {
        $file = $this->disk->getResources('100000000', '0');
        $file->toObject();
        $file->getIterator();
        return $file;
    }

    public function name($filePath, $name)
    {
        $resource = $this->disk->getResource($filePath);
        $resource->download('../downloaded.files/' . $name, true);
        $removed  = $this->disk->getResource($filePath, 0);
        $removed->delete();
        $resource = $this->disk->getResource($name, 0);
        $resource->upload('../downloaded.files/' . $name);
        unlink('../downloaded.files/' . $name);
    }

    public function delete($filePath)
    {
        $removed  = $this->disk->getResource($filePath, 0);
        $removed->delete();
    }


    public function upload($file)
    {
        try {
            $resource = $this->disk->getResource($file['name'], 0);
            $resource->toArray();
        } catch (Arhitector\Yandex\Client\Exception\NotFoundException $exc) {
            $resource->upload($file['tmp_name']);
        }
    }
    public function download($filePath)
    {
        $resource = $this->disk->getResource($filePath, 0);
        $resource->download('../downloads/' . $resource['name'], true);
    }
}
