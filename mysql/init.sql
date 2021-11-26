CREATE DATABASE IF NOT EXISTS mercuryschool;
USE mercuryschool;

create table if not exists profile
(
    id              serial,
    name            tinytext                               null,
    phone           tinytext                               null,
    email           tinytext                               null,
    create_datetime datetime default '2021-01-01 00:00:00' not null,
    pass            tinytext                               null,
    board_url       varchar(255)                           null,
    code            int                                    null,
    PRIMARY KEY (ID)
    )
    engine = MyISAM
    charset = utf8;

create table if not exists raspisanie
(
    id         serial,
    data_yroka datetime                null,
    profile_id int unsigned default 0  not null,
    url        tinytext charset latin1 null,
    title      varchar(200) default '' not null,
    PRIMARY KEY (ID)
    )
    engine = MyISAM
    charset = utf8;

set @x := (select count(*) from information_schema.statistics where table_name = 'raspisanie' and index_name = 'raspisanie_profile_id_fk' and table_schema = database());
set @sql := if( @x > 0, 'select ''Index exists.''', 'Alter Table raspisanie ADD Index raspisanie_profile_id_fk (profile_id);');
PREPARE stmt FROM @sql;
EXECUTE stmt;

create table if not exists student
(
    id         serial,
    course     smallint null,
    grade      smallint null,
    profile_id int      null,
    PRIMARY KEY (ID),
    constraint student_user_id_uindex
    unique (profile_id)
    )
    engine = MyISAM
    charset = utf8;

set @x := (select count(*) from information_schema.statistics where table_name = 'student' and index_name = 'student_profile_id_fk' and table_schema = database());
set @sql := if( @x > 0, 'select ''Index exists.''', 'Alter Table student ADD Index student_profile_id_fk (profile_id);');
PREPARE stmt FROM @sql;
EXECUTE stmt;