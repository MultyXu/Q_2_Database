USE Q2_DB;

LOAD DATA LOCAL INFILE '/opt/lampp/htdocs/Task_C/CSV/employee.csv' INTO TABLE Employee
    FIELDS TERMINATED BY ',' 
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES
    (Emp_ID,Name,User_Type,User_Dept);

UPDATE Department
SET Manager_ID = 
    (SELECT Emp_ID 
    FROM Employee
    WHERE User_Type = 'Manager' 
        AND User_Dept = 1)
Where Dept_ID = 1;

UPDATE Department
SET Manager_ID = 
    (SELECT Emp_ID 
    FROM Employee
    WHERE User_Type = 'Manager' 
        AND User_Dept = 2)
Where Dept_ID = 2;

UPDATE Department
SET Manager_ID = 
    (SELECT Emp_ID 
    FROM Employee
    WHERE User_Type = 'Manager' 
        AND User_Dept = 3)
Where Dept_ID = 3;

UPDATE Department
SET Manager_ID = 
    (SELECT Emp_ID 
    FROM Employee
    WHERE User_Type = 'Manager' 
        AND User_Dept = 4)
Where Dept_ID = 4;

