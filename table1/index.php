<?php 
session_start();
include('../dbcon.php');
?>

<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-dscale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>PHP PDO CRUD</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-10 mt-4">
                    


                    <?php if (isset($_SESSION['message'])) :?>
                        <h5 class="alert alert-success"><?= ($_SESSION['message']) ?></h5>
                    <?php 
                        unset($_SESSION['message']);
                        endif; ?>


                    <div class="card">
                        <div class="card-header">
                            <h3>PHP PDO CRUD
                            <a href="user-add.php" class="btn btn-primary float-end">Dodaj Korisnika</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ime</th>
                                    <th>Prezime</th>
                                    <th>DOB(godine)</th>
                                    <th>slika</th>
                                    <th>Datum registracije/izmjene</th>
                                    <th>Radnja</th>
                                    <th>Radnja</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $query = "SELECT * FROM prva_tabela";
                                    $statement =$conn->prepare($query);
                                    $statement->execute();

                                    $statement->setFetchMode(PDO::FETCH_OBJ);
                                    $result = $statement->fetchAll();//PDO::FETCH_ASSOC
                                    if ($result)
                                    {
                                        foreach ($result as $item)
                                        {
                                            ?>
                                            </tr>
                                                <td> <?= $item->uid1 ?></td>
                                                <td> <?= $item->uname ?></td>
                                                <td> <?= $item->ulastname ?></td>
                                                <td> <?= $item->uage ?></td>
                                                <td> <?= $item->uimage ?></td>
                                                <td> <?= $item->register_date ?></td>
                                                <td>
                                                    <a href="user-edit.php?uid1=<?= $item->uid1; ?>" class="btn btn-primary">Izmjeni</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <button type="submit" name="delete_user" value="<?= $item->uid1 ?>" class="btn btn-danger">Izbriši</button>
                                                </td>
                                                </form>
                                            </tr>   
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        
                                    
                                        ?>
                                        <tr>
                                            <td colspan="6">Nema snimljenih podataka</td>
                                        </tr>
                                            <?php
                                        }
                                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>