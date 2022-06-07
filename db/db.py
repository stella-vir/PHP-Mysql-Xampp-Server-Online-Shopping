import sqlite3
import sys

try:
    # conn = sqlite3.connect(':memory:')
    # only re-create the db when executing/running
    conn = sqlite3.connect('allmymovies.db')
    # conn.row_factory = sqlite3.Row
    # ret dict mv['genre'] not tuple mv[0]
    cursor = conn.cursor()
    print ('Connected with the database successfully.');
    cursor.execute('select sqlite_version();')
    ver = cursor.fetchall()
    print(ver)

    # cursor.execute('''
    # create table movies (id int primary key, name text, genre text);
    # ''')
    # cursor.execute('''
    # create table books (id int primary key, name text, genre text);
    # ''')
    # cursor.execute('select name from sqlite_master where type = "table";')
    # print ('Table created successfully.')

    # cursor.executescript('''
    # insert or replace into movies (id, name, genre) values (1, 'Superman', 'Comedy');
    # insert or ignore into movies (id, name, genre) values (2, 'Spaceball', 'Comedy');
    # ''')
    # cursor.execute('''
    # insert or replace into books (id, name, genre) values (1, 'Helmet', 'Poetry');
    # ''')
    # cursor.execute('drop table books')

    # security
    # val = 'delete * from movies'
    # val = a website url
    # print('select count(*) from movies %s' %val)
    # cursor.execute('select * from movies where genre = %s' %val)
    # cursor.execute('select * from movies where genre = ?', (val,))

    # cursor.execute('select * from movies')
    # cursor.execute('select * from books')
    cursor.execute('select * from movies union all select * from books')

    # all = cursor.fetchone()
    # print(all.keys())
    movies = cursor.fetchall()
    print(movies)
    # movies = set(movies) # no duplicates tuple -> set
    # for mv in movies:
        # print(mv)
        # print(mv[1])
        # print(mv['name']) # row_factory

    conn.commit()
    if (conn):
        conn.close()
        print('Sit tight, turning off the connection.')

except Exception as e:
    conn.rollback() # catch/print failures for key error...etc
    print('ERROR', e)




# end
