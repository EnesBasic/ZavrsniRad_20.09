<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-dscale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Unesite podatke 2-dio</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Unesite podatke 2-dio
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                            </h3>
                        </div>
                        <div class="card-body">

                            <form action="code2.php" method="POST">
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="uemail" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="upwd" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Details:</label>
                                    <textarea class="form-control" name="udetails"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_user_btn2" class="btn btn-primary">Spasi</button>    
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