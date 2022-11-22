<?php
    require_once ('../vendor/autoload.php');
    use App\Exceptions\FormInvalidException;
    use App\Objectes\Album;
    session_start();

    if (!isset($_SESSION['nick'])){
        header("Location:login.html");
    }
    $nick = $_SESSION['nick'];
    $albums = unserialize($_SESSION['albums']);
    if (!isset($_SESSION['concurso'])){
        $_SESSION['concurso'] = [];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        extract($_POST);

        $_SESSION['concurso'][] = serialize($albums[$disco]);
        var_dump($_SESSION['concurso']);
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
    if (count($_SESSION['concurso']) < 3) {
    ?>
        <h2>Pots triar tres discos favorits. Has triat fins ara: <?= count($_SESSION['concurso']) ?></h2>
        <form method="post" action="concurso.php">
            <select name='disco' class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Tria el teu disc favorit</option>
                <?php foreach ($albums as $key => $album){
                   echo "<option value='$key'>".$album->getTitle()."</option>";
                }?>
            </select>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button id="continuar" name="submit" value='continuar' type="submit" class="btn btn-primary">
                        Continuar
                    </button>
                    <button id="finalitzar" name="submit" value='finalitzar' type="submit" class="btn btn-primary">
                        Finalitzar enquesta
                    </button>
                </div>
            </div>
        </form>
    <?php } else { ?>
        <h2>Has triat: </h2>
        <?php
            foreach ($_SESSION['concurso'] as $album) {
                echo unserialize($album);
            }
        unset($_SESSION['concurso']);
        unset($_SESSION['tries']);
        ?>
    <?php } ?>
    </body>
</html>
