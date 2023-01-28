create database planet_shoes;
use planet_shoes;
create table category_ecommerce(
cat_id int primary key auto_increment,
cat_name varchar(50)
);
create table brand_ecommerce(
brand_id int primary key auto_increment,
brand_name varchar(50)
);
create table for_who(
for_who_id int primary key auto_increment,
for_who_name varchar(50)
);
create table product(
product_id int primary key auto_increment,
product_name varchar(50),
product_price varchar(50),
product_img text,
product_text varchar(200),
status_name varchar(50),
cat_id int,
brand_id int,
for_who_id int,
foreign key(cat_id) references category_ecommerce(cat_id),
foreign key(brand_id) references brand_ecommerce(brand_id),
foreign key(for_who_id) references for_who(for_who_id)
);


create table wish_cart (
 wish_cart_id int primary key auto_increment,
 quantity int  ,
 user_id int   ,
 product_id int  ,
 date_shop datetime,
 foreign key(user_id) references users(user_id),
 foreign key(product_id) references product(product_id)
);

create table users(
user_id int primary key auto_increment,
user_name varchar(50),
user_email varchar(50),
user_pass varchar(250),
user_img text,
user_info varchar(500),
u_type int
);

create table shopping_cart (
 shopping_cart_id int primary key auto_increment,
 shopping_status int ,
 quantity int  ,
 user_id int   ,
 product_id int  ,
 date_shop datetime,
 foreign key(user_id) references users(user_id),
 foreign key(product_id) references product(product_id)
);
create table sold_product(
sold_id int primary key auto_increment,
user_id int,
product_id int,
sold_status int,
date_sold datetime ,
quantity int,
user_info_id int,
foreign key(user_id) references users(user_id),
foreign key(product_id) references product(product_id),
foreign key(user_info_id)
references user_info(user_info_id)
);

create table user_info(
user_info_id int primary key auto_increment,
state varchar(30),
city varchar(30),
streat varchar(50),
phone int,
p_code int,
add_text varchar(500),
user_id int,
foreign key(user_id) references users(user_id));

create table comments(
comm_id int primary key auto_increment,
text_comm text,
date_comm datetime,
parent_id int,
user_id int,
product_id int,
foreign key(user_id) references users(user_id),
foreign key(product_id) references product(product_id));
alter table sold_product add order_number int;

create table detail_order(
d_o int primary key auto_increment,
sold_id int,
product_id int,
user_id int,
user_info int,
foreign key(sold_id) references sold_product(sold_id),
foreign key(user_id) references users(user_id),
foreign key(product_id) references product(product_id),
foreign key(user_info) references user_info(user_info_id));



