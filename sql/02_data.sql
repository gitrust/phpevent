
/* admin / pass */
insert into Users(id,firstname,login,email,userRole,pass) VALUES(uuid(),"Administrator","admin","admin@admin.com","admin","$2y$10$SmqcxrGF5Kjt.7orVnLTtOcuSAARn385aLowpc5VefkjN5VqS86Qa");
insert into Users(id,firstname,login,email,userRole,pass) VALUES(uuid(),"User","user","user@admin.com","user","$2y$10$SmqcxrGF5Kjt.7orVnLTtOcuSAARn385aLowpc5VefkjN5VqS86Qa");

insert into FoodCategories(id,name) VALUES(uuid(),"Salad");
insert into FoodCategories(id,name) VALUES(uuid(),"Misc");
insert into FoodCategories(id,name) VALUES(uuid(),"Appetizer");
insert into FoodCategories(id,name) VALUES(uuid(),"Dessert");
insert into FoodCategories(id,name) VALUES(uuid(),"Dinner");

INSERT INTO Events(id,targetDate, title, subtitle, eventOrganizer, eventLocation)
 VALUES("92c4b7c9-a693-11ee-bf31-0242ac120002", NOW()+INTERVAL 1 DAY, "Christmas", "at home", "Helga", "Munich");
INSERT INTO Events(id,targetDate, title, subtitle, eventOrganizer, eventLocation)
 VALUES(uuid(), NOW()+INTERVAL 3 DAY, "Meet&Grill", "30 persons", "Klaus", "Munich");
INSERT INTO Events(id,targetDate, title, subtitle, eventOrganizer, eventLocation)
 VALUES(uuid(), NOW()+INTERVAL 7 DAY, "Grillfest", "25 persons", "Gerlinde", "Munich");

INSERT INTO Tasks(id,eventId,name, daytime, volunteer)
    VALUES(uuid(),"92c4b7c9-a693-11ee-bf31-0242ac120002","Get snacks","8h","Chris");
INSERT INTO Tasks(id,eventId,name, daytime)
    VALUES(uuid(),"92c4b7c9-a693-11ee-bf31-0242ac120002","Get softdrinks","10h");
INSERT INTO Tasks(id,eventId,name, daytime,description)
    VALUES(uuid(),"92c4b7c9-a693-11ee-bf31-0242ac120002","Prepare location","12h","");
INSERT INTO Tasks(id,eventId,name, daytime)
    VALUES(uuid(),"92c4b7c9-a693-11ee-bf31-0242ac120002","Decoration","7h");
INSERT INTO Tasks(id,eventId,name)
    VALUES(uuid(),"92c4b7c9-a693-11ee-bf31-0242ac120002","Clean up");