<?php

// 1. najdi všechny .txt soubory v této složce
// @see https://www.php.net/manual/en/function.glob.php
$files = glob('*.txt');


// pro více přípon takhle
// @see https://stackoverflow.com/a/10591546/1348344
//$files = glob('*.{txt,pdf,doc}', GLOB_BRACE);

foreach ($files as $oldFile) {
    // 2. nahraď více mezer jen jednou
    $newFile = preg_replace('#\s+#', ' ', $oldFile);

    // 3. když se název nezměnil, přeskoč soubor
    if ($oldFile === $newFile) {
        continue;
    }

    // 4. přejmenuj soubor na ten bez mezer
    rename($oldFile, $newFile);

    echo sprintf('Soubor "%s" byl přejmenován na "%s"', $oldFile, $newFile) . PHP_EOL;
}
