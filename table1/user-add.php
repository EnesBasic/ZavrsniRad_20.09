<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-dscale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Unesite podatke u Bazu podataka koristeci PHP PDO</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Unesite podatke
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                            </h3>
                        </div>
                        <div class="card-body">


                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label>Ime Korisnika</label>
                                    <input type="text" name="uname" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Prezime korisnika</label>
                                    <input type="text" name="ulastname" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Dob korisnika</label>
                                    <input type="text" name="uage" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Slika korisnika</label>
                                    <input type="file" name="uimage"  class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_user_btn" class="btn btn-primary">Spasi</button>    
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