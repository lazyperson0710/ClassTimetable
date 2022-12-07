<?php

class Main {

    private static array $class = [];

    private const CLASS_TIME_50 = [
        1 => '8:50 ~ 9:40',
        2 => '9:50 ~ 10:40',
        3 => '10:50 ~ 11:40',
        4 => '11:50 ~ 12:40',
        5 => '13:25 ~ 14:15',
        6 => '14:25 ~ 15:15',
    ];

    public function init(): void {
        $this->ClassSubjectRegistration('Monday', '家庭総合', '芸術', '芸術', '情報の科学', '物理基礎', 'LHR');
        $this->ClassSubjectRegistration('Tuesday', '基礎情報', '基礎情報', '数学Ⅱ', '体育', '世界史A', '物理基礎');
        $this->ClassSubjectRegistration('Wednesday', '現代文B', '体育', 'コミュ英', '世界史A', '数学Ⅱ', '英語表現');
        $this->ClassSubjectRegistration('Thursday', '物理基礎', '現代文B', '情報の科学', '世界史A', 'コミュ英', '総合');
        $this->ClassSubjectRegistration('Friday', '保健', 'コミュ英', '体育', '数学Ⅱ', '家庭総合', '英語表現');
    }

    private function ClassSubjectRegistration(string $days_of_the_week, string $first_period, string $two_period, string $three_period, string $four_period, string $five_period, string $six_period): void {
        if (!in_array($days_of_the_week, ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'])) {
            echo '曜日が不正です';
            return;
        }
        self::$class[$days_of_the_week] = [
            1 => $first_period,
            2 => $two_period,
            3 => $three_period,
            4 => $four_period,
            5 => $five_period,
            6 => $six_period,
        ];
    }

    public static function getClassTime(int $class_time): string {
        return self::CLASS_TIME_50[$class_time];
    }

    public static function getClassSubject(string $days_of_the_week, int $class_time): string {
        if (!in_array($days_of_the_week, ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'])) {
            return '曜日が不正です';
        }
        return self::$class[$days_of_the_week][$class_time];
    }

}