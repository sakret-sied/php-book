<?php

namespace Chapter04\Classes;

use DOMDocument;
use Exception;
use SimpleXMLElement;

class Conf
{
    /** @var string */
    private string $file;
    /** @var SimpleXMLElement|$1|false */
    private SimpleXMLElement $xml;
    /** @var SimpleXMLElement */
    private SimpleXMLElement $lastMatch;

    /**
     * @param string $file
     * @throws Exception
     */
    public function __construct(string $file)
    {
        $this->file = $file;
        if (!file_exists($this->file)) {
            throw new FileException("Файл '$this->file' не найден");
        }
        $this->xml = simplexml_load_file($file, null, LIBXML_NOERROR);
        if (!is_object($this->xml)) {
            throw new XmlException(libxml_get_last_error());
        }
        $matches = $this->xml->xpath('/conf');
        if (!count($matches)) {
            throw new ConfException('Не найден корневой элемент: conf');
        }
    }

    /**
     * @return void
     * @throws Exception
     */
    public function write(): void
    {
        if (!is_writable($this->file)) {
            throw new FileException("Файл '$this->file' недоступен для записи");
        }
        // #improvements
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($this->xml->asXML());

        file_put_contents($this->file, $dom->saveXML());
    }

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function set(string $key, string $value): void
    {
        if (!is_null($this->get($key))) {
            $this->lastMatch[0] = $value;
            return;
        }
        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }

    /**
     * @param string $str
     * @return string|null
     */
    public function get(string $str): ?string
    {
        $matches = $this->xml->xpath("/conf/item[@name='$str']");
        if (count($matches)) {
            $this->lastMatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }
}
