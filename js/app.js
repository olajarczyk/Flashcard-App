// code goes here

let showAnswerBtn = document.getElementById("show_answer");
let question = document.getElementById("question");
let answer = document.getElementById("answer");

showAnswerBtn.addEventListener("click", () => {
    question.style.display = "none";
    answer.style.display = "block";
});