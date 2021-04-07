# Job portal
 Welcome to "The job portal" - one project, which is going to have similar functions to a normal job offer web application, but will be a simplified version of the known one. 
 ### Tech Stack used
 - PHP, MySQL
## Installation

 - First you will need to setup a localhost server you can check how to do it [here][instalGuiWin] and [here][instalGuiLin], based on the OS you are using.
 - After you successfully install and set up the localhost, you have to start the Apache and MySQL Module. Now your server is running. In order to setup the database you now need to open browser and type `localhost/phpmyadmin` - in there you need to click on the left menu that says `New` and create new database with the name `job-portal`.
 - Secondly you have to open the Explorer in the XAMPP Control Panel and find the "htdocs" folder in which you need to clone the current repository.
 - In "Job-Board-Portal" you have to open "VS Code", where you have to go to the Terminal. There you need to install saas by writing:
 ```
 npm install
 ```
 - after instaling the needed dependencies you are ready to go into the src/includes folder and open dbh.inc.php, `$serverName` should remain `localhost` in `$dbUsername` and `dbPassword` you will need to enter your MySQL credentials and finally in `$dbName` enter `job-portal`
 - after that open `src/includes/databasecode.sql` and copy everything, then open new SQL tab in [localhost/phpmyadmin][phpAdmin] - paste and run it so this will create your inital database and its mandatory step. Without this step we can't run the project.
 - in this final step we are going to open the project , your Apache and MySQL should be running and the database should be initialized with the given in `databasecode.sql` commands , now you need to open your browser and go to [http://localhost/Job-Board-Portal/src/index.php][localhost]
 ### Credentials for admin panel
In order to edit and approve offers you need to be loged in as admin, the `username` is `admin` and the `password` is `123456`.



### Content

 - Homepage: List all job offers that have been successfuly approved by the admin.
 - Details: in order to get to this page you need to click on job offer from homapage or admin page.
 - Admin: In the upper part it displays the active listings and in the bottom we got our pending offers if any.
 - Add: From here you can public new job offers, all the fields are mandatory , added simple validation.
 - Logout/Login: By default you are loged if you logout the link is changed to login.
 - Export db: by clicking this button you will notice new file been added to src/includes named backup.sql 
 - Search: In the search field you can type only a single word and the algorithm will search for it in the title,company or in the content.
 

   [instalGuiWin]: <https://www.ionos.com/digitalguide/server/tools/xampp-tutorial-create-your-own-local-test-server/>
   [instalGuiLin]: <https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04>
   [localhost]: <http://localhost/job-portal/Job-Board-Portal/src/index.php>
   [phpAdmin]: <http://localhost/phpmyadmin>