<html>
<head>
    <title>Sound</title>
 
<script language='JavaScript'>
function sound1() {
//var audio = document.getElementsByTagName("audio")[0];
//audio.play();
var audio = document.getElementById("mySoundClip");
audio.play();

}
function sound() {

var audio = document.getElementById("mySoundClip");
audio.play();
audio.start();

}
</script>
 
</head>
 
<body>



 <audio id='mySoundClip'>
        <source src="mpf/audio/eng/MAST.mp3"></source>
        <source src="demo.ogg"></source>
        Your browser isn't invited for super fun audio time.
</audio>
<a href='#' onClick='sound()'> Listen </a>
<input type='button' value='Button'  onClick='sound1()'>
 
</body>
</html>