<?php
    
    mysql_connect("DATABASE", "USERNAME", "PASSWORD") or die(mysql_error());
    mysql_select_db("DATABASE") or die(mysql_error());

?>


<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>SoundsLike - Discover</title>
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
    </head>
    

    <body>
        <h1> SoundsLike </h1>
        <script src = "http://code.jquery.com/jquery-latest.js"></script>
        <script src = "bootstrap/js/bootstrap.min.js"></script>
        <div class = "navbar">
            <div class = "navbar-inner">
                <a class ="brand" href="#">SoundsLike</a>
                <ul class = "nav">
                    <li><a href = "home.html">Home</a>
                    <li class = "active"><a href = "#">Discover</a></li>
                    <li><a href = "add.php">Add</a></li>
                </ul>
            </div>
        </div>
        <div class = "container">
            <div class = "tabbable">
                <ul class = "nav nav-tabs" id = "myTab" data-tabs="tabs">
                    <li class = "active"><a href="#artist"
                    data-toggle="tab">Artists</a></li>
                    <li><a href="#album" data-toggle="tab">Album</a></li>
                </ul>
                <div class="tab-content">
<div class="tab-pane active" id="artist">
    <div class="container">
    <table class = "table table-hover">
        <tr><th>Artist</th><th>Location</th><th>Genre</th><th>SoundsLike</th></tr>
<?php
    
    /* Selecting all artists and their infromaiton */
    $query =  ("SELECT A.name Artist, A.Location AS Location, G.Name AS Genre, A2.name AS SoundsLike FROM genres G
        INNER JOIN is_genre IG on G.G_ID = IG.G_G_ID
        INNER JOIN artists A on IG.A_ID = A.A_ID
        INNER JOIN SoundsLike S on A.A_ID = S.A_ID_1
        INNER JOIN artists A2 on S.A_ID_2 = A2.A_ID;");


    /* Running query  */
    $result = mysql_query($query) or die(mysql_error());

    /* Outputting query infromation */
    while($row = mysql_fetch_array($result)){

        echo "<tr>";
        echo "<td>" .$row['Artist']. "</td>";
        echo "<td>" .$row['Location']. "</td>";
        echo "<td>" .$row['Genre']. "</td>";
        echo "<td>" .$row['SoundsLike']. "</th>";
        echo "</tr>";
    }

?>

    </table><!-- End of artist table --!> 
    </div><!-- End of container --!>
</div> <!--End of Artist Pane --!>

<div class="tab-pane" id="album">
 <div class="container">
    <table class = "table table-hover">
        <tr><th>Artist</th><th>Location</th><th>Genre</th></tr>
<?php
    
    /* Selecting all artists and their infromaiton */

    $query = (" SELECT AL.title as Album, A.name as Artist, P2.name as Producer
                FROM albums AL
                INNER JOIN produced P ON AL.Al_ID = P.Al_ID
                INNER JOIN artists A on P.A_ID = A.A_ID
                INNER JOIN producers P2 on P.P_ID = P2.P_ID");

   
    /* Running query  */
    $result = mysql_query($query) or die(mysql_error());

    /* Outputting query infromation */
    while($row = mysql_fetch_array($result)){

        echo "<tr>";
        echo "<td>" .$row['Album']. "</td>";
        echo "<td>" .$row['Artist']. "</td>";
        echo "<td>" .$row['Producer']. "</td>";
        echo "</tr>";
    }

?>

    </table><!-- End of artist table --!> 
    </div><!-- End of container --!>   
</div><!--End of Albums Pane --!>

                </div><!-- End of Tab Content --!>
            </div> 
         </div>

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


