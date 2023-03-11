<?php

namespace Chapter04\Classes;

use Classes\OutputHelper;
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
            fputs($fh, OutputHelper::loggerText('Начало' . OutputHelper::newLine()));
            $conf = new Conf(__DIR__ . '\..\Files\conf.broken.xml');
            echo "user: {$conf->get('user')}" . OutputHelper::newLine();
            echo "host: {$conf->get('host')}" . OutputHelper::newLine();
            $conf->set('pass', 'my_pass');
            $conf->write();
        } catch (FileException $e) {
            // Файл не существует или недоступен
            fputs($fh, OutputHelper::loggerText('Проблемы с файлом' . OutputHelper::newLine()));
            throw $e;
        } catch (XmlException $e) {
            // Повреждённый XML-файл
            fputs($fh, OutputHelper::loggerText('Проблемы с XML' . OutputHelper::newLine()));
        } catch (ConfException $e) {
            // Неверный формат XML-файла
            fputs($fh, OutputHelper::loggerText('Проблемы с конфигурацией' . OutputHelper::newLine()));
        } catch (Exception $e) {
            // Ловушка: этот код не должен вызываться
            fputs($fh, OutputHelper::loggerText('Непредвиденные проблемы' . OutputHelper::newLine()));
        } finally {
            fputs($fh, OutputHelper::loggerText('Конец' . OutputHelper::newLine()));
            fclose($fh);
        }
    }
}
