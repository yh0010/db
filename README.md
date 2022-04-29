# HW3 Q1
### DB: MySQL
### Language: PHP, HTML
### Tools: XAMPP, PHP server, Live Stream Chrome Extension, and PHP Telephence -> to automatically 'makefile' for me && update webstie instantly trigger by 'save'
#### Purpose:
1. Perform simple query on a localhost base by submiting Customer ID to a textbox and obtain all attributes from all orders related to the CustID
2. Enable button feature to allow user to click on 'cakename,' trigger another query to return all ingredients and quantity used for each cake
3. Output is sorted reversed chronologically (New -> Old)
------------------------------------------------------------------------------------------------------------------------
Update code study notes here: (for future reference)
- PHP file is rooted at index.php, the file can be redirected through header() function, file can access other file's resource through include.
- PHP and HTML can be used interactively, the base CSS formatting is obtained from a free source and its not written by me
- Enabled red box warning feature and when user do not input anything and try to submit will receive this warning "CustID is required"
- Use session function to transport local variable to a different PHP file then its used as a conditional statement in SQL query
- Add an if-statement on ingredient.php so that only when 'cakename''s submmit event is dected, then it will show, otherwise will redirect back to index.php
- MySQL database is embedded in the XAMPP and can be directly accessd using PHP to build connection
