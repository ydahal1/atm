create DATABASE money_machine_llc


create table technician(
	technician_id int(10) not null,
	first_name varchar(20)  null,
	last_name varchar(20)  null,
	phone_number int(12)  null,
	state_provience varchar(10)  null,
	city varchar(15)  null,
	street varchar(200)  null,
		primary key (technician_id)
	)
	

create table loader(
	loader_id int(10) not null,
	first_name varchar(20)  null,
	last_name varchar(20)  null,
	phone_number int(12)  null,
	state_provience varchar(10)  null,
	city varchar(15)  null,
	street varchar(200)  null,
		primary key (loader_id)
	)
	
create table owner(
	owner_id varchar(20) not null,
	first_name varchar(20)  null,
	last_name varchar(20)  null,
	phone_number int(12)  null,
	state_provience varchar(10)  null,
	city varchar(15)  null,
	street varchar(200)  null,
		primary key (owner_id)
	)
	
create table terminal(
	terminal_id int(20) not null auto_increment,
	state_provience varchar(10)  null,
	city varchar(15)  null,
	street varchar(200)  null,
		primary key (terminal_id)
	)
	
	
