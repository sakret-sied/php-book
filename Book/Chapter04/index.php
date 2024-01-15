<?php

require_once '../../autoload.php';

use Book\Chapter04\Classes\Account;
use Book\Chapter04\Classes\Address;
use Book\Chapter04\Classes\Mailer;
use Book\Chapter04\Classes\Person;
use Book\Chapter04\Classes\Person2;
use Book\Chapter04\Classes\ProcessSale;
use Book\Chapter04\Classes\Product;
use Book\Chapter04\Classes\Runner;
use Book\Chapter04\Classes\ShopProduct;
use Book\Chapter04\Classes\SpreadSheet;
use Book\Chapter04\Classes\StaticExample;
use Book\Chapter04\Classes\Totalizer;
use Book\Chapter04\Classes\Totalizer2;
use Book\Chapter04\Classes\User;
use Book\Chapter04\Classes\UtilityService;
use Book\Chapter04\Interfaces\IdentityObject;
use Book\Chapter04\Interfaces\PersonWriter;
use Core\Classes\OutputHelper;
use Core\Configs\Config;

OutputHelper::setIsSaveMode(Config::OUTPUT_HELPER_IS_SAVE_MODE);
OutputHelper::setIsHtml(Config::OUTPUT_HELPER_IS_HTML);

StaticExample::sayHello();

function storeIdentityObject(IdentityObject $identityObject)
{
    // сделать что-нибудь с экземпляром типа IdentityObject
}

$shopProduct = new ShopProduct('Нежное мыло', '', 'Ванная Боба', 1.33);
storeIdentityObject($shopProduct);
OutputHelper::echoText($shopProduct->calculateTax(100));
OutputHelper::echoText($shopProduct->generateId(), 2);

$utilityService = new UtilityService(100);
OutputHelper::echoText($utilityService->getFinalPrice(), 2);

OutputHelper::printR(User::create());
OutputHelper::printR(SpreadSheet::create(), 2);

try {
    Runner::init();
} catch (Exception $exception) {
    // Полученное исключение
}

$person = new Person();
if (isset($person->name)) {
    $person->name = 'Иван';
    OutputHelper::echoText($person->name);
    $person->writeName();
    OutputHelper::echoText();
}

$address = new Address('441b Bakers Street');

OutputHelper::echoText("Адрес: $address->streetAddress");
$address = new Address('15', 'Albert Mews');
OutputHelper::echoText("Адрес: $address->streetAddress");
$address->streetAddress = '34, West 24th Avenue';
OutputHelper::echoText("Адрес: $address->streetAddress", 2);

$newPerson = new Person('Иван', 44, new Account(200));
$newPerson->setId(343);
$newPerson2 = clone $newPerson;
$newPerson->account->balance += 10;
OutputHelper::echoText($newPerson2->account->balance, 2);

$anotherPerson = new Person();
OutputHelper::echoText($anotherPerson, 2);

$logger = function (Product $product) {
    OutputHelper::echoText("записываем $product->name");
};
$processor = new ProcessSale();
try {
    $processor->registerCallback($logger);
    $processor->registerCallback([new Mailer(), 'doMail']);
    $processor->registerCallback(Totalizer::warnAmount());
    $processor->registerCallback(Totalizer2::warnAmount(8));
} catch (Exception $exception) {
}
$processor->sale(new Product('Туфли', 6));
$processor->sale(new Product('Кофе', 6));

$person2 = new Person2();
$person2->output(
    new class ('Files/person.txt') implements PersonWriter {
        /** @var string */
        private string $path;

        /**
         * @param string $path
         */
        public function __construct(string $path)
        {
            $this->path = $path;
        }

        /**
         * @param Person2 $person2
         * @return void
         */
        public function write(Person2 $person2)
        {
            file_put_contents($this->path, "{$person2->getName()} {$person2->getAge()}");
        }
    }
);

OutputHelper::echoSaved();
