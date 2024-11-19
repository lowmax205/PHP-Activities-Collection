<?php
class MyException extends Exception
{
    public function summarize()
    {
        $ret = "<pre>\n";
        $ret .=  "msg: " . $this->getMessage() . "\n"
            . "code: " . $this->getCode() . "\n"
            . "line: " . $this->getLine() . "\n"
            . "file: " . $this->getFile() . "\n";
        $ret .= "</pre>\n";
        return $ret;
    }
}
class FileNotFoundException extends
MyException {}
class FileOpenException extends
MyException {}
class Reader
{
    function getContents($file)
    {
        if (! file_exists($file)) {
            throw new FileNotFoundException(
                "could not find '$file'"
            );
        }
        $fp = @fopen($file, 'r');
        if (! $fp) {
            throw new FileOpenException(
                "unable to open '$file'"
            );
        }
        while (! feof($fp)) {
            $ret = fgets($fp, 1024);
        }
        fclose($fp);
        return $ret;
    }
}
$reader = new Reader();
try {
    print $reader->getContents(
        "blah.txt"
    );
} catch (FileNotFoundException $e) {
    print $e->summarize();
} catch (FileOpenException $e) {
    print $e->summarize();
} catch (Exception $e) {
    die("unknown error");
}
