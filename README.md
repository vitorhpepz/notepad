Beautiful and simple notepad PHP web app<br><br>

Dark background, console-like appearance<br>
Responsive<br>
100% write area, no menu, except for the small notification on the right bottom corner for when offline of if the content wasn't saved yet<br>
You can create new files by directly editing the URL, ex.: you access domain.com/index.php?file=tasks and the tasks file will be created, everything you write will be there the next time you access the same address<br>
Similarly, to delete files just access domain.com/delete.php?file=tasks<br>
View created files at domain.com/list.php<br>
Saves the content automatically every 3 seconds, if modifications have been made<br>
Saves a backup for every modification made to the note at domain.com/bkp/. If you have Apache it can list these files for you like a file manager<br>
No authentication<br><br>

Just four files with less than 200 lines of uncompressed PHP and Javascript code, including, HTML, styles and line jumps<br>
No database, just regular text files<br>
Deployment: just drop the files on a web server folder<br><br>

There's code for notifying the user of a newer version of the current document on the server, but it is disabled because of some issues, you can check out more details at the bottom of the index.php file
