<?php
session_start();
class Captcha {

    private static $_type = array('/', '*', '+', '-');

    public static function get() {
        $type = self::$_type[rand(0, 3)];
        $num1 = rand(4, 9);
        $num2 = self::_getNum($type, $num1);
        $result = array('num1' => $num1, 'num2' => $num2, 'type' => $type);
        $_SESSION['captcha'] = $result;

        return "$num1 $type $num2 =";
    }

    private static function _getNum($type, $number) {
        if ($type === '/') {
            $rand = rand(2, $number);

            while (($number % $rand === 0) === false) {
                $rand = rand(2, $number);
            }

            return $rand;
        } else if ($type === '-') {
            $rand = rand(1, $number);

            while ($number >= $rand) {
                $rand = rand(1, $number);
            }

            return $rand;
        } else if ($type === '+' || $type === '*') {
            return rand(2, $number);
        }
    }
    
    public static function check($number) {
        $data = $_SESSION['captcha'];
        unset($_SESSION['captcha']);
        
        switch ($data['type']) {
            case '*':
                return ($data['num1'] * $data['num2']) == $number;
            case '/':
                return ($data['num1'] / $data['num2']) == $number;
            case '+':
                return ($data['num1'] + $data['num2']) == $number;
            case '-':
                return ($data['num1'] - $data['num2']) == $number;
        }
    }

}
