create database library character set utf8;

use library;

create table book 
(
	idbook int(10) AUTO_INCREMENT,
    type varchar(40),
    keyword nvarchar(40),
    state tinyint(1),
    note varchar(45),
    primary key (idbook)
);

create table administrator
(
	idadministrator int AUTO_INCREMENT,
    name varchar(20),
    sex char(2),
    password varchar(12),
    primary key (idadministrator)
);

create table user_borrow
(
	iduser int,
    idbook int,
    note varchar(45),
    due_back date,
    renew_number int,
    borrow_date date
);

create table borrowed_record
(
	idrecord  int AUTO_INCREMENT,
    iduser int(12),
    idbook varchar(15),
    borrow_date date,
    due_back date,
    note varchar(10),
    return_date date,
    primary key (idrecord)
);

create table user
(
	iduser int(10) AUTO_INCREMENT,
    name varchar(10),
    sex char(1),
    borrowed_book_num int,
    fine_amount int,
    password varchar(20),
    primary key (iduser)
);

insert into user values(null,"刘小雨",'女',0,5,"123456");
insert into administrator values(null,"刘小雨",'女',"123456");

insert into book (idbook,type,keyword,state,note) values
(null,"历史","五四运动",1,null),
(null,"文学","文化苦旅",1,null),
(null,"计算机科学","C++程序设计",1,null),
(null,"小说","百年孤独",1,null),
(null,"小说","一个人的旅行",1,null),
(null,"文学","咬文嚼字",1,null);
/*drop database library;*/