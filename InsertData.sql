insert into users values("bc1958", "Bingxin", "bingxinpassword", "vip");
insert into users values("weichang", "wc zhao", "wcpass", "founder");
insert into users values("Gluttony", "Gluttony Jack", "123", "new yorker");
insert into users values("Jackie", "D Jackie", "234", "famous star");
insert into users values("ronaldo", "H Cliton", "345", "soccer player");


insert into recipe values(1, "bc1958", "vegetarian pasta", 2, 
"delicious pasta with no meat. juicy broccoli, tomato and pasta sauce, some egg drop and garlic.","1000-01-01 00:00:00");
insert into recipe values(2, "weichang", "seafood pancake", 4, 
"clam, lobstar roll, tuna slide, soysauce. you can also add some cheese","1000-01-01 00:00:01"); 
insert into recipe values(3, "bc1958", "homemade hotpot", 6, 
"just shabu shabu shabu shabu shabu","1000-01-01 00:00:02"); 
insert into recipe values(4, "Jackie", "how to make america great again", 10000,
"just to eat more broccoli!","1000-01-01 00:00:03");
insert into recipe values(5, "ronaldo", "how to be Political correct", 10000,
"well i suggest you all to eat broccoli!","1000-01-01 00:00:04");
insert into recipe values(6, "ronaldo", "ronaldo's yummy cake", 10000,
"you will love it","1000-01-01 00:00:05");
insert into recipe values(7, "bc1958", "bingxin's yummy cake", 10,
"you will love it","1000-01-01 00:00:06");
insert into recipe values(8, "weichang", "weichang's yummy cake", 10,
"you will love it","1000-01-01 00:00:07");
insert into recipe values(9, "Jackie", "Jackie's yummy cake", 10,
"you will love it","1000-01-01 00:00:08");
insert into recipe values(10, "Jackie", "Grandma's Fettuccini Alfredo", 3,
"I miss my grandma so much","1000-01-01 00:00:09");
insert into recipe values(11, "bc1958", "tuna roll", 1,
"handmade tuna roll","1000-01-01 00:00:10");
insert into recipe values(12, "weichang", "tuna sushi", 1,
"handmade tuna sushi","1000-01-01 00:00:11");
insert into recipe values(13, "gluttony", "tuna sashimi", 1,
"handmade tuna sashimi","1000-01-01 00:00:12");
insert into recipe values(14, "Jackie", "american tuna", 1,
"tuna will make america great again","1000-01-01 00:00:13");
insert into recipe values(15, "ronaldo", "democratic tuna", 1,
"democratic tuna is the only correct tuna","1000-01-01 00:00:14");


insert into ingredient values(6, "sugar", 2000, 0);
insert into ingredient values(6, "chocolate", 2000, 0);
insert into ingredient values(7, "sugar", 700, 0);
insert into ingredient values(7, "milk", 500, 1);
insert into ingredient values(8, "sugar", 200, 0);
insert into ingredient values(9, "sugar", 2000, 0);
insert into ingredient values(9, "salt", 1000, 0);

insert into tag values(1, "italian");
insert into tag values(1, "vegetarian");
insert into tag values(1, "healthy");
insert into tag values(2, "seafood");
insert into tag values(2, "cheese");
insert into tag values(3, "hotpot");
insert into tag values(4, "great");
insert into tag values(4, "again");
insert into tag values(4, "broccoli");
insert into tag values(5, "political correct");
insert into tag values(5, "italian");
insert into tag values(6, "cake");
insert into tag values(7, "cake");
insert into tag values(8, "cake");
insert into tag values(9, "cake");


insert into related values(1, 2);
insert into related values(1, 5);
insert into related values(1, 10);
insert into related values(2, 4);
insert into related values(2, 13);
insert into related values(2, 5);
insert into related values(3, 7);
insert into related values(4, 11);
insert into related values(4, 12);
insert into related values(5, 6);
insert into related values(9, 10);
insert into related values(7, 8);
insert into related values(11, 13);
insert into related values(12, 14);
insert into related values(13, 15);


