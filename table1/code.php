<?php

session_start();
include('dbcon.php');


if (isset($_POST['delete_user'])) {
    $user_id = $_POST['delete_user'];

    try 
    {
        $query = "DELETE FROM prva_tabela WHERE uid1 = :user_id LIMIT 1";
        $statement = $conn->prepare($query);
        /*$statement->execute([':user_id']);*/
        $data = [':user_id' => $user_id];
        $query_execute = $statement->execute($data);

        
        if($query_execute)
        {
            $_SESSION ['message'] = "Uspjesno Izbrisano";
            header ('Location: index.php');
            move_uploaded_file($tmp_name, "upload/$uimage");
            exit(0);
        }
        else
        {
            $_SESSION ['message'] = "Greska, Nije isbrisano!!!";
            header('Location: index.php');
            exit(0);
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}


if(isset($_POST['update_user_btn'])){

    $user_id = $_POST['user_id'];    
    $uname = $_POST['uname'];
    $ulastname = $_POST['ulastname'];
    $uage = $_POST['uage'];
    $uimage = $_FILES ['uimage']['name'];
    $tmp_name = $_FILES ['uimage']['tmp_name'];
    $register_date = $_POST['register_date'];
    
    try{
        $query = "UPDATE prva_tabela SET uname=:uname, ulastname=:ulastname, uage=:uage, uimage=:uimage, register_date=:register_date WHERE uid1=:user_id LIMIT 1";
        $statement = $conn->prepare($query);
    
        $data = 
        [
            'uname' => $uname,
            'ulastname' => $ulastname,
            'uage' => $uage,
            ':uimage' => $uimage,
            ':register_date' => $register_date,
            ':user_id' => $user_id,
        ];
    
        $query_execute =  $statement->execute($data);
            if($query_execute)
            {
                $_SESSION ['message'] = "Uspjesno Izmijenjeno";
                header ('Location: index.php');
                move_uploaded_file($tmp_name, "upload/$uimage");
                exit(0);
            }
            else
            {
                $_SESSION ['message'] = "Greska, Nije izmjenjeno!!!";
                header('Location: index.php');
                exit(0);
            }
    
            }
        catch (Exception $e){   
            echo $e->getMessage();
        }
    
    }




if(isset($_POST['save_user_btn']))
{
    $uname = $_POST['uname'];
    $ulastname = $_POST['ulastname'];
    $uage = $_POST['uage'];
    $uimage = $_FILES ['uimage']['name'];
    $tmp_name = $_FILES ['uimage']['tmp_name'];
    $register_date = $_POST['register_date'];

    $query = "INSERT INTO prva_tabela (uname, ulastname, uage, uimage, register_date) VALUES (:uname, :ulastname, :uage, :uimage, :register_date )";
    $query_run = $conn->prepare($query);

    $data = 
    [
        ':uname' => $uname,
        ':ulastname' => $ulastname,
        ':uage' => $uage,    
        ':uimage' => $uimage,
        ':register_date' => $register_date,
    ];

    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION ['message'] = "Uspjesno uneseno";
        header ('Location: ../table2/index2.php');
        move_uploaded_file($tmp_name, "upload/$uimage");
        exit(0);
    }
    else
    {
        $_SESSION ['message'] = "Greska, Nije uneseno";
        header('Location: index.php');
        exit(0);
    }





}
?>