<?php
  session_start();
  #find the uploader channel of this video
  include('database.php');
  $videoID = $_GET['postID'];
  $sql="SELECT * FROM vid_cinfo WHERE vid_id='$videoID'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
      $t = $row['ch_id'];
      $uploading_date = $row['dat']; 
    }
  }
  $sql="SELECT * FROM channel WHERE ch_id='$t'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
      $channel_name=$row['ch_name'] ;
      $subscriber_count = $row['total_subs'];     
    }
  }
  $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->

<!------ HEAD ---------->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;800;900&display=swap">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style>
        .video-post {
            margin-bottom: 20px;
        }
        .video-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .video-actions button {
            display: flex;
            align-items: center;
        }
        .video-actions i {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<header>
        <div class="container">
            <div class="left"><h1><i>Vid</i><sub>tube</sub></h1></div>
            </div>
    </header>
</body>
</html>

<script>
function myFunction(x) {
  x.classList.toggle("fa-thumbs-down");
}</script>


<section class="py-4">
  
  <div class="d-flex justify-content-center">
    <div class="card mb-4 py-4" style="width: 100%; max-width: 600px;">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex flex-row align-items-center">
            <img src="https://i.ibb.co/L6ht5pP/people-3.jpg" width="70px" height="70px" alt="Avatar" style="border-radius: 50%; margin-right: 10px;">
            <div>
              <h2 class="h6 mb-0"><a href="#"><?php echo $channel_name?></a></h2>
              <p class="small text-muted mb-0">15 min ago</p>
            </div>
          </div>
          <button class="btn btn-icon btn-text-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i data-feather="more-vertical"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="#">Save</a></li>
          </ul>
        </div>
        <div class="d-flex justify-content-center my-4">
          <?php
          include('database.php');
          $sql = "SELECT * FROM videos WHERE vid_id='$videoID'";
          $result = mysqli_query($conn, $sql);
          $videoDetails=array();
          if (mysqli_num_rows($result) > 0) {
              if ($row = mysqli_fetch_assoc($result)) {
                    array_push ($videoDetails , $row['vid_title'],$row['vid_description'],$row['video'],$row['video_thumbnail'],$row['likes'],$row['dislikes'],$row['comments'],$row['type'],$row['views']);
                  
              }
          }
          $conn->close();
          ?>
        </div>
        
        <video width="100%" height="auto" src="<?php echo $videoDetails[2] ?>" controls></video>
        <h4 class="h5"><?php echo $videoDetails[0]; ?></h4>
        <p class="text-muted mb-0"><?php echo $videoDetails[1]; ?></p>
        <div>
        <div class="video-actions">
            <button class="btn btn-text-dark" type="button">
                      <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i>
              </button>            
            <button class="btn btn-text-dark" type="button">
                <i data-feather="message-circle"></i>0
            </button>
            <button class="btn btn-text-dark" type="button">
                <i data-feather="bell"></i>0
            </button>
        </div>
        
      </div>
    </div>
  </div>
</section>



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
