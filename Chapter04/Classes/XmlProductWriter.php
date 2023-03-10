<?php

namespace Chapter04\Classes;

use XMLWriter;

class XmlProductWriter extends ShopProductWriter
{
    /**
     * @return void
     */
    public function write(): void
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement('products');
        foreach ($this->products as $shopProduct) {
            $writer->startElement('product');
            $writer->writeAttribute('title', $shopProduct->getTitle());
            $writer->startElement('summary');
            $writer->text($shopProduct->getSummaryLine());
            $writer->endElement();
            $writer->endElement();
        }
        $writer->endElement();
        $writer->endDocument();

        echo $writer->flush();
    }
}
