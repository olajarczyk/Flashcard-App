<?php 
include_once "pages/header.php";
include_once "core/db.php"; 
?>
<div class="container">
    <div class="row">
        <?php include_once "pages/cards.php"; ?>
    </div>
</div>
<div class="text-center"><button class="btn btn-success btn-sm" id="show_answer">Show Answer</button>
    <button class="btn btn-primary btn-sm">Next Card</button>
    <button class="btn btn-danger btn-sm">Remove Card</button></div>

<script src="js/app.js"></script>
</body>

</html>