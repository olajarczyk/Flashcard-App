<?php
include_once "core/db.php";
session_start();
$added_by = $_SESSION['flashcard_user'];

function addCard($question, $answer, $is_published=false)
{
    global $conn;
    global $added_by;

    $query = mysqli_query($conn, "INSERT INTO cards (question, answer, is_published, added_by) VALUES ('$question', '$answer', '$is_published', '$added_by');");
    if($query){
        return true;
    }
    return false;
}

//save and continue
if(isset($_POST['add'])){
    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);
    $answer = nl2br($answer);
    $answer = htmlentities($answer);
    $answer = mysqli_real_escape_string($conn, $answer);
    $is_published=(isset($_POST['publish']) ? true : false);

    if(addCard($question, $answer, $is_published)){
        redirect('index.php');
    }
}

//save and add again
if(isset($_POST['saveandadd'])){
    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);
    $answer = nl2br($answer);
    $answer = htmlentities($answer);
    $answer = mysqli_real_escape_string($conn, $answer);
    $is_published=(isset($_POST['publish']) ? true : false);

    if(addCard($question, $answer, $is_published)){
        redirect('card.php');
    } 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Flashcard | Flashcard App</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto my-5">
                <h3 class="text-center">Add to Flashcard App</h3>
                <div class="card bg-light">
                    <div class="card card-body">
                        <?php echo (isset($error) ? $error : '');
                        ?>
                        <form action="card.php" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="username">Question</label>
                                <input type="text" name="question" id="question" class="form-control" placeholder="Question">
                            </div>
                            <div class="form-group">
                                <label for="username">Answer</label>
                                <textarea name="answer" id="editor" cols="5" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="username">Publish Now</label>
                                <input type="checkbox" name="publish" id="publish" class="form-check">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="submit" name="add" id="submit" class="btn btn-success btn-sm btn-block" value="Save and continue">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="submit" name="saveandadd" id="submit" class="btn btn-primary btn-sm btn-block" value="Save and add another">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="tinymce/js/tinymce/jquery.tinymce.min.js"></script>
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
</body>

</html>