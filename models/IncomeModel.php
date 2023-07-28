<?php

namespace app\models;

use app\core\DbModel;

class IncomeModel extends DbModel
{

    public $priceFrom;
    public $priceTo;


    public function getIncome($priceFrom, $priceTo) {

        if (!$this->priceFrom)
        {
            $this->priceFrom = 0;
        }

        if (!$this->priceTo)
        {
            $this->priceTo = 1000000;
        }

        $dbResult= $this->db->con()->query("SELECT MONTHNAME(check_in) AS mesec , month(check_in) AS mesec_int, SUM(total_price) AS total_price FROM reservation WHERE total_price > '$priceFrom' AND total_price < '$priceTo'GROUP BY mesec_int ASC");
        $resultArray = [];

        while($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        return $resultArray;

    }



    public function tableName()
    {
        return '';
    }

    public function attributes(): array
    {
       return [];
    }
}