<?php


    error_reporting(E_ALL & ~E_DEPRECATED);
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);

    $rasp = array(
        'rasp_start' => '',
        'rasp_end' => '',
        'counter' => '',
        'table' => array(
            'time' => '',
            'name' => '',
            'teacher' => ''
        )
    );

    header('Content-Type: text/html; charset=utf-8');
    require 'vendor/autoload.php';
    $reader = new \Asika\Pdf2text;

    $group_index = htmlspecialchars(trim($_GET['q']));
    $url = 'https://mrk-bsuir.by/index.php';

    $doc = file_get_contents($url);

    $pdf_url = substr(explode(' ', htmlspecialchars(stristr($doc, '<a href="https://mrk-bsuir.by/files/')))[1], 11, -6);
    $output = stristr($reader->decode($pdf_url), $_GET['q']);

    $get_current_rasp = explode(' ', substr(explode('К', $output)[1], 12, -3));
    if (isset($_GET['debug'])) {
        print_r($get_current_rasp);
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/png" href="/application/assets/media/favicon.png">
    <link rel="stylesheet" type="text/css" href="/application/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="/application/assets/css/fonts.css">
    <script type="text/javascript" src="/application/assets/js/jquery-3.6.0.min.js"></script>
    <title>Группа <?= $_GET['q']; ?> | Расписание занятий</title>
</head>
<body>
<div id="root">
    <div class="left">
        <div class="logotype">
            <img alt="LOGO" src="/application/assets/media/favicon.png" class="logotype-icon">
            <span>БГУИР филиал МРК</span>
        </div>

        <div class="rasp-content">
            <div class="rasp-c-time">
                Занятия с <span><?= str_replace(':', '0:0', substr($get_current_rasp[4], 0, 6)) ?></span> до <span><?= str_replace(':', '0:0', substr($get_current_rasp[16], -7, 6)) ?></span>
            </div>

            <div class="rasp-c-table">
                <table class="rasp-table">
                    <tr>
                        <th>Время</th>
                        <th>Занятие</th>
                        <th>Преподаватель</th>
                    </tr>

                    <tr>
                        <td><?= str_replace(':', '0:0', $get_current_rasp[4]) ?></td>
                        <td><?= $get_current_rasp[0].' '.$get_current_rasp[1].' '.$get_current_rasp[2].', '.$get_current_rasp[6] ?></td>
                        <td><?= $get_current_rasp[7]; ?></td>
                    </tr>

                    <tr>
                        <td><?= str_replace(':', '0:0', $get_current_rasp[16]) ?></td>
                        <td><?= $get_current_rasp[12].' '.$get_current_rasp[13].' '.$get_current_rasp[14].', '.$get_current_rasp[17] ?></td>
                        <td><?= $get_current_rasp[17]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="right">
        <div class="rasp-info">
            Расписание для группы <b><?= $_GET['q'] ?></b> на <b><?= date('d.m.Y') ?></b>
        </div>

        <div class="f-crc">
            <a href="https://instagram.com/cloudexstudio/" class="f-crc-madeby">
                <span>Мы сделали это в</span>
                <img alt="CEST" src="/application/assets/media/cest.jpg" class="fc-mb-icon">
            </a>
        </div>
    </div>
</div>
</body>
</html>