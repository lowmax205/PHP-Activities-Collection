<?php
class FileException extends Exception
{
    public function getFileException()
    {
        return "Exception thrown in " . $this->getFile() . " on line " . $this->getLine();
    }
}

function getFileContent($filename)
{
    if (!file_exists($filename)) {
        throw new FileException("File not found");
    }
    return file_get_contents($filename);
}

try {
    $content = getFileContent("example.txt");
    echo $content;
} catch (FileException $e) {
    echo $e->getFileException();
}
