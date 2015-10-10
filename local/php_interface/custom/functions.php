<? if(!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED!==true) die();

/**
 *
 * функции отладки
 *
 */
if(!function_exists('show_array')) {
    function show_array() {
        if($GLOBALS['USER']->isAdmin()) {
            $arArgs = func_get_args();
            foreach($arArgs as $arArg) {
                _show_array($arArg);
            }
        }
    }
}
if(!function_exists('_show_array')) {
    function _show_array($mPrintVar) {
        echo '<pre style="font-size:11px; margin:0 0 15px 0; padding:5px; color:#000000 !important; background-color:#ededed; text-align:left !important;">'.htmlspecialchars(print_r($mPrintVar, true)).'</pre>';
    }
}
/**
 * GetWordEnding - окончание слова
 * @param float $number - число
 * @param string $zero - окончание слова для 0, 5-20, 25-30, 35-40, ...
 * @param string $one - окончание слова для 1, 21, 31, 41, ...
 * @param string $other - окончание слова для 2-4, 22-24, 32-34, 42-44, ...
 * @return string
 */
function GetWordEnding($number, $zero = 'ов', $one = 'ов', $other = 'а') {
    $number = intval($number);
    $last_char = substr($number, strlen($number)-1, 1);
    $last2char = substr($number, strlen($number)-2, 2);

    $str = '';
    if(($last_char == 0) ||
        ($last_char >= 5 && $last_char <= 9) ||
        ($last_char >= 1 && $last_char <= 9 && ($last2char < 20 && $last2char > 10) )
    ) {
        $str = $zero;

    } elseif ($last_char >= 2 && $last_char <= 4) {
        $str = $other;

    } else {
        $str = $one;

    }
    return $str;
}
