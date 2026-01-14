<?php

function notEkle($not)
{
    $not = strip_tags(trim($not));
    $tarih = date("d.m.Y H:i");
    file_put_contents("notlar.txt", "$tarih - $not" . PHP_EOL, FILE_APPEND);
}

function notlariGetir()
{
    if (!file_exists("notlar.txt")) {
        return [];
    }

    return array_reverse(file("notlar.txt", FILE_IGNORE_NEW_LINES));
}

function notSil($index)
{
    if (!file_exists("notlar.txt")) {
        return;
    }

    $notlar = file("notlar.txt", FILE_IGNORE_NEW_LINES);

    // index düzeltmesi
    $gercekIndex = count($notlar) - 1 - $index;

    if (isset($notlar[$gercekIndex])) {
        unset($notlar[$gercekIndex]);
        file_put_contents(
            "notlar.txt",
            implode(PHP_EOL, $notlar) . PHP_EOL
        );
    }
}
