create table if not exists character (
  character_id integer primary key autoincrement
, name char(100)
, title char(100)
, strength integer
, dexterity integer
, endurance integer
, intelligence integer
, education integer
, social integer
);
