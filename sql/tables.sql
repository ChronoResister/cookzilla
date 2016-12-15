create table Users(
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
	foreign key (uname) references users(uname)
)
auto_increment = 10000;


create table ingredient(
	recipeId int,
	iname varchar(40),
	iquantity int,
	iunit int,
	primary key (recipeId, iname),
	foreign key (recipeId) references recipe(recipeId)
);



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
	foreign key (uname) references users(uname),
	foreign key (recipeId) references recipe(recipeId)
	
)
auto_increment = 10000;


create table user_group(
	gid int auto_increment,
	gname varchar(40),
	creater varchar(40),
	primary key (gid),
	foreign key (creater) references users(uname)
)
auto_increment = 10000;

create table group_mem(
	gid int,
	uname varchar(40),
	primary key (gid, uname),
	foreign key (uname) references users(uname)
);

create table user_event(
	eid int auto_increment,
	gid int,
	ename varchar(40),
	creater varchar(40),
	starttime datetime,
	endtime datetime,
	max_number int,
	primary key (eid),
	foreign key (gid) references user_group(gid),
	foreign key (creater) references users(uname)
)
auto_increment = 10000;

create table rsvp(
	uname varchar(40),
	eid int,
	primary key (uname, eid),
	foreign key (uname) references users(uname),
	foreign key (eid) references user_event(eid)
);

create table event_report(
	erId int auto_increment,
	uname varchar(40),

	eid int,
	ertitle varchar(40),
	rtext text,
	ertime datetime,
	primary key (erId),
    foreign key (uname) references users(uname),
    foreign key (eid) references user_event(eid)
)
auto_increment = 10000;


create table user_visited( uname varchar(40), recipeId int, vtime datetime, PRIMARY key (uname, recipeId, vtime), FOREIGN key (uname) REFERENCES users(uname), FOREIGN key (recipeId) REFERENCES recipe(recipeId) );

create table recipe_img(
	rpId int auto_increment,
	recipeId int,
	image text,
	primary key (rpId),
	foreign key (recipeId) references recipe(recipeId)
);

create table review_img(
	rpId int auto_increment,
	reviewId int,
	image text,
	primary key (rpId),
	foreign key (reviewId) references review(reviewId)
);

create table report_img(
	epId int auto_increment,
	erId int,
	image text,
	primary key (epId),
	foreign key (erId) references event_report(erId)
);



