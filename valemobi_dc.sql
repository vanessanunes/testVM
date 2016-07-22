create table bussiness_type(
cd_bussiness char(1) primary key,
description varchar(6)
);

create table product_type(
cd_product_type int(4) auto_increment primary key,
description varchar(20)
);

create table product(
cd_product int(4) auto_increment primary key,
name_product varchar(50) not null,
amount int(3) not null,
price decimal not null,
description varchar(300) null,
cd_bussiness char(1),
cd_product_type int(4),
foreign key(cd_bussiness) references bussiness_type(cd_bussiness),
foreign key(cd_product_type) references product_type(cd_product_type)
);

insert into bussiness_type values('C','Compra');
insert into bussiness_type values('V','Venda');
select * from bussiness_type;

insert into product_type(description) values('Eletrônico');
insert into product_type(description) values('Automóvel');
insert into product_type(description) values('Brinquedo');
select * from product_type;

insert into product(name_product,amount,price,description,cd_bussiness,cd_product_type) 
values('Vanosk',2,10.00,'Vanosk lindínea dos phps','V',2);
desc product;
select * from product;