<?php

session_start();
include('../dbcon.php');


/*----------DRUGA TABELA------------------------------*/
/* -------------DELETE podaci2------------------------*/


if (isset($_POST['delete_user2']))
{
    $user_id = $_POST['delete_user2'];

    try 
    {
        $query = "DELETE FROM druga_tabela WHERE uid2 = :user_id LIMIT 1";
        $statement = $conn->prepare($query);
        /*$statement->execute([':user_id']);*/
        $data = [':user_id' => $user_id];
        $query_execute = $statement->execute($data);

        
        if($query_execute)
        {
            $_SESSION ['message'] = "Uspjesno Izbrisano";
            header ('Location: index2.php');
            move_uploaded_file($tmp_name, "upload/$uimage");
            exit(0);
        }
        else
        {
            $_SESSION ['message'] = "Greska, Nije isbrisano!!!";
            header('Location: index2.php');
            exit(0);
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

/* -------Podaci 2 dio EDIT------------------------------------------------------------- */ 

if(isset($_POST['update_user_btn2']))
{

    $uemail = $_POST['uemail'];
    $upwd = $_POST['upwd'];
    $udetails = $_POST['udetails'];
    $emailReg_date = $_POST['emailReg_date'];
    $user_id = $_POST['user_id'];    

    try{
        $query = "UPDATE druga_tabela SET uemail=:uemail, upwd=:upwd, udetails=:udetails, emailReg_date=:emailReg_date WHERE uid2=:user_id LIMIT 1";
        $statement = $conn->prepare($query);
    
        $data = 
        [
            'uemail' => $uemail,
            'upwd' => $upwd,
            'udetails' => $udetails,
            ':emailReg_date' => $emailReg_date,
            ':user_id' => $user_id,
        ];
    
        $query_execute =  $statement->execute($data);
            if($query_execute)
            {
                $_SESSION ['message'] = "Uspjesno Izmijenjeno";
                header ('Location: index2.php');
                exit(0);
            }
            else
            {
                $_SESSION ['message'] = "Greska, Nije izmjenjeno!!!";
                header('Location: index2.php');
                exit(0);
            }
    
            }
        catch (Exception $e){   
            echo $e->getMessage();
        }
    
}

/*----------PODACI 2dio---UNOS--------------------------------------------------------------------------------------*/   
    

if(isset($_POST['save_user_btn2']))
{
    $uemail = $_POST['uemail'];
    $upwd = $_POST['upwd'];
    $udetails = $_POST['udetails'];
    $emailReg_date = $_POST['emailReg_date'];

    $query = "INSERT INTO druga_tabela (uemail, upwd, udetails, emailReg_date) VALUES (:uemail, :upwd, :udetails, :emailReg_date)";
    $query_run = $conn->prepare($query);

    $data = 
    [
        ':uemail' => $uemail,
        ':upwd' => $upwd,
        ':udetails' => $udetails,
        ':emailReg_date' => $emailReg_date, 
    ];

    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION ['message'] = "Uspjesno uneseno";
        header ('Location: ../table3/index3.php');
        exit(0);
    }
    else
    {
        $_SESSION ['message'] = "Greska, Nije uneseno";
        header('Location: index2.php');
        exit(0);
    }
}


?>