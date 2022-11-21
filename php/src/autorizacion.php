<?php
    require_once ('../vendor/autoload.php');
    use App\Exceptions\FormInvalidException;
    session_start();
    if (!isset($_SESSION['nick'])){
        header("Location:login.html");
    }
    $nick = $_SESSION['nick'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        extract($_POST);
            try {
            if (empty($nombre)||str_word_count($nombre)<2){
                throw new FormInvalidException('El nom no és vàlid');
            }
            if (empty($email)||!filter_var($email, FILTER_VALIDATE_EMAIL)){
                throw new FormInvalidException('El email no és vàlid');
            }
            if ($nacimiento < 1970 || $nacimiento > 2000){
                throw new FormInvalidException("La data de naixement ha d'estar entre 1970 i 2000");
            }
            if (!isset($consentimiento)){
                throw new FormInvalidException("Has de marcar el consentiment");
            }
            if (substr($_FILES['foto']['type'], 0, 5) != 'image') {
                throw new FormInvalidException("Fichero no es una imagen");
            }
            if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $array = explode('.', $_FILES['foto']['name']);
                $ext = end($array);
                $nombre = $nick.".".$ext;
                move_uploaded_file($_FILES['foto']['tmp_name'], "./fotos/{$nombre}");
            }

            header('Location:concurso.php');
        } catch (FormInvalidException $e){
            $error = $e->getMessage();
        }

    }
?>

<html>
    <head>
        <title>Autorizacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    </head>
    <body>
    <?php
    include_once ("header.php");
    if (isset($error)) {
        echo "<p style='color: red'>$error</p>";
    }
    ?>
        <form method="post" enctype="multipart/form-data" action="autorizacion.php">
            <div class="form-group row">
                <label for="nombre" class="col-4 col-form-label">Nom</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="nombre" name="nombre" placeholder="Escriu el teu nom complet" type="text" value="<?=$nombre??''?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="email" name="email" placeholder="Escriu el teu email" type="text" value="<?=$email??''?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nacimiento" class="col-4 col-form-label">Any de naixement</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="nacimiento" name="nacimiento" placeholder="Escriu el teu any de naixement" value="<?=$nacimiento??''?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="consentimiento" class="col-4 col-form-label">Foto</label>
                <div class="col-8">
                    <div class="input-group">
                        <input name="foto" type="file" />
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="consentimiento" class="col-4 col-form-label">Consentiment</label>
                <div class="col-8">
                    <div class="input-group">
                        <input class="form-check-input" type="checkbox" name="consentimiento" <?=isset($consentimiento)?'checked':''?> id="flexCheckDefault">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </body>
</html>
