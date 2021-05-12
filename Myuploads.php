
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//fetch and list all the files found in the video folder. Make sure to change the path to your video folder.
foreach(glob('uploads/*') as $video){
    echo '- <a href="#" class="isVideo" data-video="'.$video.'">'.$video.'</a><br/>';
    }
 ?>
    
    <h1> Here are my uploads </h1>
    <!-- this is your video element -->
<video width="400" controls>
    <!-- your video source, verify so that type is accurate -->
    <source id="vidsrc" src="Attack On Titan Episode 1 English Dubbed.mp4" type="video/mp4">
</video>
<script type="text/javascript">
//jQuery code that will trigger when you click on one of the links displayed by the PHP script
$('.isVideo').on('click',function(){
   //this will change the video source to the chosen video
   $('#vidsrc').attr('src',$(this).data('video'));
   return false;
   });
</script>
</body>
</html>