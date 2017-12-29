</!DOCTYPE html>
<html>
<head>
	<title>Contact Us!</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" title="basic style" type="text/css" />
	  <link rel="stylesheet" type="text/css" href="./contact.css" media="all">
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
        <li><a href="./ContactUsTrial.php" class="active">Contact Us!</a></li>
      </ul>
    </div>
  </nav>
	<!-- Body -->
	<div class="container-fluid">
    	<div class="row info">
           
    		<div class="col-sm-12">
    			<h2 class="text-center"><u>Contact us:</u></h2>
	  			<br>   
				<div class="row">
					<div class="col-sm-6 megcontact">
            	    	<div class = "row">
                			<div class = "col-sm-4">
			         			<center><img src="./Meg-headshot.jpg" class ="img-resizable img-rounded pic" width= 150px height = 150px alt="Meg"></center>
                			</div>
                			<div class = "col-sm-8">
			         			<ul><u>Marguerite Ashby</u>

                            		<li>About Me: I am a Math major earning the Elements of Computing Certificate. I have taken several upper division math courses including Linear Algebra and Real Analysis. I have taken some Computer Science courses including Elements of Software Design and Elements of Web Programming.</li>
                        		</ul>
                			</div>
            			</div>
					</div>
					<div class="col-sm-6 jatincontact">
              			<div class = "row">
            	  			<div class = "col-sm-4">
			      	    		<center><img src="./Jkon.jpg" width="150px" height="150px" alt="Jatin" class ="img-resizable img-rounded pic"></center>
            	  			</div>
            	  			<div class = "col-sm-8">
			      	    		<ul><u>Jatin Konchady</u>
				    	      		<!-- <li>E-mail:<a href = "mailto: jkonchady@utexas.edu"> jkonchady@utexas.edu</a></li>
				    	      		<li>Mail: 666 Nunya Biz St., Austin, TX</li> -->
				    	      		<li>Sobre mi: Soy un estudiante en la Universidad de Texas en Austin. Mi major es fisica y toco clases en computacion.</li>
			      	    		</ul>
		            		</div>
	         	  		</div>
        	  		</div>
    			</div>
    		</div>
    	</div>
    	<br>
      <?php include 'Cookies.php' ;?>
         
    	<br>
    	<div class="row">
			  <div class="col-sm-12">
				  <form id = "Contact" method = "post" action = "./ContactUs.php" onsubmit = "return validate();">
					  <table border="0" align="center">
						  <tr><td>Name:</td><td><input type="text" name="name" size="30">*</td></tr>
						  <tr><td>E-mail:</td><td><input type="text" name="email" size="30">*</td></tr>
						  <tr><td class="comments">Comments:</td><td><textarea name="comments" rows="10" cols="70"></textarea></td></tr>
						  <tr><td><input type="submit" value="Submit"></td><td><input type="reset" value="Clear"></td></tr>
					  </table>
				  </form>
			  </div>
		  </div> 
	</div>

  <script type="text/javascript">

  document.getElementById("Contact").onsubmit = validate;
  function validate()
  {
    var elt = document.getElementById("Contact");
    var name = elt.name.value;
    var email = elt.email.value;
    var comments = elt.comments.value;
    var commentexists = false;
    // window.alert(commentexists);

    //name verification
    if(name.length == 0){
      window.alert("Please enter a name");
      return false;
    }
    
    

    var first = name.charAt(0);
    if (first<"A" || first>"Z"){
      window.alert("Please enter a valid name (Capital letters at the start of name)");
      return false;
    }
    if (comments.length == 0 || comments == ''){
      commentexists = false;
      window.alert("Please enter a comment");
      return false;
    }
    if (comments.trim().length == 0){
      window.alert("Please enter a valid comment");
      return false;
    }

    // for (var m = 0; m < comments.length, m++){
      // var char = comments.charAt(m);

       // window.alert(char);
    //   if ((char>='A' && char<='Z') || (char>='a' && char<='z')){
    //     commentexists = true;
    //   }
     // }
    // window.alert(commentexists);

    // if (commentexists == false){
      // window.alert('Please enter a comment that contains letters');
      // return false;
    // }


    var names = name.split(" ");
    for (var i = 0; i<names.length; i++){
      for (var k = 0; k<names[i].length; k++){

        var char = names[i].charAt(k);
        if(char<'A' || (char>'Z' && char<'a') || char>'z'){
          window.alert ("Please enter a valid name with letters only");
          return false;
        }
      }
    }

    //email verification
    if(email.length == 0){
      window.alert("Please enter an email");
      return false;
    }
    
    var num = 0;
    for(var j=0; j<email.length; j++){
      var char = email.charAt(j);
      if(char == '@'){
        num++;
      }
    }
    if(num != 1){
      window.alert("Please enter a valid e-mail address");
      return false;
    }
    
    var end = email.slice(-4);
    if(end != ".com" && end != ".net" && end != ".gov" && end != ".org" && end != ".edu"){
      window.alert("Please enter a valid e-mail address");
      return false;
    }

    window.alert("Your comment was submitted!");
    return true;
  }
  </script>

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