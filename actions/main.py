import mysql.connector
from mysql.connector import Error
import numpy as np
import matplotlib.pyplot as plt


try:
    connection = mysql.connector.connect(host='theme-park.crvsspzpptcu.us-east-2.rds.amazonaws.com',
                                         database='theme_park',
                                         user='Team14admin',
                                         password='UH-COSC3380-MW-TEAM14')

    # Beginning and end of time range given from user input
    start_datetime = input()
    end_datetime = input()

    cursor = connection.cursor()
    select_statement = "SELECT entrance_id FROM entry_ticket_sales WHERE sale_datetime >= '" + start_datetime + \
    "' AND sale_datetime <= '"+ end_datetime + "'"
    print(select_statement)
    cursor.execute(select_statement)
    result = cursor.fetchall()

    entrance_id = []
    entrance_count = []
    entrance_one_count = 0
    entrance_two_count = 0
    entrance_three_count = 0
    entrance_four_count = 0

    for i in result:
        entrance_string = ''.join(str(i))
        if entrance_string == "(1,)":
            entrance_one_count += 1
        elif entrance_string == "(2,)":
            entrance_two_count += 1
        elif entrance_string == "(3,)":
            entrance_three_count += 1
        else:
            entrance_four_count += 1
    entrance_count.append(entrance_one_count)
    entrance_count.append(entrance_two_count)
    entrance_count.append(entrance_three_count)
    entrance_count.append(entrance_four_count)

    cursor.execute("SELECT entrance_name FROM entrance")
    result = cursor.fetchall()

    for i in result:
        entrance_id.append(i[0])

    plt.bar(entrance_id, entrance_count)
    plt.ylim(min(entrance_count) * 0.75, max(entrance_count) * 1.25)
    plt.xlabel("Entrance IDs")
    plt.ylabel("Number of Times Used")
    plt.title("Entrance Information")
    plt.show()


except mysql.connector.Error as error:
    print("Failed to connect to database", error)
finally:
    if connection.is_connected():
        connection.close()
        #print("MySQL connection is closed")