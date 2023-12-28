<?php

require 'C:/xampp/htdocs/LR2/Project/lib/simple_html_dom.php';


function task0($html)
{
    $replacementMap = [
        'а' => 'е',
        'е' => 'а',
        'в' => 'ф',
        'ф' => 'в',
        'А' => 'Е',
        'Е' => 'А',
        'В' => 'Ф',
        'Ф' => 'В',
        'у' => 'ву'

    ];

    libxml_use_internal_errors(true);

    $dom = new DOMDocument;
    $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

    $xpath = new DOMXPath($dom);
    $elements = $xpath->query("//body//text()");

    foreach ($elements as $element) {
        $plaintext = $element->nodeValue;

        // Заменяем буквы в тексте с сохранением смысла
        $plaintext = strtr($plaintext, $replacementMap);

        $element->nodeValue = $plaintext;
    }

    libxml_clear_errors();
    $bodyContent = '';

    foreach ($dom->getElementsByTagName('body')->item(0)->childNodes as $child) {
        $bodyContent .= $dom->saveHTML($child);
    }

    return $bodyContent;
}







function task1($text)
{
    $result = '';
    $countH1 = 0;
    $countH2 = 0;
    foreach ($text->find('h1, h2') as $t) {
        if ($t->tag == 'h1') {
            $result .= ++$countH1 . '.' . $t->plaintext . '<br>';
            $countH2 = 0;
        } else {
            $result .= '&emsp;' . $countH1 . '.' . ++$countH2 . '.' . $t->plaintext . '<br>';
        }
    }
    return $result;
}

function truncateText($strText, $intLen)
{
    $strText = trim(mb_convert_encoding($strText, 'UTF-8'));
    if (mb_strlen($strText) > $intLen)
        return rtrim(mb_substr($strText, 0, $intLen, 'UTF-8'), ".") . "...";
    else
        return $strText;
}

function insert($str, $pos, $insertstr)
{
    if (!is_array($pos)) {
        $pos = array($pos);
    } else {
        asort($pos);
    }
    $insertionLength = strlen($insertstr);
    $offset = 0;
    foreach ($pos as $p) {
        $str = mb_substr($str, 0, $p + $offset) . $insertstr . mb_substr($str, $p + $offset);
        $offset += $insertionLength;
    }
    return $str;
}

function task2($text)
{
    $cleared = '';
    foreach ($text->find('*') as $item) {
        $cleared .= $item->plaintext;
    }

    $a = truncateText($cleared, 80);
    return insert($a, mb_strripos($a, ' ', -1), '<a href="https://intervolga.ru">') . '</a>';
}

function task3($text)
{
    $res = '<ul>';
    $c = 1;
    foreach ($text->find('a') as $item) {
        $res .= '<li style="text-align: left">' . $c++ . '. ' . $item->plaintext . '<span><</span>a> </li>';
        if ($c>100) break;
    }
    $res .= '<ul>';
    return $res;
}

function task4($text)
{
    $cleared = '';
    foreach ($text->find('*') as $item) {
        $cleared .= $item->plaintext;
    }
    $cleared = mb_convert_encoding($cleared, 'UTF-8');

    $matches = [];
    preg_match_all('/(\p{L}[^a-zA-Z&,\-\s]){4,}/ui', $cleared, $matches);

    $res = [];

    foreach ($matches[0] as $m) {
        if (!array_key_exists($m, $res)) {
            $res[$m] = 1;
        } else {
            $res[$m] = $res[$m] + 1;
        }
    }
    $r = '<ol>';
    array_multisort($res);
    $c = 0;
    foreach (array_reverse($res) as $w => $p) {
        $r .= '<li>' . $w . ' - ' . $p . '</li>';
        if ($c++ > 98) break;
    }
    $r .= '</ol>';
    return $r;
}

$text1 = '';
$text2 = '';
$input = '';
if (isset($_POST['preset'])) {
    $preset = $_POST['preset'];
    $url = '';
    if ($preset == '1') $url = 'https://ru.wikipedia.org/wiki/%D0%9A%D0%B8%D0%BD%D0%BE%D1%80%D0%B8%D0%BD%D1%85%D0%B8';
    if ($preset == '2') $url = 'https://www.gazeta.ru/culture/2021/12/16/a_14322589.shtml';
    if ($preset == '3') $url = 'C:\xampp\htdocs\LR2\Project\winni.html';
    if ($preset == '4') $url = 'https://www.culture.ru/poems/4450/skazka-o-rybake-i-rybke';
    $input = file_get_html($url);
} else {
    $input = str_get_html($_POST['text'] ?? '');
}

if ($input) {
    $text1 = task1($input);

    $text2 = task2($input);

    $text3 = task3($input);

    $text4 = task4($input);

    $text0 = task0($input);

}
