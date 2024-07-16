
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Showing Channel <?php echo $_GET['channelID']?> his videos:</h1>
    
</body>
</html>

<?php
    $channelID=$_GET['channelID'];
    echo $channelID;
    include('database.php');

    # who owns the channel-->
    $sql = "SELECT * FROM user WHERE channel_id = '$channelID'"; #userX creates 1 channel only
    $result = $conn->query($sql);

    // }
    #task: show all the video(profile) $channelID has uploaded 

    $sql="SELECT * FROM videos WHERE vid_id IN (SELECT vid_id FROM vid_cinfo WHERE ch_id ='$channelID')";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0){ 
        while($row = mysqli_fetch_assoc($result)){
           echo $row['vid_title'];
        }
     }
     mysqli_close( $conn );
     
     
?>