import mysql.connector

# python3 -m http.server
# http://127.0.0.1:8080/
# export PATH=${PATH}:/usr/local/mysql/bin/

db = mysql.connector.connect(
    user = 'root',
    password = 'pwd',
    host = '127.0.0.1',
    port = '3306',
    database = 'grocerydb'
    )

cursorObject = db.cursor()

grocerytb = '''CREATE TABLE GROCERYTB (
    Id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Item_name VARCHAR(30),
    Item_quantity INT(10),
    Item_status VARCHAR(30),
    Date DATE
    )'''

cursorObject.execute(grocerytb)

db.close()
