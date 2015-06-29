<?php
/**
 * Require: PHP 5.6.
 * Author: Dariusz Wrzesień dariuszwrzesien@gmail.com (14.06.2015)
 */
    const NUM_COLUMNS = 4;

    $info  = false;
    $post  = $_POST?:"";
    $grouped = [];
    $table = [];
    $tableView = [];

    //Sprawdzenie czy nadeszły dane
    if (is_array($post) && array_key_exists('input', $post)) {
        //Podział na grupy
        $groups = preg_split('/\\n\\s+/', $post['input'], -1);

        //Sprawdzenie czy została przesłana odpowiednia liczba grup
        if (NUM_COLUMNS <= count($groups)) {

            //Sortowanie alfabetyczne grup
            uasort($groups, function($a, $b){

                $a = strtolower($a);
                $b = strtolower($b);

                if ($a == $b) {
                    return 0;
                }
                return ($a < $b)?-1:1;
            });

            //Reindex po sortowaniu
            $groups = array_values($groups);

            //Podział grup na kategorie
            foreach ($groups as $key => $value) {
                $filteredValue = array_filter(explode(",", preg_replace("/\\n/", ",", $value)));
                natsort($filteredValue);
                $grouped[$key] = $filteredValue;
            }

            //Zliczenie wszystkich elementów
            $elementsCount = 0;
            array_walk($grouped, function($collection) use (&$elementsCount) {
                $elementsCount += count($collection);
            });

            //Wyliczenie ilości wierszy
            $computeSize = function($group) use ($elementsCount) {
                $cellSpacing = (count($group) - 1);
                return round($elementsCount + $cellSpacing) / NUM_COLUMNS;
            };

            //Tworzenie tablicy wynikowej
            $tableSize = $computeSize($grouped);
            foreach ($grouped as $group) {
                $groupNumber = 0;
                //Tworzenie kolumn
                for ($i = 0; $i < NUM_COLUMNS; $i++) {
                    //Tworzenie wierszy
                    for ($j = 0; $j < $tableSize;) {
                        //Wypełnianie wierszy danymi grupy
                        for ($k = 0; $k < count($grouped[$groupNumber]); $k++) {
                            $table[$i][$j] = $grouped[$groupNumber][$k];
                            $j++;
                        }
                        //Dodanie przerwy przed kolejną grupą
                        if (array_key_exists($groupNumber + 1, $grouped)
                            && $j + count($grouped[$groupNumber + 1]) < $tableSize)
                        {
                            $table[$i][$j] = "";
                            $j++;
                        } else {
                            //Wypełnienie kolumny pustymi danymi
                            while ($j < $tableSize) {
                                $table[$i][$j] = "";
                                $j++;
                            }
                        }
                        $groupNumber++;
                    }
                }
            }
            //Przygotowanie tablicy do prezentacji
            foreach ($table as $key => $row) {
                foreach ($row as $field => $value) {
                    $tableView[$field][] = $value;
                }
            }
        } else {
            $info = "Info: Wymagane są co najmniej 4 grupy kategorii. Grupy oddziel pustymi wierszami.";
        }
    } else {
        $info = "Info: Wypełnij formularz danymi. (Minimum 4 grupy oddzielone pustym wierszem)";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grupowanie</title>
    <style type="text/css">
        textarea, input{
            display: block;
        }
        textarea{
            min-width: 400px;
        }
        .info{
            font-size: 10px;
            color: #A22;
        }
        table, tr, td{
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <span class="info" style="display:<?php echo ($info)?'block':'none';?>"><?php echo $info; ?></span>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
        <textarea name="input"></textarea>
        <input type="submit" name="submit" value="Wyślij" />
    </form>
    <?php if($table && $tableView):?>
        <table cellpadding="0" cellspacing="0">
            <?php foreach($tableView as $column): ?>
                <tr>
                <?php foreach($column as $value): ?>
                    <td><?php echo $value; ?></td>
                <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
