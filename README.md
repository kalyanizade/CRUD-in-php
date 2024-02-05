# CRUD-in-php

   
 What is CRUD ?
 -
   CRUD is an acronym for Create, Read, Update, and Delete. CRUD operations are basic data manipulation for database.
   These are the basic operations that have any application. After getting good knowledge of PHP and Any SQL RBMS knowledge like MySQL, it's time to create these kinds of          applications.

 Connect PHP to MySQL database
 -
    You must connect the PHP CRUD app to the MySQL database. Otherwise, the CRUD script will not work .
     add this to connect database:-
         $servername = "localhost";
         $username = " ";
         $password = " ";
         $dbname = " ";
         $db = mysqli_connect($servername, $username, $password, $dbname);

Create CRUD operation ?
 -
   CREATE – Write MySQL INSERT Query in PHP to insert data into the MySQL table.
   READ   – Fetch data from the MySQL table and display it in an HTML table using PHP.
   UPDATE – Write MySQL UPDATE Query in PHP to update data in the MySQL table using PHP.
   DELETE – Write MySQL DELETE Query in PHP to  delete the data from the MySQL table using PHP.

    
