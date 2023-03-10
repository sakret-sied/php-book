<?php

namespace Chapter04\Classes;

use Exception;
use LibXMLError;

class XmlException extends Exception
{
    /** @var LibXMLError */
    private LibXMLError $error;

    public function __construct(LibXMLError $error)
    {
        $shortFile = basename($error->file);
        $message = "[$shortFile, строка $error->line, столбец $error->column] $error->message";
        $this->error = $error;
        parent::__construct($message, $error->code);
    }

    /**
     * @return LibXMLError
     */
    public function getLibXmlError(): LibXMLError
    {
        return $this->error;
    }
}
