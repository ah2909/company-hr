CREATE TABLE IF NOT EXISTS departments(
    department_id INT UNIQUE NOT NULL AUTO_INCREMENT,
    department_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (department_id)
) AUTO_INCREMENT = 0;

CREATE TABLE IF NOT EXISTS employees_in_departments(
    id INT UNIQUE NOT NULL AUTO_INCREMENT,
    employee_id INT NOT NULL,
    department_id INT NOT NULL,
    is_manager BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id),
    FOREIGN KEY (department_id) REFERENCES departments(department_id)
) AUTO_INCREMENT = 0;


INSERT INTO departments(department_name)
    VALUES ('Human Resources'), ('Finance'), ('IT'), ('Logistic');

INSERT INTO employees_in_departments(employee_id, department_id, is_manager)
    VALUES (12, 1, FALSE), (13, 3, TRUE), (14, 2, TRUE), (11, 4, TRUE);