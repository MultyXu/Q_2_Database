CREATE DATABASE If NOT EXISTS Q2_DB;
USE Q2_DB;

CREATE TABLE IF NOT EXISTS Employee (
    Emp_ID int unsigned NOT NULL,
    Name varchar(30) NOT NULL,
    User_Type varchar(10) NOT NULL,
    User_Dept int unsigned,
    PRIMARY KEY(Emp_ID)
);

CREATE TABLE IF NOT EXISTS Department (
    Dept_ID int unsigned NOT NULL,
    Dept_Name varchar(30) NOT NULL,
    Manager_ID int unsigned,
    FOREIGN KEY (Manager_ID) REFERENCES Employee(Emp_ID) ON DELETE SET NULL,
    PRIMARY KEY(Dept_ID)
);

ALTER TABLE Employee
ADD CONSTRAINT employee_fk
FOREIGN KEY (User_Dept) 
REFERENCES Department(Dept_ID) ON DELETE SET NULL;

CREATE TABLE IF NOT EXISTS Product (
    Item_number char(9) not null,
    Price decimal(15),
    Quantity int,
    
    -- dept 1 info
    Measurement Decimal(10),
    Unit_of_measurement varchar(10) default 'mm',
    Material varchar(10),
    Gross_USD Decimal(10),
    
    -- dept 2 info
    Payment_term int default 30,
    Purchase_price decimal(15),
    Currency varchar(5) default 'USD',

    -- dept 3 info
    Item_type_code char(10),
    D_line_item_category char(10),
    Product_code char(10),
    Country_of_origin char(10),

    -- dept 4 info
    Manufacturing_policy varchar(10) default 'SKU',
    Routing_No varchar(10),
    Reordering_policy varchar(10) default 'N/A',
    
    PRIMARY KEY(Item_number)
);

CREATE TABLE IF NOT EXISTS User (
    User_ID int unsigned auto_increment,
    Name varchar(30) NOT NULL,
    Address varchar(30) NOT NULL,
    PRIMARY KEY(User_ID)
);

INSERT INTO Department (Dept_ID,Dept_Name) VALUES (1,'Dept_1');
INSERT INTO Department (Dept_ID,Dept_Name) VALUES (2,'Dept_2');
INSERT INTO Department (Dept_ID,Dept_Name) VALUES (3,'Dept_3');
INSERT INTO Department (Dept_ID,Dept_Name) VALUES (4,'Dept_4');