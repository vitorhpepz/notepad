Beautiful and simple notepad PHP web app

Dark background, console like appearance
Responsive
100% write area, no menu, except for the offline or not saved discrete notification on the right bottom corner
You can create new files by directly editing the URL, ex.: you access domain.com/index.php?file=tasks and the tasks file will be created, everything you write will be there next time you access the same address
Similarly, to delete files just access this file just access domain.com/delete.php?file=tasks
View created files at domain.com/list.php
Saves the content automatically every 3 seconds, if modifications have been made
Saves a backup for every modification made to the notes, at domain.com/bkp. If you have Apache it even can list these files for you

Just four files with less than 200 lines of uncompressed PHP and Javascript code, including, html, styles and line jumps
No database, regular text files are used
Deployment: just drop the files on a web server folder

There's code for notifying the user of newer version of the current document on the server, but it is disabled because of some issues, you can check out more details about itat the bottom of the index.php file
