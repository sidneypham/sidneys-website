<?php
header("Content-disposition: attachment; filename=Sidney's top secret file");
header("Content-type: video/mp4");
readfile("../files/rickroll.mp4");
?>