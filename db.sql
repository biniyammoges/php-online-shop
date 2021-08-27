create database astu-shopping;

create table user (
    id int not null auto_increment,
    name varchar(100) 
)

insert into products (name, image, price, rate)
values
('Atikilt', './assets/atikilt.jpg', '80', 4),
('Fresh Bread', './assets/bread.jpg', '5', 3),
('Burger', './assets/burger.jpg', '150', 5),
('Donut', './assets/donut.jpg', '20', 2),
('Enkulal', './assets/enkulal.jpg', '40', 4),
('Coca', './assets/coca.jpg', '20', 3),
('Gored', './assets/gored.jpg', '50', 5);