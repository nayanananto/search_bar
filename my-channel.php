<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Showing Channel <?php echo $_GET['channelID']?></h1>
    
</body>
</html>

<?php
    $channelID=$_GET['channelID'];
    echo $channelID;
    include('database.php');
    // $sql="SELECT * FROM channel WHERE ch_id = '$channelID'";
    // $result = $conn->query($sql);
    // if(mysqli_num_rows($result) > 0){ 
    //    if($row = mysqli_fetch_assoc($result)){
    //       echo $row['ch_name'];
    //     } 
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
     #can display channels beholder info as well using inner join in here||
?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    feather.replace();

    var mySwiper = new Swiper('.swiper-container', {
      // Optional parameters
      slidesPerView: 'auto',
      spaceBetween: 24,
    });
</script>