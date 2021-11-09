import sys
import time
import os
import shutil
import mysql.connector

def main_function(ending, domain, link, username):
    os.chdir('/var/www/html/python')
    template = open("template.html", "r")
    new = template.read()
    template.close()

    new_file = open(f"index.php", "w")
    new_file.write(new)
    new_file.close()

    time.sleep(1.5)

    replace(":name", f"{ending}", f"{ending}")
    replace(":link", f"{link}", f"{ending}")
    replace(":ending", f"{ending}", f"{ending}")

    createDirectory(ending)

    moveFile(ending)

    insertintodatabase(domain, link, ending, username)

def replace(oldcontent, newcontent, file):
    reading_file = open("index.php", "r")
    new_file_content = ""
    for line in reading_file:
        stripped_line = line.strip()
        new_line = stripped_line.replace(f"{oldcontent}", f"{newcontent}")
        new_file_content += new_line + "\n"

    reading_file.close()

    writing_file = open(f"index.php", "w")
    writing_file.write(new_file_content)
    writing_file.close()

def createDirectory(ending):
    parent_dir = "/var/www/html/"
    path = os.path.join(parent_dir, ending)

    os.mkdir(path)

def moveFile(ending):
    shutil.move("index.php", f"/var/www/html/{ending}/index.php")

def insertintodatabase(domain, invite, ending, username):
    connection = mysql.connector.connect(
        host = "localhost",
        user = "root",
        password = "Dt3K3tP8XAeRNVZN",
        database = "betterroleplay"
    )

    mycursor = connection.cursor()

    sql = str(f"INSERT INTO {domain} (INVITE, ENDING, USERNAME) VALUES ('{invite}', '{ending}', '{username}')")

    mycursor.execute(sql)

    connection.commit()

    connection.close()

if __name__ == '__main__':
    ending = str(sys.argv[1])
    domain = str(sys.argv[2])
    link = str(sys.argv[3])
    username = str(sys.argv[4])
    print(ending, domain, link, username)
    main_function(ending, domain, link, username)
