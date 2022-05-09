<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>
    <?php
    $button = $_GET ['submit'];
    $search = $GET ['search'];
    
    // connect db
    $con= mysqli_connect("localhost","root","");
if($con)
{
    mysqli_select_db($con,"doc_db");
}
 else {
     echo "could not connect to the database".die(mysqli_error($con));
}
    
    $sql ="SELECT * FROM upload WHERE MATCH(id,name,author,sup,year) AGAINST ('%" . $search . "%')";
    $run = mysqli_query($con,$sql);
    $foundum = mysqli_num_rows($run);
    
    if ($foundum==0)
    {
        echo "Project Does Not Exist With A Search Term Of '<b>$search</b>'.";
            echo "<h1><strong> $foundum Results Found for \"" .$search."\" </strong><h1>";
        
            // get num of results stored in db
            $sql = "SELECT * FROM upload WHERE MATCH(id,name,type,size,content) AGAINST ('%" . $search . "%')";
            
            while($runrows = mysqli_fetch_array($getquery))
            {
                $namelink = $runrows["name"]
                echo "<h5 class='card-title'>". $runrows["id"] ."</h5>";
                echo "<h5 class='card-title'>". $runrows["name"] ."</h5>";
                echo "<h5 class='card-title'>". $runrows["author"] ."</h5>";
                echo "<h5 class='card-title'>". $runrows["sup"] ."</h5>";
                echo "<h5 class='card-title'>". $runrows["year"] ."</h5>";
                echo "------------------------------------------------------------------------------------------------------------";
            }
    }
    mysqli_close($con);
        ?>
</body>
</html>