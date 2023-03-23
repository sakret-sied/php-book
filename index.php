<?php

for ($chapter = 3; $chapter <= 5; ++$chapter) {
    $number = sprintf("%'.02d", $chapter);;
    echo "<a href=\"/book/chapter$number/\">chapter$number</a><br>";
}
