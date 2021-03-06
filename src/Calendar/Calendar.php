<?php
class Calendar{
    const WEEK = array("日", "月", "火", "水", "木", "金", "土");
    const HOLIDAY_INDEX = array(0, 6);

    public function dispYear($year, $size){

        //12カ月分のカレンダーを表示する。
        for($i = 1; $i <= 12; $i++){
            dispMonth($year, $i);
        }
    }

    /**
     * dispMonth()
     * 指定した年月のカレンダーを表示する。
     * 
     * @param string $year
     * @param string $month
     */
    public function dispMonth(string $year, string $month){

        $date = new DateTime($year."/".$month."/01");

        echo $year."年".$month."月"."<br>\n";

        echo "<table border=\"1\" style=\"width:200px;\">\n";

        //タイトル行表示
        echo "    <tr style=\"text-align:center;\">";
        for ($i = 0; $i <= count(Calendar::WEEK) - 1; $i++){

            //休日の場合は背景色を変更する
            echo "<td".$this->getDayOfWeekColor($i).">";
            echo Calendar::WEEK[$i];
            echo "</td>";
        }

        echo "</tr>\n";

        //1ヶ月分のカレンダーを表示する。
        while($date->format("Y/m") === $year."/".$month){
            echo "    <tr style=\"text-align:right;\">";

            //１週間(日～土)分の日付を表示する。
            for ($i = 0; $i <= 6; $i++){
        
                //休日の場合は背景色を変更する
                echo "<td".$this->getDayOfWeekColor($i).">";

                if ($month === $date->format("m")){
                    if ($i === (int)$date->format("w")){
                        echo $date->format("j");
                        $date = $date->modify('+1 day');
                    }
                }
                echo "</td>";
            }
            echo "</tr>\n";
        }
        echo "</table>";
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function getDayOfWeekColor(int $DayOfWeekIdx):string{

        $color = "";

        if (in_array($DayOfWeekIdx, Calendar::HOLIDAY_INDEX)){
            $color = " style=\"background-color:#ff7f50;\"";
        }

        return $color;
    }

    /**
     * Undocumented function
     *
     * @return date
     */
    private function getHolidays():date{

    }

}
