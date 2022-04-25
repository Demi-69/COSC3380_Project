Installation instructions:
Nothing special required, just load the populated database in MySQL Workbench CE 8.0 from the provided dump file.
___________________________________________________
User Accounts:

    Name	 Position     	| User ID | Password   
Jacob Soares  | Administrator 	|    1    | pass1
John Mechanic | Mechanic	|    2    | pass2
Jane Doe      | Secretary	|    3    | pass3
Kobe Runnels  | Manager		|    5    | pass5

Managers have the ability to add/delete and edit employees and their data
Mechanics have the ability to add and edit rides and thier data/status
	-It should be noted that the ability to delete rides from the database is intentionally excluded - rides may only be marked as some sort of non-operative status
	such as "Out of Order - Maintenance," "Out of Order - Indefinite," "Demolished," etc. This is because historical data for demolished/removed rides is still relevant
	and desireable to preserve.
Secretaries have the ability to access data reports
Administrators have all of the above access and abilities
___________________________________________________

File Descriptions:

Pages:
	index.php - login page 
	front_page.php - front page when user is logged in
	password_manage.php - for handling changing the user's password
	ride_form.php - for handling ride information
	data_report.php - overall data report
	general_data_info.php - first page for generating general reports 
	generate_sales_form - page for generating sales reports 
	employee_form.php - page for handling employee information	
	create_employee_form.php - file for handling new employee creation
	update_status.php - file for handling weather status update
	rainout_info.php - file for handling generating rainout info
	monthly_sales.php - file for handling generating monthly sales report
	weekly_sales.php - file for handling generating weekly sales report
	breakdown_reprt.php - file for handling breakdown report

Actions:
	change_password.php - commands for changing password in the database
	employee_data_submit.php - handling submitting new employee to the database
	login.php - handling login action
	logout.php - handling logout action
	login_check.php - checks if the user is logged in when they enter certain pages
	ride_form_submit.php - submitting new ride
	see_connect - establishing a connection to the database
	update_weather - submitting new weather status to the database
	employee_edit.php - editting employee information
	employee_delete.php - action for deleting employee 
	generate_report.php - action for generating general reports
