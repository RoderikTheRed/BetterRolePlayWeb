import sys
import time
import os
import shutil
import mysql.connector

def main(ending, redirect, oldending, oldredirect):
    if oldending != ending:
        os.chdir(f"/var/www/html/")
        os.rename(f"{oldending}", f"{ending}")
    directory = f"/var/www/html/{ending}"
    os.chdir(directory)
    replace(oldending, ending)
    replace(oldredirect, redirect)
    changevalueindatabase(oldending, ending, redirect)
    time.sleep(1.5)
    exit()

def replace(oldcontent, newcontent):
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

def changevalueindatabase(ending, newending, newredirect):
    connection = mysql.connector.connect(
        host = "localhost",
        user = "root",
        password = "Dt3K3tP8XAeRNVZN",
        database = "betterroleplay"
    )

    mycursor = connection.cursor()

    sql = str(f"UPDATE xyz SET INVITE = '{newredirect}', ENDING = '{newending}' WHERE ENDING = '{ending}';UPDATE link SET INVITE = '{newredirect}', ENDING = '{newending}' WHERE ENDING = '{ending}';UPDATE net SET INVITE = '{newredirect}', ENDING = '{newending}' WHERE ENDING = '{ending}';UPDATE wtf SET INVITE = '{newredirect}', ENDING = '{newending}' WHERE ENDING = '{ending}';")

    mycursor.execute(sql)

    connection.commit()

    connection.close()
if __name__ == '__main__':
    ending = str(sys.argv[1])
    redirect = str(sys.argv[2])
    oldending = str(sys.argv[3])
    oldredirect = str(sys.argv[4])
    main(ending, redirect, oldending, oldredirect)
