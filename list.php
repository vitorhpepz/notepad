<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

<body>
<style>
	@font-face {
		font-family: Consolas;
		src: url(Consolas.ttf);
	}

	body {
		margin: 0;
		padding: 0;        
        font-family: Consolas;
		font-size: 12pt;
		background-color: #1e1e1e;
		color: #d4d4d4;
		line-height: 140%;
	}

    a {
    	color: #d4d4d4;
    }
</style>

<?php 
    if ($handle = opendir('.')) {
        while (false !== ($file = readdir($handle)))
        {
            if ($file != "." && $file != ".." && $file != "bkp" && strtolower(substr($file, strrpos($file, '.') + 1)) != 'php')
                echo ' - <a href="index.php?file='.$file.'">'.$file.'</a><br><br>';
                //echo $file . "', '";
        }
        closedir($handle);
    }
?>
