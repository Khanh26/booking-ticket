/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4/11/2022 10:19:13 PM                        */
/*==============================================================*/


/*==============================================================*/
/* Table: ACCOUNT                                               */
/*==============================================================*/
create table ACCOUNT
(
   USERNAME             varchar(50) not null  comment '',
   PASSWORD             varchar(50)  comment '',
   ROLE                 int  comment '',
   TOKEN                varchar(50)  comment '',
   VERIFY               int  comment '',
   STATUS               int  comment '',
   primary key (USERNAME)
);

/*==============================================================*/
/* Table: ADMIN                                                 */
/*==============================================================*/
create table ADMIN
(
   ID_ADMIN             int not null  comment '',
   USERNAME             varchar(50) not null  comment '',
   NAME_ADMIN           varchar(50)  comment '',
   BIRTHDAY_ADMIN       date  comment '',
   GENDER_ADMIN         int  comment '',
   EMAIL_ADMIN          varchar(50)  comment '',
   PHONE_ADMIN          varchar(11)  comment '',
   ADDRESS_ADMIN        varchar(70)  comment '',
   primary key (ID_ADMIN)
);

/*==============================================================*/
/* Table: GENRE                                                 */
/*==============================================================*/
create table GENRE
(
   ID_GENRE             int not null  comment '',
   NAME_GENRE           varchar(20)  comment '',
   primary key (ID_GENRE)
);

/*==============================================================*/
/* Table: MEMBER                                                */
/*==============================================================*/
create table MEMBER
(
   ID_MEMBER            int not null  comment '',
   USERNAME             varchar(50) not null  comment '',
   NAME_MEMBER          varchar(50)  comment '',
   BIRTHDAY_MEMBER      date  comment '',
   GENDER_MEMBER        int  comment '',
   EMAIL_MEMBER         varchar(50)  comment '',
   PHONE_MEMBER         varchar(11)  comment '',
   ADDRESS_MEMBER       varchar(70)  comment '',
   primary key (ID_MEMBER)
);

/*==============================================================*/
/* Table: MOVIE                                                 */
/*==============================================================*/
create table MOVIE
(
   ID_MOVIE             int not null  comment '',
   ID_OBJECT            varchar(5) not null  comment '',
   ID_GENRE             int not null  comment '',
   NAME                 varchar(100)  comment '',
   DIRECTOR_MOVIE       varchar(30)  comment '',
   ACTOR_MOVIE          varchar(200)  comment '',
   CONTENT_MOVIE        text  comment '',
   STATUS_MOVIE         int  comment '',
   primary key (ID_MOVIE)
);

/*==============================================================*/
/* Table: OBJECT                                                */
/*==============================================================*/
create table OBJECT
(
   ID_OBJECT            varchar(5) not null  comment '',
   NOTE_OBJECT          varchar(30)  comment '',
   primary key (ID_OBJECT)
);

/*==============================================================*/
/* Table: ROOM                                                  */
/*==============================================================*/
create table ROOM
(
   ID_ROOM              int not null  comment '',
   NAME_ROOM            varchar(20)  comment '',
   primary key (ID_ROOM)
);

/*==============================================================*/
/* Table: SHOWTIME                                              */
/*==============================================================*/
create table SHOWTIME
(
   ID_SHOWTIME          int not null  comment '',
   ID_ROOM              int not null  comment '',
   ID_MOVIE             int not null  comment '',
   DAY_SHOWTIME         date  comment '',
   TIME_STRART          time  comment '',
   TIME_END             time  comment '',
   primary key (ID_SHOWTIME)
);

/*==============================================================*/
/* Table: TICKET                                                */
/*==============================================================*/
create table TICKET
(
   ID_TICKET            varchar(10) not null  comment '',
   ID_SHOWTIME          int not null  comment '',
   DAY_TICKET           datetime  comment '',
   LOCATION_TICKET      varchar(2)  comment '',
   STATUS_TICKET        int  comment '',
   primary key (ID_TICKET)
);

alter table ADMIN add constraint FK_ADMIN_ACCOUNT_A_ACCOUNT foreign key (USERNAME)
      references ACCOUNT (USERNAME) on delete restrict on update restrict;

alter table MEMBER add constraint FK_MEMBER_ACCOUNT_M_ACCOUNT foreign key (USERNAME)
      references ACCOUNT (USERNAME) on delete restrict on update restrict;

alter table MOVIE add constraint FK_MOVIE_MOVIE_GEN_GENRE foreign key (ID_GENRE)
      references GENRE (ID_GENRE) on delete restrict on update restrict;

alter table MOVIE add constraint FK_MOVIE_MOVIE_OBJ_OBJECT foreign key (ID_OBJECT)
      references OBJECT (ID_OBJECT) on delete restrict on update restrict;

alter table SHOWTIME add constraint FK_SHOWTIME_MOVIE_SHO_MOVIE foreign key (ID_MOVIE)
      references MOVIE (ID_MOVIE) on delete restrict on update restrict;

alter table SHOWTIME add constraint FK_SHOWTIME_ROOM_SHOW_ROOM foreign key (ID_ROOM)
      references ROOM (ID_ROOM) on delete restrict on update restrict;

alter table TICKET add constraint FK_TICKET_SHOWTIME__SHOWTIME foreign key (ID_SHOWTIME)
      references SHOWTIME (ID_SHOWTIME) on delete restrict on update restrict;

