<?php

namespace Chapter04\Classes;

use DOMDocument;
use Exception;

class Conf
{
    private $file;
    private $xml;
    private $lastmatch;

    /**
     * @param string $file
     * @throws Exception
     */
    public function __construct(string $file)
    {
        $this->file = $file;
        if (!file_exists($this->file)) {
            throw new Exception("Файл '$this->file' не найден");
        }
        $this->xml = simplexml_load_file($file);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function write(): void
    {
        if (!is_writable($this->file)) {
            throw new Exception("Файл '$this->file' недоступен для записи");
        }
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($this->xml->asXML());
        file_put_contents($this->file, $dom->saveXML());
    }

    /**
     * @param string $str
     * @return string|null
     */
    public function get(string $str): ?string
    {
        $matches = $this->xml->xpath("/conf/item[@name='$str']");
        if (count($matches)) {
            $this->lastmatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function set(string $key, string $value): void
    {
        if (!is_null($this->get($key))) {
            $this->lastmatch[0] = $value;
            return;
        }
        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }
}