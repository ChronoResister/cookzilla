create table user(
	uname varchar(40),
	nickname varchar(40) not null,
	password varchar(40) not null,
	uprofile text,
	primary key (uname)
);

create table recipe(
	recipeId int auto_increment,
	uname varchar(40),
	r_title varchar(40),
	num_of_serving int,
	r_description text,
	rtime datetime,
	primary key (recipeId),
	foreign key (uname) references user(uname)
)
auto_increment = 10000;


create table ingredient(
	recipeId int,
	iname varchar(40),
	iquantity int,
	iunit int,
	constraint chk_unit check (iunit = 0 or iunit = 1),
	primary key (recipeId, iname),
	foreign key (recipeId) references recipe(recipeId)
);

create table recipe_pic(
	rpId int auto_increment,
    recipeId int,
	image blob,
	primary key (rpId),
	foreign key (recipeId) references recipe(recipeId)
)
auto_increment = 10000;


create table related(
	recipeId1 int,
	recipeId2 int,
	primary key (recipeId1, recipeId2),
	foreign key (recipeId1) references recipe(recipeId),
	foreign key (recipeId2) references recipe(recipeId)
);

create table tag(
	recipeId int,
	rtag varchar(40),
	primary key (recipeId, rtag),
	foreign key (recipeId) references recipe(recipeId)
);

create table review(
	reviewId int auto_increment,
	uname varchar(40),
	recipeId int,
	wtitle varchar(40),
	wrating int,
	wtext text,
	wsuggestion text,
	wtime datetime,
	primary key (reviewId),
	foreign key (uname) references user(uname),
	foreign key (recipeId) references recipe(recipeId),
	constraint chk_wrating check (wrating >= 1 or wrating <= 5)
)
auto_increment = 10000;

create table review_pic(
	wpId int auto_increment, 
	reviewId int,
	image blob,
	primary key (wpId),
	foreign key (reviewId) references review(reviewId)
)
auto_increment = 10000;

create table user_group(
	gid int auto_increment,
	gname varchar(40),
	creater varchar(40),
	primary key (gid),
	foreign key (creater) references user(uname)
)
auto_increment = 10000;

create table group_mem(
	gid int,
	uname varchar(40),
	primary key (gid, uname),
	foreign key (uname) references user(uname)
);

create table event(
	eid int auto_increment,
	gid int,
	ename varchar(40),
	creater varchar(40),
	starttime datetime,
	endtime datetime,
	max_number int,
	primary key (eid),
	foreign key (gid) references user_group(gid),
	foreign key (creater) references user(uname)
)
auto_increment = 10000;

create table rsvp(
	uname varchar(40),
	eid int,
	primary key (uname, eid),
	foreign key (uname) references user(uname),
	foreign key (eid) references event(eid)
);

create table event_report(
	erId int auto_increment,
	uname varchar(40),
	eid int,
	rtext text,
	ertime datetime,
	primary key (erId),
    foreign key (uname) references user(uname),
    foreign key (eid) references event(eid)
)
auto_increment = 10000;

create table event_pic(
	epId int auto_increment,
	uname varchar(40),
	eid int,
	image blob,
	primary key (epId),
	foreign key (uname) references user(uname),
	foreign key (eid) references event(eid)
)
auto_increment = 10000;







