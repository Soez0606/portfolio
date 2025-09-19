<?php
require('../model/Classes.php');
require('../model/BDD.php');

use Model\BDD;

$pages = BDD::getPagesHierarchy();

$pageHierarchy = BDD::buildHierarchy($pages);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon Portfolio</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>Mon Portfolio</h1>
            <nav>
                <ul>
                    <?php
                    function renderMenu(array $pages) {
                        foreach ($pages as $page) {
                            echo '<li>';
                            echo '<a href="#">' . htmlspecialchars($page->getTitre()) . '</a>';
                            if (!empty($page->getChildren())) {
                                echo '<ul>';
                                renderMenu($page->getChildren());
                                echo '</ul>';
                            }
                            echo '</li>';
                        }
                    }

                    renderMenu($pageHierarchy);
                    ?>
                </ul>
            </nav>
        </header>

        <main>
        </main>

        <footer>
            <p>&copy; 2025 Mon Portfolio</p>
        </footer>
    </body>
</html>