<?php

session_start();
include('../dbcon.php');


/*----------DRUGA TABELA------------------------------*/
/* -------------DELETE podaci2------------------------*/


if (isset($_POST['delete_user3']))
{
    $user_id = $_POST['delete_user3'];

    try 
    {
        $query = "DELETE FROM treca_tabela WHERE uid3 = :user_id LIMIT 1";
        $statement = $conn->prepare($query);
        /*$statement->execute([':user_id']);*/
        $data = [':user_id' => $user_id];
        $query_execute = $statement->execute($data);

        
        if($query_execute)
        {
            $_SESSION ['message'] = "Uspjesno Izbrisano";
            header ('Location: index3.php');

            exit(0);
        }
        else
        {
            $_SESSION ['message'] = "Greska, Nije isbrisano!!!";
            header('Location: index3.php');
            exit(0);
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

/* -------Podaci 2 dio EDIT------------------------------------------------------------- */ 

if(isset($_POST['update_user_btn3']))
{

    $ucountry = $_POST['ucountry'];
    $ucity = $_POST['ucity'];
    $locReg_date = $_POST['locReg_date'];
    $user_id = $_POST['user_id'];    

    try{
        $query = "UPDATE treca_tabela SET ucountry=:ucountry, ucity=:ucity, locReg_date=:locReg_date WHERE uid3=:user_id LIMIT 1";
        $statement = $conn->prepare($query);
    
        $data = 
        [
            'ucountry' => $ucountry,
            'ucity' => $ucity,
            ':locReg_date' => $locReg_date,
            ':user_id' => $user_id,
        ];
    
        $query_execute =  $statement->execute($data);
            if($query_execute)
            {
                $_SESSION ['message'] = "Uspjesno Izmijenjeno";
                header ('Location: index3.php');
                exit(0);
            }
            else
            {
                $_SESSION ['message'] = "Greska, Nije izmjenjeno!!!";
                header('Location: index3.php');
                exit(0);
            }
    
            }
        catch (Exception $e){   
            echo $e->getMessage();
        }
    
}

/*----------PODACI 2dio---UNOS--------------------------------------------------------------------------------------*/   
    

if(isset($_POST['save_user_btn3']))
{
    $ucountry = $_POST['ucountry'];
    $ucity = $_POST['ucity'];
    $locReg_date = $_POST['locReg_date'];

    $query = "INSERT INTO treca_tabela (ucountry, ucity, locReg_date) VALUES (:ucountry, :ucity, :locReg_date)";
    $query_run = $conn->prepare($query);

    $data = 
    [
        ':ucountry' => $ucountry,
        ':ucity' => $ucity,
        ':locReg_date' => $locReg_date, 
    ];

    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION ['message'] = "Uspjesno uneseno";
        header ('Location: ../table1/index.php');
        exit(0);
    }
    else
    {
        $_SESSION ['message'] = "Greska, Nije uneseno";
        header('Location: index3.php');
        exit(0);
    }
}


?>