<?php

namespace Chapter04\Classes;

use DateTime;
use DateTimeInterface;
use Exception;

class Runner
{
    /**
     * @return void
     * @throws Exception
     */
    public static function init()
    {
        try {
            $fh = fopen(__DIR__ . '\..\Files\log.txt', 'a');
            fputs($fh, self::loggerText("Начало\r\n"));
            $conf = new Conf(__DIR__ . '\..\Files\conf.broken.xml');
            echo "user: {$conf->get('user')}\r\n";
            echo "host: {$conf->get('host')}\r\n";
            $conf->set('pass', 'my_pass');
            $conf->write();
        } catch (FileException $e) {
            // Файл не существует или недоступен
            fputs($fh, self::loggerText("Проблемы с файлом\r\n"));
            throw $e;
        } catch (XmlException $e) {
            // Повреждённый XML-файл
            fputs($fh, self::loggerText("Проблемы с XML\r\n"));
        } catch (ConfException $e) {
            // Неверный формат XML-файла
            fputs($fh, self::loggerText("Проблемы с конфигурацией\r\n"));
        } catch (Exception $e) {
            // Ловушка: этот код не должен вызываться
            fputs($fh, self::loggerText("Непредвиденные проблемы\r\n"));
        } finally {
            fputs($fh, self::loggerText("Конец\r\n"));
            fclose($fh);
        }
    }

    /**
     * #improvements
     *
     * @param string $text
     * @return string
     */
    public static function loggerText(string $text): string
    {
        return (new DateTime)->format(DateTimeInterface::RFC3339_EXTENDED) . " $text";
    }
}
