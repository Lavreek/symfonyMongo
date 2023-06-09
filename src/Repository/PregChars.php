<?php

namespace App\Repository;

class PregChars
{
    public function createPregTitle($title) : string
    {
        $pregChars = "";

        preg_match_all('#.#u', $title, $match);

        foreach ($match[0] as $char) {
            switch ($char) {
                case 'а' :
                case 'А' : {
                    $pregChars .= "[а|А]";
                    break;
                }
                case 'б' :
                case 'Б' : {
                    $pregChars .= "[б|Б]";
                    break;
                }
                case 'в' :
                case 'В' : {
                    $pregChars .= "[в|В]";
                    break;
                }
                case 'г' :
                case 'Г' : {
                    $pregChars .= "[г|Д]";
                    break;
                }
                case 'д' :
                case 'Д' : {
                    $pregChars .= "[д|Д]";
                    break;
                }

                case 'е' :
                case 'Е' : {
                    $pregChars .= "[е|Е]";
                    break;
                }

                case 'ё' :
                case 'Ё' : {
                    $pregChars .= "[ё|Ё]";
                    break;
                }

                case 'ж' :
                case 'Ж' : {
                    $pregChars .= "[ж|Ж]";
                    break;
                }

                case 'з' :
                case 'З' : {
                    $pregChars .= "[з|З]";
                    break;
                }

                case 'и' :
                case 'И' : {
                    $pregChars .= "[и|И]";
                    break;
                }

                case 'й' :
                case 'Й' : {
                    $pregChars .= "[й|Й]";
                    break;
                }

                case 'к' :
                case 'К' : {
                    $pregChars .= "[к|К]";
                    break;
                }

                case 'л' :
                case 'Л' : {
                    $pregChars .= "[л|Л]";
                    break;
                }

                case 'м' :
                case 'М' : {
                    $pregChars .= "[м|М]";
                    break;
                }

                case 'н' :
                case 'Н' : {
                    $pregChars .= "[н|Н]";
                    break;
                }

                case 'о' :
                case 'О' : {
                    $pregChars .= "[о|О]";
                    break;
                }

                case 'п' :
                case 'П' : {
                    $pregChars .= "[п|П]";
                    break;
                }

                case 'р' :
                case 'Р' : {
                    $pregChars .= "[р|Р]";
                    break;
                }

                case 'с' :
                case 'С' : {
                    $pregChars .= "[с|С]";
                    break;
                }

                case 'т' :
                case 'Т' : {
                    $pregChars .= "[т|Т]";
                    break;
                }

                case 'у' :
                case 'У' : {
                    $pregChars .= "[у|У]";
                    break;
                }

                case 'ф' :
                case 'Ф' : {
                    $pregChars .= "[ф|Ф]";
                    break;
                }

                case 'х' :
                case 'Х' : {
                    $pregChars .= "[х|Х]";
                    break;
                }

                case 'ц' :
                case 'Ц' : {
                    $pregChars .= "[ц|Ц]";
                    break;
                }

                case 'ч' :
                case 'Ч' : {
                    $pregChars .= "[ч|Ч]";
                    break;
                }

                case 'ш' :
                case 'Ш' : {
                    $pregChars .= "[ш|Ш]";
                    break;
                }

                case 'щ' :
                case 'Щ' : {
                    $pregChars .= "[щ|Щ]";
                    break;
                }

                case 'ъ' :
                case 'Ъ' : {
                    $pregChars .= "[ъ|Ъ]";
                    break;
                }

                case 'ы' :
                case 'Ы' : {
                    $pregChars .= "[ы|Ы]";
                    break;
                }

                case 'ь' :
                case 'Ь' : {
                    $pregChars .= "[ь|Ь]";
                    break;
                }

                case 'э' :
                case 'Э' : {
                    $pregChars .= "[э|Э]";
                    break;
                }

                case 'ю' :
                case 'Ю' : {
                    $pregChars .= "[ю|Ю]";
                    break;
                }

                case 'я' :
                case 'Я' : {
                    $pregChars .= "[я|Я]";
                    break;
                }

                case 'a' :
                case 'A' : {
                    $pregChars .= "[a|A]";
                    break;
                }

                case 'b' :
                case 'B' : {
                    $pregChars .= "[b|B]";
                    break;
                }

                case 'c' :
                case 'C' : {
                    $pregChars .= "[c|C]";
                    break;
                }

                case 'd' :
                case 'D' : {
                    $pregChars .= "[d|D]";
                    break;
                }

                case 'e' :
                case 'E' : {
                    $pregChars .= "[e|E]";
                    break;
                }

                case 'f' :
                case 'F' : {
                    $pregChars .= "[f|F]";
                    break;
                }

                case 'g' :
                case 'G' : {
                    $pregChars .= "[g|G]";
                    break;
                }

                case 'h' :
                case 'H' : {
                    $pregChars .= "[h|H]";
                    break;
                }

                case 'i' :
                case 'I' : {
                    $pregChars .= "[i|I]";
                    break;
                }

                case 'j' :
                case 'J' : {
                    $pregChars .= "[j|J]";
                    break;
                }

                case 'k' :
                case 'K' : {
                    $pregChars .= "[k|K]";
                    break;
                }

                case 'l' :
                case 'L' : {
                    $pregChars .= "[l|L]";
                    break;
                }

                case 'm' :
                case 'M' : {
                    $pregChars .= "[m|M]";
                    break;
                }

                case 'n' :
                case 'N' : {
                    $pregChars .= "[n|N]";
                    break;
                }

                case 'o' :
                case 'O' : {
                    $pregChars .= "[o|O]";
                    break;
                }

                case 'p' :
                case 'P' : {
                    $pregChars .= "[p|P]";
                    break;
                }

                case 'q' :
                case 'Q' : {
                    $pregChars .= "[q|Q]";
                    break;
                }

                case 'r' :
                case 'R' : {
                    $pregChars .= "[r|R]";
                    break;
                }

                case 's' :
                case 'S' : {
                    $pregChars .= "[s|S]";
                    break;
                }

                case 't' :
                case 'T' : {
                    $pregChars .= "[t|T]";
                    break;
                }

                case 'u' :
                case 'U' : {
                    $pregChars .= "[u|U]";
                    break;
                }

                case 'v' :
                case 'V' : {
                    $pregChars .= "[v|V]";
                    break;
                }

                case 'w' :
                case 'W' : {
                    $pregChars .= "[w|W]";
                    break;
                }

                case 'x' :
                case 'X' : {
                    $pregChars .= "[x|X]";
                    break;
                }

                case 'y' :
                case 'Y' : {
                    $pregChars .= "[y|Y]";
                    break;
                }

                case 'z' :
                case 'Z' : {
                    $pregChars .= "[z|Z]";
                    break;
                }

                default : {
                    $pregChars .= $char;
                }
            }
        }

        return $pregChars;
    }
}