<style>
    ul.mainMenu{
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    .mainMenu li {
        float: left;
    }


    .mainMenu li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
</style>
<header>
    <ul class="mainMenu">
        <li><a href="#">Benvingut <?= $nick ?></a></li>
        <li><a href="autorizacion.php">Concurs</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</header>
