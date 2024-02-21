CREATE TABLE employees(
    employee_id INT UNIQUE NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    middle_name VARCHAR(255) DEFAULT NULL,
    last_name VARCHAR(255) NOT NULL,
    avatar VARCHAR(255) DEFAULT NULL,
    birth DATE NOT NULL,
    department_id INT NOT NULL,
    role VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    notes TEXT DEFAULT NULL
) AUTO_INCREMENT = 0;

/*   email: admin@gmail.com password: admin 
    email: thanh@gmail.com password: thanh
    email: vu@gmail.com password: vu
    email: phong@gmail.com password: phong
    email: huan@gmail.com password: huan   
  
*/
INSERT INTO employees(email, password, first_name, middle_name, last_name, avatar, birth, department_id, role, phone_number, notes)
VALUES   ('admin@gmail.com', '$2y$10$Ttm.9G8PJ2DhDVAyzDsnh.zihfpTej9KQtBlMGzb4.03F8opNF7MS', 'admin', 'admin', 'admin', NULL, '2022-1-1', '1', 'admin', '1234567890', NULL),
        ('thanh@gmail.com', '$2y$10$qm6uuAbveG8MTI6wRp6XHOwbR/bF3HG4fn86bgjqEsV/h06jsUVyy', 'Nguyen', 'Duy', 'Thanh', NULL, '2001-1-1', '1', 'Employee', '000000001', NULL),
        ('vu@gmail.com', '$2y$10$8pqufKhp2JhTWz.JfSwy/eHJlbk3f.XHuuZ8UoyDBkdIdgwL3uUri', 'Ly', 'Kim', 'Phong', NULL, '2001-8-23', '2', 'Employee', '09123564894', NULL),
        ('phong@gmail.com', '$2y$10$IzwHz8gHHFZoAeZFJY0zNOXFMIfaocALMrcykiXq8j.aJ5O/5MPIm', 'Tran', 'Minh', 'Vu', NULL, '2002-2-6', '3', 'Manager', '1591498156', NULL),
        ('huan@gmail.com', '$2y$10$qlGVpjBDq.wqKeF2TMDQQekippVJnPoDAtb3yMaByr1SAfLyB/xVK', 'Cao', 'Anh', 'Huan', NULL, '2001-6-30', '4', 'Manager', '156176850', NULL)