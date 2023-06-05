<?php

// Create an array of questions and answers
$faq = array(
  array(
    'question' => 'How many can a request be sent?',
    'answer' => 'Only one request Please do not submit more than one request'
  ),
  array(
    'question' => 'How your event is selected?',
    'answer' => 'Send all the details carefully and be accurate and write all the details in the description'
  ),
  array(
    'question' => 'Is my application rejected without my knowledge?',
    'answer' => 'Yes'
  )
);

// Loop through the array and print out the questions and answers
foreach ($faq as $question) {
  echo '<h2>' . $question['question'] . '</h2>';
  echo '<h4>' . $question['answer'] . '</h4>';
}

?>
      </div>
      <a href="home.php" >Back</a>
    </div>

<link href="css/faq.css" rel="stylesheet" />
