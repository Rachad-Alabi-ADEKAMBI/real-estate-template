<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>
    
    <title>Livre blanc</title>

</head>

<body>
    <?php include 'header.php'; ?>

        <div class="whitebook">
            <img src="public/images/livreblanc.jpeg" alt="">
            <form style="display: inline" action="inscription-livre-blanc.php" method="get">
                            <button class="button-btoc"> Commander <i class="fas fa-long-arrow-alt-right"></i> </button>
                        </form>
        </div>
    
        <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>

</body>
</html>