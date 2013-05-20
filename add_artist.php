<html>
<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<body>
<?php
    
    /* Connecting to ONID database */
    $mysqli = new mysqli("oniddb.cws.oregonstate.edu", "currymi-db",
    "8CWoFsrAAJxoeCzj", "currymi-db");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else { echo"connected"; }  
   
   /* Inputing Artist  */
    if( $_POST['input_artist'] ){
            if ( !($stmt = $mysqli->prepare("INSERT INTO artists(name, location,
            description) VALUES (?,?,?)"))){
                echo "Prepare failed: (" . $mysqli->errno . ")" . $mysqli->error;
            }
            if (!$stmt->bind_param("sss", $_POST['ArtistInput'], $_POST['LocationInput'], $_POST['Description'])){
                echo "Binding parameters failed: (" . $stmt->errno . ") ". $stmt->error;  
            } 
            if (!$stmt->execute()) {
                echo "Excute failed: (" . $stmt->errno . " ) " . $stmt->error;
            }else {
                echo "Added artist Successful!";
            }
        }
    
    $artist_alb_t = "Modest Mouse";

    if( $_POST['input_album'] ){
            if ( !($stmt = $mysqli->prepare("INSERT INTO albums(title) VALUES (?)"))){
                echo "Prepare failed: (" . $mysqli->errno . ")" . $mysqli->error;
            }
            if (!$stmt->bind_param("s", $_POST['inputTitle'])){
                echo "Binding parameters failed: (" . $stmt->errno . ") ". $stmt->error;  
            } 
            if (!$stmt->execute()) {
                echo "Excute failed: (" . $stmt->errno . " ) " . $stmt->error;
            }else {
                echo "Added album Successful!";
            }
        
            /* This statement would be to add into the relationship table Soundslike  */
            /*
            if(!($stmt2 = $mysqli-> prepare("INSERT INTO produced (Al_ID, A_ID,
                    P_ID) VALUES((SELECT Al_ID FROM albums WHERE title = ?),( SELECT
                    A_ID FROM artists WHERE name = ?), 1)"))){
                echo "Prepare2 failed: (" . $mysqli->errno . ")" . $mysqli->error;

            }   
            if (!$stmt2->bind_param("s,s", $_POST['inputTitle'],
            $_POST['artist_alb_t'])){
                echo "Binding parameters failed: (" . $stmt2->errno . ") ". $stmt->error;  
            } 
            if (!$stmt2->execute()) {
                echo "Excute failed: (" . $stmt2->errno . " ) " . $stmt2->error;
            }else {
                echo "Added SoundsLike Successful!";
            }
            */
            
        }
        $stmt->close();
        $stmt2->close();

?>

</body>
</html>
