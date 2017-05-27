# Bookmarker--App
-Ready to be evaluated-
Simple bookmark application done with PHP to demonstrate my skills using PHP and MySQL. It was made for a course about the PHP Development.
It was made by me, but with some help of a tutorial from a book called PHP and MYSQL Web Development by Luke Welling and Laura Thomson.
The projects emphasis was on the user authentication and personalization. The project contains the basic for creating a bigger app, so more content and functions would be easier to add in the future.  
I added a whole new function which sorts the most popular bookmarks and prints the result in a decending order.
I also added better deleting tool for the bookmarks , and made the login function and directing function work better (they weren't really working in the tutorial, or I implemented them incorrectly).
It may not look like much, because I hadn't had the time to make it look awesome, but there is minor implementation of bootstrap, but the GUI is subject to change, but the point of this project was not in the visuals, so it doesn't matter that much.
The app contains basic CRUD (Create, Read, Update and Delete) operations. Update function is currently only available for the changing password.
The structure is bit of overkill, and it might be hard to understand why the code is scattered in diffrent directories, but it was made like it was in the tutorial on the idea that if the site grows bigger you could use the same elements again just by calling them.
Require folder contains all the core elements of the site like the functions, and the elements of the pages. Webroot contains the root directories and in the files you just call the functions from the require files. Global init contains all the functions from the require folder.
The database is in the build file.
You can power up the project by copying it to your computer and running it locally using xampp. You have to have xampp installed, then copy all the files to xampp directory called htdocs. Then power up Apache and MySQL (from Xammp) and run the sql script in PHPMyAdmin. You have to also change the db_connect file so the mysqli connection is correct, depending on your setup but the most used is $result = new mysqli("localhost", "root","" , "bookmarks");. Then just navigate to the site thru localhost.
The project is also currently visible at: http://1501522.azurewebsites.net/.
