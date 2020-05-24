<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

<body>
    <style>
        body {
            background-color: #1e1e1e;
            margin: 0;
        }
        
    	#offlineDiv {
	    	position: absolute;
		    bottom: 0px;
		    right: 0px;
		    color: #ececec;
		    font-family: "Verdana";
            background-color: #6b6b6b;
            letter-spacing: 0.7px;
            font-size: 13px;
            padding: 2px;
            display: none;
        }
        
        ::-webkit-scrollbar {
            display: none;
        }

        textarea {
            border: none;
            font-size: 15px;
            margin: 0;
            letter-spacing: 0.7px;
            resize: none;
            font-family: "Verdana";
            background-color: inherit;
            color: #ececec;
            width: 100%;
            height: 100%;
            line-height: 160%;
        }

        textarea:focus,
        input:focus {
            outline: none;
        }
    </style>

    <?php
	$file = $_GET['file'];
 
	echo "<script>document.title = '$file';";
	echo "var filename = '$file'</script>";
	
	if(!is_file($file)) fopen($file, 'w'); //create the file if it doesnt exist
	$text = file_get_contents($file);
    
    echo "<textarea autocapitalize='off' onkeypress='keypress()' spellcheck='false';
        name='textbox' id='textbox'>" . htmlspecialchars($text) . "</textarea>";
     
?>

    <div id="offlineDiv">*</div>

    <script>
        var textbox = document.getElementById('textbox')
        var offlineDiv = document.getElementById("offlineDiv")
        var content = textbox.value
        var offline = false

        function save() {
            var xhr = new XMLHttpRequest()
            xhr.open("POST", 'save.php', true)
            xhr.setRequestHeader("Content-Type", "application/json charset=UTF-8")
            xhr.send(JSON.stringify({
                filename: filename,
                texta: textbox.value
            }))

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200 && xhr.response == "ok") {
                    offline = false
                    offlineDiv.style.display = "none"
                } else {
                    offline = true
                    setTimeout(showOffline, 4000) //otherwise it will blink on differnet readystates, distracting
                }
            }
        }

        function keypress() {
                offline = true
                setTimeout(showOffline, 400) //otherwise it will blink on differnet readystates, distracting
        }
        
        function showOffline() {
            if (offline) offlineDiv.style.display = "block"
        }

        function autosave() {
            if (content !== textbox.value) save()
            content = textbox.value
            setTimeout(autosave, 3000)
        }

        autosave()

        //funtionality to alert for newer version of document on server
        //it is deactivated out because of the following problems
        //it will bother you if its offline,
        //cancel seems to not be working,
        //sometimes this is triggered twice
        
        //document.addEventListener("visibilitychange", handleVisibilityChange)

        //additional methods to catch alt+tab
        
        //https://stackoverflow.com/questions/28993157/visibilitychange-event-is-not-triggered-when-switching-program-window-with-altt
        document.addEventListener('focus', function () {
            //handleVisibilityChange(true)
        })

        window.addEventListener('focus', function () {
            //handleVisibilityChange(true)
        })

        function handleVisibilityChange() {

            if (!document["hidden"]) {
                var text = textbox.value
                var request = new XMLHttpRequest()
                request.open("GET", filename, true)
                request.send(null)
                
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        if (request.responseText !== text) {
                            if (confirm("Newer version at server - switch to it?")) textbox.value = request.responseText
        }}}}}
    </script>
