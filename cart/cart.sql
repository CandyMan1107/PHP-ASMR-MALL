create table cart (
  bNum int not null auto_increment primary key,
  regist_day varchar(20),
  id varchar(10) not null,
  pName varchar(80) not null,
  pPrice int not null,
  pTrueName varchar(80)
);
