<?php 
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "cheers";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Submissions.id, text, Username, likes FROM Submissions, Profile where Profile.id = Submissions.profileid ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);
?>

<html>
    
    <head>
        <title>Cheers</title>
        <meta name="description" content="Web Dev Final">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="javascript.js"></script>
    </head>
    <body>
        <nav class="notlanding">
            <div id="yellowline"></div>
            <a href="index.html"><img src="img/logo.png" id="logo"></a>
        </nav>
        <div class="submissionbox">
            <div class="next" id="leftn">&#60;</div>
            <div class="next" id="rightn">&#62;</div>
            <img src="img/smile.png" class="smile" id="submissionsmile"</>
            <div class="submission"><?php if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo $row["text"];
?></div>
            <div class="submitedby"><?php 
         echo "Submitted By ".$row["Username"]."<br>".$row["likes"]." total likes";
         $submissionid = $row["id"];
         
     }
} else {
     echo "0 results";
}
?>
<script type="text/javascript">
    var profileid = "<?php echo $submissionid; $conn->close(); ?>";
</script>
</div>
        </div>
        
        <div class="submissionsbuttons">
            <div class="reactioncontainer">
                <div class="reactionbutton" id="like">Like</div>
                <div class="reactionbutton" id="meh">Meh</div>
            </div>
        <div id="submissiontext">
                <div class="Textbox"><form id="submissionform" action>
                    <div id = "textboxgreeting">What makes you happy?</div>
                    <textarea id="happysubmission" name ="textsubmission" onkeyup="grab()" onchange="grab()"></textarea>
                    <span id ="name">What's your name?</span><input type="text" id="happysubmissionname" name="name" onkeyup="grab()" onchange="grab()"></form>
                </div>
            </div>
            <div class="launch" id ="change" onclick="grab()">Submit what makes you Happy!</div>
        </div>
    </body>
    
</html>