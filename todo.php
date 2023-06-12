<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>do zrobiebia</title>
</head>
<body>
    <div id="baner"><h1>To do list</h1></div>
    <div id="dodawanie">
        <form method="post">
            Task:<br>
            <input type="text" name="wprowadz" ><br>
            choose a number to delete or modify<br>
            <input type="number" name="usuwanie"><br>
            <select name="wybor">
                <option value="puste">choose action</option>
                <option value="us">remove</option>
                <option value="dod">add</option>
                <option value="edytuj">modify</option>
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
            if(!empty($_POST["wybor"])){
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
                        case "edytuj":
                            if(!empty($_POST["wprowadz"])&&!empty($_POST["usuwanie"])){
                                $n=$_POST["usuwanie"];
                                $tekst=$plik[$n];
                                $nowe=$_POST["wprowadz"].''."\n";
                                $content=file_get_contents("todolist.txt");
                                $content=str_replace($tekst,$nowe,$content);
                                file_put_contents("todolist.txt",$content);
                            }
                            break;
                        

                }
            }


        ?>
    </div>
</body>
</html>