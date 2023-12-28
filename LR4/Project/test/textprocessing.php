<?php
//1V 7V 12 17V

require_once("presets.php");

$textProcessing = new TextProcessing($text);

class TextProcessing{
    public $textBody;
    public $dom;
    public $text_replaced;

    public function __construct($text){
        $this->textBody = $text;

        $this->dom = new DOMDocument();
        if ($this->textBody != ''){
            @$this->dom->loadHTML("\xEF\xBB\xBF" . $this->textBody, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        }
        else
            @$this->dom->loadHTML(' ');
    }

    public function viewText(){
        echo $this->textBody;
    }


    // 1 - Найти заголовки 1-2 уровня в тексте вывести их в виде многоуровневого списка
    public function Task3(){
        $xpath = new DOMXPath($this->dom);

        $headings1xpath = '//h1';
        $headings1 = $xpath->query($headings1xpath);
        echo "<ol class='ols'>";
        foreach ($headings1 as $index => $heading1) {
            $numIndex = $index+1;

            $heading1Text = $heading1->textContent;

            echo "<li class='lis'><h1 class='h1c'>{$heading1Text}</h1><ol class='ols'>";

            $headings2xpath = "({$headings1xpath})[{$numIndex}]/following-sibling::h2";
            $headings2 = $xpath->query($headings2xpath);

            foreach ($headings2 as $heading2) {
                $heading2Text = $heading2->textContent;
                echo "<li class='lis'><h2 class='h2c'>{$heading2Text}</h2></li>";
            }

            echo '</ol></li>';
        }
        echo "</ol>";
    }


    // 7 - Удалить повторяющиеся знаки препинания (восклицательные и вопросительные обрезаются
    // до трех, море точек — до многоточия).
    public function Task7(){
        // Задание массива паттернов для поиска многоточий, вопросов, знаков вопроса или запятых
        $patterns = array();
        $patterns[0] = '/\.{3,}/';
        $patterns[1] = '/\!{4,}/';
        $patterns[2] = '/\?{4,}/';
        $patterns[3] = '/\,{4,}/';

        // Задание массива для замен на одно троеточие, три восклицательных и вопросительных знака,
        // одну запятую :о
        $replacements = array();
        $replacements[3] = '…';
        $replacements[2] = '!!!';
        $replacements[1] = '???';
        $replacements[0] = ',';

        // Вывод и, собственно, замена
        echo preg_replace($patterns, $replacements, $this->textBody);
    }


    // 11 - Автоматически сформировать работающее оглавление по заголовкам 1-3 уровня.
    // Под формой должен быть выведено оглавление с отступами по уровням заголовков. Нажатие на
    // заголовок в оглавлении перекидывает на соответствующий заголовок в полный текст.
    public function Task11(){
        $tables = $this->dom->getElementsByTagName('table');

        // Начнем счетчик для нумерации таблиц
        $tableCounter = 1;

        echo '<ul>';

        // Обходим все найденные таблицы
        foreach ($tables as $table) {
            // Получаем первую ячейку в таблице
            $firstCell = $table->getElementsByTagName('td')->item(0);

            // Проверяем, есть ли хотя бы одна ячейка в таблице
            if ($firstCell) {
                // Выводим ссылку на таблицу с номером и содержимым первой ячейки
                echo '<li>';
                echo 'Таблица ' . $tableCounter . ': "' . $firstCell->textContent . '"';
                echo '</li>';

                // Увеличиваем счетчик таблиц
                $tableCounter++;
            }
        }

        echo '</ul>';
    }

    // 17 - Подсветить в тексте технические повторы. Если дважды подряд вставлено одно и то же слово,
    // второе вхождение должно быть подсвечено желтым фоном. Если слово вставлено 3, 4, более раз
    // подряд, все вхождения после первого подсвечиваются.
    public function Task17(){
        $clear = strip_tags($this->textBody);

        $this->textBody = preg_replace_callback('/(\b\w+\b)/ui', function($matches) {
            static $prevWord = null;
            static $count = 0;

            $currentWord = $matches[1];

            // Check if it's the same as the previous word (case-insensitive)
            if (strcasecmp(mb_strtolower($currentWord), $prevWord) === 0) {
                $count++;
            } else {
                $count = 0;
            }

            $prevWord = mb_strtolower($currentWord);

            if ($count > 0) {
                return "<span style='background-color: #FFBF00;'>$currentWord</span>";
            } else {
                return $currentWord;
            }
        }, $clear);

        echo $this->textBody;
    }

}