insert into review values(1, "bc1958", 10, "Yummy!", 5, "Really, really, tasty!", "better ingredient","2000-01-01 00:00:00");
insert into review values(2, "bc1958", 11, "Yummy!", 5, "Really, really, tasty!", "better ingredient!","2000-01-01 00:00:01");
insert into review values(3, "bc1958", 12, "Yummy!", 4, "Really, really, tasty!", "better ingredient!!","2000-01-01 00:00:02");
insert into review values(4, "bc1958", 13, "Yummy!", 5, "Really, really, tasty!", "better ingredient!!!","2000-01-01 00:00:03");
insert into review values(5, "bc1958", 14, "Yummy!", 2, "Really, really, tasty!", "better ingredient!!!!","2000-01-01 00:00:04");
insert into review values(6, "bc1958", 15, "Yummy!", 1, "Really, really, tasty!", "better ingredient!!!","2000-01-01 00:00:05");
insert into review values(7, "weichang", 11, "Yummy!", 5, "Really, really, tasty!", "No idea","2000-01-01 00:00:06");
insert into review values(8, "weichang", 12, "Yummy!", 5, "Really, really, tasty!", "No idea","2000-01-01 00:00:07");
insert into review values(9, "weichang", 13, "Yummy!", 3, "Really, really, tasty!", "No idea","2000-01-01 00:00:08");
insert into review values(10, "weichang", 14, "Yummy!", 4, "Really, really, tasty!", "No idea","2000-01-01 00:00:09");
insert into review values(11, "weichang", 15, "Yummy!", 3, "Really, really, tasty!", "No idea","2000-01-01 00:00:10");
insert into review values(12, "Jackie", 15, "Yummy!", 1, "Really, really, tasty!", "No idea","2000-01-01 00:00:11");
insert into review values(13, "ronaldo", 14, "Yummy!", 1, "Really, really, tasty!", "perfect","2000-01-01 00:01:06");
insert into review values(14, "gluttony", 11, "Yummy!", 3, "Really, really, tasty!", "perfect!","2000-01-01 00:10:06");
insert into review values(15, "gluttony", 12, "Yummy!", 3, "Really, really, tasty!", "perfect!!!","2000-01-01 00:11:06");
insert into review values(16, "gluttony", 13, "Yummy!", 5, "Really, really, tasty!", "perfect!!!!","2000-01-01 10:00:06");


insert into user_group values (1, "Park Slope Cake Club","weichang");
insert into user_group values (2, "Poly Curry Club","bc1958");


insert into group_mem values(1, "bc1958");
insert into group_mem values(1, "weichang");
insert into group_mem values(1, "gluttony");
insert into group_mem values(2, "gluttony");

insert into group_mem values(1, "wz887@nyu.edu");
insert into group_mem values(2, "wz887@nyu.edu");



insert into user_event values(1, 1, "hotpot together", "bc1958", "1000-01-01 00:00:00", "9999-12-31 23:59:59", 10);
insert into user_event values(2, 1, "pizza together", "weichang", "1000-01-01 00:00:00", "9999-12-31 23:59:59", 10);
insert into user_event values(3, 1, "pasta together", "gluttony", "1000-01-01 00:00:00", "9999-12-31 23:59:59", 10);
insert into user_event values(4, 1, "great again!", "Jackie", "1000-01-01 00:00:00", "9999-12-31 23:59:59", 10);
insert into user_event values(5, 1, "political correct!", "bc1958", "1000-01-01 00:00:00", "9999-12-31 23:59:59", 10);

insert into rsvp values("bc1958", 1);
insert into rsvp values("bc1958", 2);
insert into rsvp values("bc1958", 3);
insert into rsvp values("weichang", 2);
insert into rsvp values("weichang", 3);
insert into rsvp values("weichang", 4);
insert into rsvp values("gluttony", 3);
insert into rsvp values("Jackie", 4);
insert into rsvp values("Jackie", 1);
insert into rsvp values("ronaldo", 5);
insert into rsvp values("ronaldo", 2);

insert into rsvp values("wz887@nyu.edu", 1);
insert into rsvp values("wz887@nyu.edu", 2);
insert into rsvp values("wz887@nyu.edu", 3);
insert into rsvp values("wz887@nyu.edu", 4);
insert into rsvp values("wz887@nyu.edu", 5);

insert into event_report values(1,"wz887@nyu.edu", 2,"amazing event","1000-01-01 00:00:00");	
insert into event_report values(2,"wz887@nyu.edu", 1,"amazing event2","1000-01-01 00:00:01");	
insert into event_report values(3,"wz887@nyu.edu", 3,"amazing event3","1000-01-01 00:00:02");	
insert into event_report values(4,"wz887@nyu.edu", 4,"amazing event4","1000-01-01 00:00:10");
insert into event_report values(0,"wz887@nyu.edu", 3,"amazing event!!!!","1000-01-01 00:00:10");
insert into event_report values(0,"wz887@nyu.edu", 4,"amazing event!!????!!","1000-01-01 00:00:10");			