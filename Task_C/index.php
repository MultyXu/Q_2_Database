Hey <?php echo $_POST["fname"]; ?>!<br>
Your age is <?php echo $_POST["age"]; ?>  岁。

CREATE TABLE IF NOT EXISTS Employee (
    Name varchar(30) NOT NULL,
    User_ID decimal(9) NOT NULL,
    User_Type varchar(10) Not Null,
    PRIMARY KEY (User_ID),
);
