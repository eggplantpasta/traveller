create table tt_character (
  character_id integer
  title char(100)
, name char(100)
, age integer
, strength integer
, dexterity integer
, endurance integer
, intelligence integer
, education integer
, social_standing integer
, create_date date
, update_date date
);

-- sampe data
insert into tt_character (character_id, title, name, age, strength, dexterity, endurance, intelligence, education, social_standing, create_date, update_date) values
  (1, 'Count', 'Duku', 46, 8, 15, 8, 12, 12, 14, now(), now()),
  (2, 'Mr', 'Smith', 28, 8, 15, 8, 10, 6, 7, now(), now()),
  (2, 'Mrs', 'Smith', 22, 8, 9, 8, 14, 3, 8, now(), now());
