rm mysql3.sql
mv mysql2.sql mysql3.sql
mv mysql.sql mysql2.sql
mysqldump -u root -p edian > mysql.sql
