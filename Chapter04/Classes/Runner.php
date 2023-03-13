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
            fputs($fh, OutputHelper::loggerText('Начало'));
            $conf = new Conf(__DIR__ . '\..\Files\conf.broken.xml');
            OutputHelper::echoText("user: {$conf->get('user')}");
            OutputHelper::echoText("host: {$conf->get('host')}");
            $conf->set('pass', 'my_pass');
            $conf->write();
        } catch (FileException $e) {
            // Файл не существует или недоступен
            fputs($fh, OutputHelper::loggerText('Проблемы с файлом'));
            throw $e;
        } catch (XmlException $e) {
            // Повреждённый XML-файл
            fputs($fh, OutputHelper::loggerText('Проблемы с XML'));
        } catch (ConfException $e) {
            // Неверный формат XML-файла
            fputs($fh, OutputHelper::loggerText('Проблемы с конфигурацией'));
        } catch (Exception $e) {
            // Ловушка: этот код не должен вызываться
            fputs($fh, OutputHelper::loggerText('Непредвиденные проблемы'));
        } finally {
            fputs($fh, OutputHelper::loggerText('Конец'));
            fclose($fh);
        }
    }
}
