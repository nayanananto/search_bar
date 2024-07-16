<?php
    session_start();
    if(!isset($_SESSION['loggedin'])) {
        $_SESSION['loggedin']=false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>VidTube</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <header>
        <div class="container">
            <div class="left"><h1><i>Vid</i><sub>tube</sub></h1></div>
            <div class="middle">
                <form action="main.php" method="POST" class="search_bar">
                    <input type="text" name="search_query" placeholder="Enter your search" required>
                    <button type="submit" name="mysrc">
                    </button>
                </form>


            </div> 
                <div class="right">
                    <?php if($_SESSION['loggedin']){?>
                        <div style="display:flex;flex-direction:row;">
                            <!-- <?php if(isset($_SESSION['ch_id']) &&  $_SESSION['ch_id']!=null) {?>-->
                            <!--<?php } ?> -->
                            <div><button class="btn" style="cursor:pointer"><img src="images/create_videos.png" alt=""  height="20" width="20"></button></div> 
                                <dialog class="modal" id="modal">
                                    <a href="" class="c_btn"> <i class="bi bi-x-octagon"></i></a>
                                    <form action="create_videos.php" method="post" enctype="multipart/form-data">
                                        <input  type="text" name="title" placeholder="Enter your video title" required> <br>
                                        <input style="height:5%" type="text" name="description"  placeholder="Add description"> <br>
                                        <input style="height:5%" type="text" name="type" placeholder="Add Genre/Type"> <br>
                                        <div style="display:flex; flex-direction:row; align-items:space-between">
                                            <p style="margin-right:15px">Thumbnail- </p>
                                            <input style="border:0" type="file" name="thumbnail" id="thumbnail" placeholder="Choose thumbnail" required>
                                        </div>
                                        <div style="display:flex; flex-direction:row; align-items:space-between">
                                            <p style="margin-right:15px"> Video-</p>
                                            <input  style="border:0"  type="file" name="video" placeholder="Upload video" required>
                                        </div>
                                        
                                        <button style="align-self:center" type="submit" name="upload">Upload</button>
                                    </form>
                                </dialog>  
                            </div>
                            <div class="rt_img"><a href="profile.html"><img src="<?php echo 'images/default_pp.jpg';?>" alt="" height="30" width="30"></a></div>
                        </div>
                    <?php }else { ?>
                        <div><a href="login.html" style="color:#fc6161"><i class="bi bi-person-badge"></i>Join now!</a> </div>
                    <?php }?> 
                </div>
            </div>
        </div>
    </header>                    

    <script>
        const modal=document.querySelector('#modal');
        const openModal=document.querySelector('.btn');
        const closeModal=document.querySelector('.c_btn');
        openModal.addEventListener('click',()=>{
            modal.showModal();
        })
        closeModalModal.addEventListener('click',()=>{
            modal.close();
        })
    </script>

    
</body>
</html>
<?php
if(isset($_POST["mysrc"]))  {
    $searchQuery = $_POST['search_query'];
    header("location:search_page.php?my_search=".$searchQuery);
}
?>