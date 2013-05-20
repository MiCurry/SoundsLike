<?php
    error_reporting(E_ALL);

    $mysqli = new mysqli("oniddb.cws.oregonstate.edu", "currymi-db", "8CWoFsrAAJxoeCzj", "currymi-db");
    if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    Echo "hello";
?>

<!DOCTYPE html>
<html lang = "en">
<head>

        <title>SoundsLike - Add</title>

        <!-- Bootstrap -->
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css"
        rel="stylesheet" type="text/css" />
        <link
        href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css"
        rel="stylesheet" type="text/css" />
        <script
        src="http://twitter.github.com/bootstrap/assets/js/bootstrap.js"></script>
        <meta charset=utf-8 />
        <!-- Specific CSS -->
        <link href="soundslike/media/bootstrap/css/specific.css/" rel="stylesheet"
        type="text/css"/>

</head>
<body>
    <navigation>
            <h1> SoundsLike </h1>
            <script src = "http://code.jquery.com/jquery-latest.js"></script>
            <script src = "bootstrap/js/bootstrap.min.js"></script>
            <div class = "navbar">
                <div class = "navbar-inner">
                    <a class ="brand" href="#">SoundsLike</a>
                    <ul class = "nav">
                        <li><a href = "home.html">Home</a>
                        <li><a href = "discover.php">Discover</a></li>
                        <li class="active"><a href = "#">Add</a></li>
                    </ul>
                </div>
            </div>
    </navigation>                
     
    <div class="container">
        <div class="row">
            <div class="span6">
                <h2>Add Artist</h2>
        <!--Add Artists form --!>
        <div class="form-horizontal"><form action="add_artist.php" method="post">
            <div class="control-group">
                <label class="control-label" for="inputArtist">Artist</label>
                <div class="controls">
                    <input type = "text" name="ArtistInput" placeholder= "Artist">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputLoca">Location</label>
                <div class="controls">
                    <input  type ="text" name="LocationInput" placeholder= "Location">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputsoundslike">Description</label>
                <div class="controls">
                    <textarea rows name="Description" placeholder= "Description"></textarea>
                </div>
                <div class="controls">
                    <select name="SoundsLike">
                        /* Selecting SoundsLike options */
                        <?php
                            
                            $query =  ("SELECT name AS Artist 
                                        FROM artists");

                            /* Running query */
                            $result = $mysqli->query($query);

                            /* Outputting artists for select */
                            while($row = mysqli_fetch_array($result)){
                                echo "<option>" .$row['Artist']. "</option>";
                            }
                        ?> 
                </select>
            </div>
        </div>
    <div class="control-group">
        <label class="control-label" for="inputgenre">Genre</label>
        <div class="controls">


            <select id="genres">
                /* Selecting aviable genres */
                <?php

                    $query =  ("SELECT name AS Genre 
                                FROM genres");

                    /* Running query  */
                    $result =  $mysqli->query($query);

                    /* Outputting Genres into select */
                    while($row = mysqli_fetch_array($result)){
                        echo "<option>" .$row['Genre']. "</option>";
                    }
                ?> 
            </select>
        </div>
    </div>
   <input type="submit" name="input_artist"><button class="btn btn-primary" type="input" name="input_artist">
    Submit </button></input></form>
    </div>
                </div><!-- Add Artist Span  --!>


                <div class="span6">
                
                    <h2>Add Album</h2>
                    <div class="form-horizontal"><form action="add_artist.php" method="post">
                        <div class="control-group">
                            <label class="control-label" for="inputTitle">Title</label>
                            <div class= "controls">
                                <input type="text" name="inputTitle" placeholder="Title">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputArtist">By</label>
                            <div class="controls">
                                <select name="Artist_alb">
                    <?php

                        /* Selecting Artists Name */
                        $query =  ("SELECT name AS Artist 
                                    FROM artists");

                        /* Running query  */
                        $result =  $mysqli->query($query);

                        /* Outputting artists into select */
                        while($row = mysqli_fetch_array($result)){
                        echo "<option>" .$row['Artist']. "</option>";
                        }

                    ?> 
                                </select>
                            </div>
                        </div>
                        <input type="submit" name="input_album"><button class="btn btn-primary" type="button" value="input_album"> Submit </button></input>
                        <button class="btn" type="button"> Clear</button>
                                </div>
                            </div>
                                    </div></form><!-- Add Album Span --!>
                    <?php
                    /*
                    if( $_POST['input_artist'] ){
                            if ( !($stmt = $mysqli->prepare("INSERT INTO artists (name, location,
                            description) VALUES (?,?,?)"))){
                                echo "Prepare failed: (" . $mysqli->errno . ")" . $mysqli->error;
                            }
                            if (!$stmt->bind_param("ss", $_POST['ArtistInput'],
                            $_POST['LocationInput'])){
                                echo "Binding parameters failed: (" . $stmt->errno . ") ". $stmt->error;  
                            } 
                            if (!$stmt->execute()) {
                                echo "Excute failed: (" . $stmt->errno . " ) " . $stmt->error;
                            }else {
                                echo "Added ";
                            }
                        }
                    */
                    ?>

        <div id = "footer">
            <hr>
            <div class = "container">
                <div class = "row">
                    <div class = "span4">
                        <a href = "http://twitter.com/ModestMole">Twitter</a>
                    </div>
                    <div class = "span4">
                        Made with <a href = "http://twitter.github.com/bootstrap/index.html">Bootstrap</a>
                    </div>
                    <div class = "span4">
                        This project's <a href = "https://github.com/MiCurry/SoundsLike">Github</a>
                   </div>
               </div>
            </div>
        </div>

</body>
</html>
