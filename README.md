# Assessment App

This application provides a WEB interface to help companies to do the inventory of computers and users.

To avoid human errors, I have created a PowerShell script that collects data for Microsoft Windows OS.

You can insert data using the provided forms, check all information added into the database using the reports page, and download data
in CSV format. Additionally, I added a dashboard page that provides some graphs.

This application has been developing using PHP 7.4.13, MySQL, JavaScript, and PowerShell.

* The script to create the database is in the inc/sql folder.
* To change database configuration (user, password, database name), change the info within inc/config.inc.php. 
* To customize the dashboard, change the following files: RestAPI.php, static/views/DashboardPage.class.php, and static/js/dash.js.js. 

The user manual is on the wiki page: https://github.com/fcasaloti/assessment/wiki/User-Manual

