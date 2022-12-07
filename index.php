<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>授業スケジュール</title>
    <link rel="icon" type="image/svg+xml" sizes="150x150" href="assets/img/f_f_business_41_svg_f_business_41_0bg.svg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body style="border-color: rgb(54, 57, 63);background: rgb(54, 57, 63);color: rgb(220, 221, 222);">
<div class="container">
    <h2>授業スケジュール</h2>
    <div class="table-responsive" style="color: rgb(220, 221, 222);--bs-dark: #2f3136;--bs-dark-rgb: 47,49,54;">
        <table class="table">
            <thead>
            <tr>
                <?php
                date_default_timezone_set('Asia/Tokyo');
                $day = date('w');
                $days_of_the_week = match ((int)$day) {
                    0, 1, 6 => '月',//0^Sunday , 6^Saturday
                    2 => '火',
                    3 => '水',
                    4 => '木',
                    5 => '金',
                    default => 'Unknown'
                };
                $content = [
                    '時間',
                    '何限',
                    '月',
                    '火',
                    '水',
                    '木',
                    '金',
                ];
                foreach ($content as $item) {
                    if ($item === $days_of_the_week) {
                        echo '<th class="text-truncate border rounded-0 border-1 border-dark" style="color: rgb(20, 221, 222);--bs-dark: #2f3136;--bs-dark-rgb: 47,49,54;">' . $item . '</th>';
                    } else {
                        echo '<th class="text-truncate border rounded-0 border-1 border-dark" style="color: rgb(220, 221, 222);--bs-dark: #2f3136;--bs-dark-rgb: 47,49,54;">' . $item . '</th>';
                    }
                }
                ?>
            </tr>
            </thead>
            <tbody class="text-truncate border rounded-0 border-1 border-dark"
                   style="color: rgb(220, 221, 222);--bs-dark: #2f3136;--bs-dark-rgb: 47,49,54;">
            <?php
            require_once './Main.php';
            (new Main())->init();
            for ($i = 1; $i <= 6; $i++) {
                echo '<tr class="text-truncate border rounded-0 border-1 border-dark" style="color: rgb(220, 221, 222);--bs-dark: #2f3136;--bs-dark-rgb: 47,49,54;">';
                echo '<td class="text-truncate border rounded-0 border-1 border-dark" style="color: rgb(220, 221, 222);--bs-dark: #2f3136;--bs-dark-rgb: 47,49,54;">' . Main::getClassTime($i) . '</td>';
                echo '<td class="text-truncate border rounded-0 border-1 border-dark" style="color: rgb(220, 221, 222);--bs-dark: #2f3136;--bs-dark-rgb: 47,49,54;">' . $i . '限</td>';
                for ($j = 1; $j <= 5; $j++) {
                    $days_of_the_week = match ($j) {
                        1 => 'Monday',
                        2 => 'Tuesday',
                        3 => 'Wednesday',
                        4 => 'Thursday',
                        5 => 'Friday',
                    };
                    if ($j === (int)$day){
                        echo '<td class="text-truncate border rounded-0 border-1 border-dark" style="color: rgb(20, 221, 222);--bs-dark: #2f3136;--bs-dark-rgb: 47,49,54;">' . Main::getClassSubject($days_of_the_week, $i) . '</td>';
                    } else {
                        echo '<td class="text-truncate border rounded-0 border-1 border-dark" style="color: rgb(220, 221, 222);--bs-dark: #2f3136;--bs-dark-rgb: 47,49,54;">' . Main::getClassSubject($days_of_the_week, $i) . '</td>';

                    }
                }
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>