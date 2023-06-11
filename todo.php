<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>do zrobiebia</title>
</head>
<body>
    <div id="baner"><h1>lista rzeczy do zrobienia</h1></div>
    <div id="dodawanie">
        <form method="post">
            dodaj zadanie<br>
            <input type="text" name="wprowadz" ><br>
            usun wybrany numer<br>
            <input type="number" name="usuwanie"><br>
            <select name="wybor">
                <option value="puste">wybierz działanie</option>
                <option value="us">usuwanie</option>
                <option value="dod">dodawanie</option>
            </select>
            <button type="submit" value="dodaj"></button></form>
    </div>
    <div id="wynik">
        <?php
            $file=fopen('todolist.txt','a' );
            $plik=file('todolist.txt');
            if (!empty($_POST["wybor"])){
                $akcja=$_POST["wybor"];
                otworz($plik);
            }
            function otworz($plik){
                echo "<pre>";
                print_r($plik);
                echo "</pre>";
            }
            switch($akcja){
                case "us":
                    if(!empty($_POST["usuwanie"])){
                        $n=$_POST["usuwanie"];
                        $tekst=$plik[$n];
                        $content=file_get_contents("todolist.txt");
                        $content=str_replace($tekst,"",$content);
                        file_put_contents("todolist.txt",$content);
                    };
                    break;
                case "dod":
                    if(!empty($_POST["wprowadz"])){
                        $a=$_POST["wprowadz"];
                        $b=$a.''."\n";
                        fwrite($file,$b);
                    }
                    break;
            }


        ?>
    </div>
    <?php
    /*if(!empty($_POST["wprowadz"])&empty($_POST["usuwanie"])){
        $a=$_POST["wprowadz"];
        $b=$a.''."\n";
        fwrite($file,$b);
    }
    else if(!empty($_post["usuwanie"])&&empty($_POST["wprowadz"])){
        $n=$_POST["usuwanie"];
        echo $n;
        
    }*/
?>
</body>
</html>