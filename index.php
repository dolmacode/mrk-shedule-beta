<?php
    if (isset($_GET['groupindex']) && !empty($_GET['groupindex'])) {
        $group_index = htmlspecialchars(trim($_GET['groupindex']));

        header('Location: ./rasp?q='.$group_index);
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
    <title>Расписание занятий</title>
</head>
<body>
    <div id="root">
        <article class="auth-form">
            <div class="logotype">
                <img alt="LOGO" src="/application/assets/media/favicon.png" class="logotype-icon">
                <span>БГУИР филиал МРК</span>
            </div>

            <div class="form-container">
                <form method="get">
                    <label for="group-input">
                        Введите номер вашей группы:
                    </label>

                    <input id="group-input" type="text" name="groupindex" class="form-input" placeholder="Например, 0k9391">

                    <button class="form-submit">Далее</button>
                </form>
            </div>

            <a href="https://instagram.com/cloudexstudio/" class="f-crc-madeby">
                <span>Мы сделали это в</span>
                <img alt="CEST" src="/application/assets/media/cest.jpg" class="fc-mb-icon">
            </a>
        </article>

        <aside class="auth-image">
            <img class="image-icon" src="/application/assets/media/book.png" alt="img">
        </aside>
    </div>
</body>
</html>