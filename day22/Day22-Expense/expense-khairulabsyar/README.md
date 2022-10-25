## Expense

---
#### Instructions
Your task is to complete the implementation for a web app which will scan the directory ('transaction_files') for csv files and extract (and format) the data in order to display it on a browser.


The folder and file setup has been pre-defined. The `public/index.php` should be where the site is loaded from. You may utilise the `App.php` to house the logic for your app. 

Try to break down the task into smaller ones, and please add comments to where appropriate. You may want to write out pseudocode before attempting to code. 

#### Guidelines: 
1. You will want to create at least 3 - 4 functions.

   - One to read all the files in the `transaction_files` directory.  
   - One to read lines from each file and store into memory. 
   - One to extract each line and format the fields. 
   - One to calculate the totals in order to display on the site.

2. You may assume that all files in the `transaction_files` directory are csv files.  
3. The HTML table should contain all data from the files. 
   - dates should be formatted in this format "Aug 30, 2022"
4. Format the amounts so that the `RM` prefixes the amount values. 

#### Extra mile: 
1. Show income amounts in green, and expense amounts in red.

#### Tips: 
1. Read up on array destructuring in PHP. It'll simplify some logic. 
2. Read up on string methods in PHP, esp `str_replace`.  



