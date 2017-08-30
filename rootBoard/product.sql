create table product (
  bNum int not null auto_increment primary key,
  hit int,
  regist_day varchar(20),
  id varchar(10) not null,
  pName varchar(80) not null,
  pPrice int not null,
  pSubs varchar(100) not null,
  pCount int not null,
  proper varchar(80),
  upfile_name varchar(50),
  pTrueName varchar(80) not null
);
