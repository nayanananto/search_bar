<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:burlywood;">
    <h4>You Searched For <?php echo $_GET['my_search']?></h4>
    
</body>
</html>

<?php
    function wordSeparate($s){
        $words = preg_split('/\s+/', trim($s));
        return $words;
    }
    function isVisited($visited,$s){
        return isset($visited[$s]) && $visited[$s] === true;
    }
?>
<?php
    session_start();
    $my_search =  $_GET['my_search'];
    include('database.php');
    $words=wordSeparate($my_search);
    $visited=array();
    
    for ($i=0;$i<count($words);$i++){
        $word=$words[$i];
        $sql = "SELECT * FROM videos WHERE vid_title LIKE '%$word%'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){ 
            while($row = mysqli_fetch_assoc($result)){
                if (!isVisited($visited,$row['vid_id'])){
                    echo '<a href="video-shower.php?postID=' . urlencode($row["vid_id"]) . '">' . htmlspecialchars($row['vid_title']) . '</a><br>';
                    $visited[$row['vid_id']]=true;
                }
            } 
        }
    }
    $visited=array();
    for ($i=0;$i<count($words);$i++){
        $word=$words[$i];
        $sql = "SELECT * FROM channel WHERE ch_name LIKE '%$word%'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){ 
            while($row = mysqli_fetch_assoc($result)){
                if (!isVisited($visited,$row['ch_id'])){
                    echo '<a href="my-channel.php?channelID=' . urlencode($row["ch_id"]) . '">' . htmlspecialchars($row['ch_name']) . '</a><br>';
                    $visited[$row['ch_id']]=true;
                }
                
            } 
        }
    }
        mysqli_close( $conn );
        

?>