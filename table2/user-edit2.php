<?php
include('../dbcon.php');
?>


<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-dscale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Izmjenite podatke 2-dio</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Izmjenite podatke 2-dio
                            <a href="index2.php" class="btn btn-danger float-end">BACK</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <?php
                                if(isset($_GET['uid2']))
                                {
                                    $user_id = $_GET['uid2'];
                                    $query = "SELECT * FROM druga_tabela WHERE uid2 = :user_id LIMIT 1"; 
                                    $statement  = $conn->prepare($query);
                                    $data =[':user_id' => $user_id];
                                    $statement->execute($data);
                                    $result = $statement->fetch(PDO::FETCH_OBJ);
                                }
                                                               
                            ?>
                            <form action="code2.php" method="POST">
                                <input type="hidden" name="user_id" value="<?= $result->uid2 ?>">
                                    <div class="mb-3">
                                        <label>Email:</label>
                                        <input type="text" name="uemail" value="<?= $result->uemail; ?>" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Password:</label>
                                        <input type="password" name="upwd" value="<?= $result->upwd; ?>" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Details:</label>
                                        <input type="text" name="udetails" value="<?= $result->udetails; ?>" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_user_btn2" class="btn btn-primary">Izmjeni</button>    
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>