DROP DATABASE IF EXISTS sekolah;
CREATE DATABASE sekolah;
USE sekolah;

CREATE TABLE role (
  role_id int(11) NOT NULL,
  role_name varchar(255) ,
  role_desc varchar(255),
  PRIMARY KEY (role_id)
);

INSERT INTO role (role_id, role_name, role_desc) VALUES
(1, 'admin', 'Create, Read, Update, dan Delete data pada tabel user'),
(2, 'guru', 'Read dan Update nilai murid'),
(3, 'murid', 'Read nilai pribadinya');

CREATE TABLE user (
  user_id varchar(10),
  password varchar(255),
  first_name varchar(255),
  last_name varchar(255),
  role_id int(11),
  address varchar(255),
  PRIMARY KEY(user_id),
  FOREIGN KEY (role_id) REFERENCES role(role_id)
);

INSERT INTO user (user_id, password, first_name, last_name, role_id, address) VALUES
('1000', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', 1, 'UMN, Serpong'),
('1001', '8b32306411d18e50589aaca4f86d5725', 'Abdad', 'Aruna', 2, 'Tokyo, Japan'),
('1002', 'ef17ff1c0b92ea741704fc498165b19b', 'Farhan', 'Hara', 3, 'Tangerang, Indonesia'),
('1003', 'e5fa17319f7d53b7d176abb8db660fe8', 'Hamdi', 'Conary', 3, 'Jakarta Selatan, Indonesia'),
('1004', '59858e24bb79937c4f891e95119a9200', 'Darrell', 'Dakari', 3, 'Jakarta barat'),
('1005', '0b728c8cf4290bc5e5b1c376bc67789b', 'Galen', 'Charemon', 3, 'Semarang'),
('1006', 'df228fc57298315c5c561d8ec5991922', 'Balakosa', 'Akemi', 3, 'Surabaya'),
('1007', '74edd1903be7e2be70fb2fc78cb15406', 'Ozora', 'Pastika', 2, 'Netherlands'),
('1008', 'a22587224f51b91299552aa25c3abf22', 'Osric', 'Osborn', 3, 'Purwokerto'),
('1009', 'f536b2882d085bad0b446a6da5cbd588', 'Shunnar', 'Vania', 3, 'Rest Area'),
('1010', '50fbe78b2f5ee9b3f072120106fe0563', 'Mustajab', 'Nararya', 3, 'Bekasi'),
('1011', '63c5b76784924aa2c6a602639b57307f', 'Liangyi', 'Luthfi', 3, 'Depok'),
('1012', '43e85aeaea1af21acc7cbc91bd70d536', 'Jorell', 'Juvenal', 3, 'Serpong');

CREATE TABLE grade (
  user_id varchar(10),
  nilai_tugas int(11) NOT NULL,
  nilai_uts int(11) NOT NULL,
  nilai_uas int(11) NOT NULL,
  PRIMARY KEY(user_id),
  FOREIGN KEY(user_id) REFERENCES user(user_id)
);

INSERT INTO grade (user_id, nilai_tugas, nilai_uts, nilai_uas) VALUES
('1002', 75, 41, 51),
('1003', 65, 39, 93),
('1004', 40, 52, 69),
('1005', 41, 79, 76),
('1006', 88, 98, 86),
('1008', 73, 100, 94),
('1009', 72, 70, 75),
('1010', 74, 73, 56),
('1011', 42, 48, 46),
('1012', 84, 81, 94);
