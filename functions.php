<?php

$dosya = "notlar.txt";

// Dosya yoksa otomatik oluştur
if (!file_exists($dosya)) {
    file_put_contents($dosya, "");
}

function notEkle($not)
{
    global $dosya;

    $not = strip_tags(trim($not));
    $tarih = date("d.m.Y H:i");

    file_put_contents($dosya, "$tarih - $not" . PHP_EOL, FILE_APPEND);
}

function notlariGetir()
{
    global $dosya;

    return array_reverse(file($dosya, FILE_IGNORE_NEW_LINES));
}

function notSil($index)
{
    global $dosya;

    $notlar = file($dosya, FILE_IGNORE_NEW_LINES);

    // index düzeltmesi (ters liste)
    $gercekIndex = count($notlar) - 1 - $index;

    if (isset($notlar[$gercekIndex])) {
        unset($notlar[$gercekIndex]);

        file_put_contents(
            $dosya,
            implode(PHP_EOL, $notlar) . PHP_EOL
        );
    }
}
