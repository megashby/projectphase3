
<?php 
session_start();
print <<<TOP_STUFF
<html>
<head>
	<title>The History of Boba Tea</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css" title="basic style" type="text/css" />
	<link rel="stylesheet" type="text/css" href="./homepage.css" media="all">
</head>
<body>
	<div class = "row">
      <div class = "navb col-sm-12">
        <a href ="./Webpage.html"><img src="./Logo.png" class="logo immg-resizable" alt="logo" width="286" height="168"></a>
      </div>
	</div>

  	<nav class="navbar navbar-default topnav">
    	<div class="container-fluid">
      		<div class="navbar-header">
        		<a class="navbar-brand" href="./Webpage.html">Boba Tea Bargainer</a>
      		</div>
      		<ul class="nav navbar-nav">
        		<li><a href="./comparepage.html">Compare Prices</a></li>
        		<li><a href="./History.php">History of Boba Tea</a></li>
        		<li><a href="./MakeTea.html">Making Boba Tea</a></li>
        		<li><a href="./ContactUsTrial.php">Contact Us!</a></li>
      		</ul>
    	</div>
  	</nav>
 	<!-- Body -->
 	<div class="row container-fluid">
		<div class="col-sm-12">
			<h2>The History of Boba Tea</h2>
			<br>
			<p>Bubble tea is a Taiwanese tea-based drink invented in Taichung in the 1980s. Most bubble tea recipes contain a tea base mixed/shaken with fruit or milk, to which chewy tapioca balls and fruit jelly are often added. Ice-blended versions are usually mixed with fruit or syrup, resulting in a slushy consistency. There are many varieties of the drink with a wide range of ingredients. The two most popular varieties are bubble milk tea with tapioca and bubble milk green tea with tapioca.</p>
			<p>Bubble teas are typically of two distinct types: fruit-flavored teas and milk teas. Some shops offer hybrid fruit milk teas. Most milk teas include powdered dairy or non-dairy creamers, but some shops offer fresh milk as an alternative. Other varieties are 100% crushed-fruit smoothies with tapioca pearls and signature ice cream shakes made from local sources. Many American bubble tea vendors sell milk smoothies, which are similar to bubble tea but do not contain any tea ingredients.</p>
			<p>The most accredited story about the creation of bubble tea is the Chun Shui Tang Teahouse in Taichung, Taiwan. Its founder, Liu Han-Chieh, observed how the Japanese served cold coffee (while on a visit in the 1980s) and applied this method to tea. The new style of serving tea propelled his business, and multiple chains were established. This expansion would be the stepping stone for the rapid expansion of bubble tea. The creator of bubble tea is Lin Hsiu Hui, the teahouse's product development manager, who poured a sweetened pudding with tapioca balls into the iced tea drink during a meeting in 1988. The beverage was well received at the meeting, leading to its inclusion on the menu. It ultimately became the franchise's top-selling product.</p>
			<p>An alternative origin is the Hanlin teahouse in Tainan, Taiwan, owned by Tu Tsong-he. He made tea using traditional white tapioca, which has the appearance of pearls, supposedly resulting in the so-called "pearl tea". Shortly after, Hanlin changed the white tapioca balls to the black version that is seen most today.</p>
		</div>
	</div>

  <hr>
   <center><h2>Take a quiz to see how much you've learned!</h2>
TOP_STUFF;
$_SESSION['useranswers'] = array();

if (isset($_SESSION['currentquestion']) && isset($_SESSION["questions_array"]) && isset($_SESSION["answer_choices_array"])){

  if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["answer"])){
    $correctanswers = array(
      0 => 'a',
      1 => 'd',
      2 => 'c',
      3 => '');


    if ($_POST['answer'] == $correctanswers[$_SESSION['currentquestion']-1]){
      $_SESSION['correct']++;
    }
    $score = ($_SESSION['correct']*1);
  }

  if ($_SESSION['currentquestion']<$_SESSION['total_question']){
        $q = $_SESSION['currentquestion'];
        // hold the question in a variable
      $question = $_SESSION['questions_array'][$q];
      $answerchoices = $_SESSION['answer_choices_array'][$q];
        // unset question from the array
      unset($_SESSION['questions_array'][$q]);
      unset($_SESSION['answer_choices_array'][$q]);

        // print the question
      echo '<form method = "POST" action = "">
        <h3>'.$question.'</h3>';
       //print the answer choice/input field
      echo $answerchoices;
      echo '<p><input type = "submit" value = "Submit"></p> </form>';    
  }
  else{
    echo '<center>Quiz is complete <br>';
    echo 'Your score is : '.$score.'/4</center>';

    unset($_SESSION["usersanswers"]);
    unset($_SESSION["currentquestion"]);
    session_destroy();

  }
  $_SESSION['currentquestion']++;
  $_SESSION['currentanswers']++;
}
else{
    get_questions();
    $_SESSION['currentquestion'] = 0;
    $_SESSION['currentanswers'] = 0;
    $_SESSION["correct"] = 0;
    $_SESSION['start_time']= time();
    header('Location: ./History.php');
}
function get_questions(){
  $questionsarray = array(
    0 => ' Where was Bubble Tea created?',
    1 => ' What are the bubbles in bubble tea made of?',
    2 => 'When did Tapioca tea first come about?',
    3=> 'What is your favorite type of Boba tea?');
  $answerchoicesarray = array(
    0 =>'<p><input type = "radio" value = "a" name = "answer">A. Taiwan</p>
    <p><input type = "radio" value = "b" name = "answer">B. Russia</p>
    <p><input type = "radio" value = "c" name = "answer">C. China</p>
    <p><input type = "radio" value = "d" name = "answer">D. The location is unknown</p>',
    1 =>'<p><input type = "radio" value = "a" name = "answer">A. Jello</p>
    <p><input type = "radio" value = "b" name = "answer">B. Ice</p>
    <p><input type = "radio" value = "c" name = "answer">C. Apples</p>
    <p><input type = "radio" value = "d" name = "answer">D. Tapioca</p>',
    2 =>'<p><input type = "radio" value = "a" name = "answer">A. The early 2000s</p>
    <p><input type = "radio" value = "b" name = "answer">B. The 1700s</p>
    <p><input type = "radio" value = "c" name = "answer">C. The 1980s</p>
    <p><input type = "radio" value = "d" name = "answer">D. The time is unknown</p>',
    3 =>'<p><input type = "text" name = "answer"</p');

  $correctanswers = array(
    0 => 'a', 
    1 => 'd',
    2 => 'c',
    3 =>''
    );
  $_SESSION['questions_array']=$questionsarray;
  $_SESSION['total_question']=count($questionsarray);
  $_SESSION['answer_choices_array'] = $answerchoicesarray;
  $_SESSION['correct_answers'] = $correctanswers;
  return;

}


print <<<BOTTOM
</center>
  <p>References: <a href = 'https://en.wikipedia.org/wiki/Bubble_tea'>Wikipedia</a></p>
	<!-- Footer -->
   	<div class="container-fluid">
   		<div class="row">
   			<div class="text-center footer">
   				<div class="text">
   					<p>Copyright Jatin Konchady and Marguerite Ashby</p>
   					<p>June 2017</p>
   				</div>
   			</div>
   		</div> 	
    </div>
</body>
</html>
BOTTOM;
?>