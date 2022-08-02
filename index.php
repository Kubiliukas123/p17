<?php
include "../p17/controlers/UserControler.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['save'])) {
        $hasErrors = UserController::store();
        if (!$hasErrors) {
            header("Location:" . $_SERVER['REQUEST_URI']);
        }
    }

    if (isset($_POST['edit'])) {
        $user = UserController::show();
    }

    if (isset($_POST['update'])) {
        UserController::update();
        header("Location:" . $_SERVER['REQUEST_URI']);
    }

    if (isset($_POST['destroy'])) {
        UserController::destroy();
        header("Location:" . $_SERVER['REQUEST_URI']);
    }
}

$users = UserController::index();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Document</title>
</head>

<body>
    <div class="bg-img">
        <div class="container">
            <form action="" method="post">
                <label for="name">Vardas</label>
                <input type="text" name="name" class="form-control input" placeholder="Vardas" <?= isset($_POST['edit']) ? 'value="' . $user->name . '"' : "" ?>>
                <label for="name">Pavardė</label>
                <input type="text" name="surname" class="form-control input" placeholder="Pavardė" <?= isset($_POST['edit']) ? 'value="' . $user->surname . '"' : "" ?>>
                <label for="name">e-paštas</label>
                <input type="email" name="email" class="form-control input" placeholder="e-paštas" <?= isset($_POST['edit']) ? 'value="' . $user->email . '"' : "" ?>>
                <label for="name">Telefono numeris</label>
                <input type="text" name="phoNo" class="form-control input" placeholder="Telefono numeris" <?= isset($_POST['edit']) ? 'value="' . $user->phone_number . '"' : "" ?>>
                <?= isset($_POST['edit']) ? '<input type="hidden" name="id" value="' . $user->id . '">' : "" ?>
                <button type="submit" class="btn btn-primary" name=
                <?= isset($_POST['edit']) ? '"update" >Naujinti' :'"save" >Saugoti'?>
            </button>

<!-- <?php 
if (isset($_POST['edit'])) {
   echo '<button type="submit" class="btn btn-danger" name="update" value="'.$user->id.'" >Naujinti</button>';
}else {
    echo '<button type="submit" class="btn btn-primary" name="save">Saugoti</button>';
}
if (isset($_POST['edit'])) { ?>
    <button type="submit" class="btn btn-danger" name="update" value="<?=$user->id?>" >Naujinti</button>
<?php  } else { ?>
    <button type="submit" class="btn btn-primary" name="save">Saugoti</button>
<?php } ?> -->




            </form>


           
            <table class="table table-info table-stripped w-500">
                <thead>
                    <tr class="table table-info">

                        <th lass="table table-info ">Vardas</th>
                        <th class="table table-info">Pavardė</th>
                        <th class="table table-info">E-paštas</th>
                        <th class="table table-info">Telefono numeris</th>
                        <th class="table table-info">Keisti</th>
                        <th class="table table-info">Trinti</th>
                    </tr>
                </thead>

                <?php foreach ($users as $user) { ?>
                    <tbody>
                        <tr>
                            <td><?=$user->name?></td>
                            <td><?=$user->surname?></td>
                            <td><?=$user->email?></td>
                            <td><?=$user->phone_number?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?=$user->id?>">
                                    <button type="submit" class="btn btn-success" name="edit" value=" <?=$user->id?> " >Keisti</button>
                                </form>
                            </td>
                            <td>
                            <form action="" method="post">
                                    <input type="hidden" name="id" value="<?=$user->id?>">
                                    <button type="submit" class="btn btn-danger" name="destroy" value=" <?=$user->id?> " >Trinti</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>