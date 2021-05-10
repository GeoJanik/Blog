<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/8vkwpf4avhzhus1rvy3rcniebqoxe2jpp2y838irygvedm4p/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            language: 'fr_FR',
            forced_root_block: false,
            force_br_newlines: true,
            force_p_newlines: false
        });
    </script>
</head>

<body>

    <?php
                if(empty($_SESSION['id'])) {
                    $conected = false;
                } else {
                    $conected = true;
                }
                ?>
    <header>
        <nav>
            <ul class="nav justify-content-end fixed-top">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=showLogginForm">Connexion</a>
                </li>
                <?php
                if($conected) {
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=logOut">Déconnexion</a>
                </li>
                <?php
                }
            ?>
                <?php
                if($conected) {
                    ?>
                <div class="admin">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showAdminView">Admin</a>
                    </li>
                </div>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>

    <div class="boxTemplate">
        <?= $content ?>
    </div>

    <footer>
        <?php
        if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
            echo 'Vous êtes connecté à votre compte: ' . $_SESSION['pseudo'];
        }
        ?>
    </footer>
</body>

</html>