<?php
 $loggedInUser = $_SESSION['flashcard_user'];
 $query = mysqli_query($conn, "SELECT * FROM cards WHERE  added_by = $loggedInUser AND is_published = true");
 $global_array = [];

 if(mysqli_num_rows($query)>0)
 {
    while($row=mysqli_fetch_array($query)){
        array_push($global_array, $row['question']);
    }
    $_SESSION['question_array'] = $global_array;
 }

 $query = mysqli_query($conn, "SELECT * FROM cards WHERE added_by = $loggedInUser AND is_published = true ORDER BY id DESC");

 if(mysqli_num_rows($query)>0)
 {
    $data = mysqli_fetch_array($query);
    $question = $data['question'];
    $answer = $data['answer'];
    $id = $data['id'];
    $user_id = $data['added_by'];
?>

<div class="col-lg-6 mx-auto">
    <p id="card_id" style="display:none;"><?php echo $question;?></p>
    <div class="card my-2" id="question">
        <div class="card card-header text-center">Question
        </div>
        <div class="card card-body">
            <p class="text-center"><?php echo $question; ?></p>
        </div>
    </div>
    <div class="card my-2" id="answer" style="display:none;">
        <div class="card card-header text-center">Answer
        </div>
        <div class="card card-body">
            <p class="text-center"><?php echo $answer; ?></p>
        </div>
    </div>
</div>

<?php
 }
?>