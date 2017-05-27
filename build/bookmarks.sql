create database bookmarks;
use bookmarks;
--Create User table
create table tblUser (
	username varchar(16) not null primary key,
	passwd char(40) not null,
	email varchar(100) not null
				);
--Insert Test DATA
INSERT INTO tblUser(username, passwd, email) VALUES ('Testuser', 'testuser', 'testuser@test.com');
INSERT INTO tblUser(username, passwd, email) VALUES ('MH', 'salasana', 'mh@test.com');
INSERT INTO tblUser(username, passwd, email) VALUES ('MHJ', 'salasana', 'mhj@test.com');
INSERT INTO tblUser(username, passwd, email) VALUES ('MJH', 'salasana', 'mjh@test.com');
create table tblBookmark (
	username varchar(16) not null,
	bm_url varchar(255) not null,
	index(username),
	index(bm_url),
	primary key (username, bm_url)
				);
--Insert Test DATA
INSERT INTO tblBookmark (username, bm_url) VALUES ('Testuser', 'www.facebook.com');
INSERT INTO tblBookmark (username, bm_url) VALUES ('MH', 'www.facebook.com');
INSERT INTO tblBookmark (username, bm_url) VALUES ('MH', 'www.twitter.com');
INSERT INTO tblBookmark (username, bm_url) VALUES ('MHJ', 'www.facebook.com');
INSERT INTO tblBookmark (username, bm_url) VALUES ('MHJ', 'www.twitter.com');
INSERT INTO tblBookmark (username, bm_url) VALUES ('MHJ', 'www.google.com');
INSERT INTO tblBookmark (username, bm_url) VALUES ('MJH', 'www.facebook.com');
INSERT INTO tblBookmark (username, bm_url) VALUES ('MJH', 'www.google.com');
INSERT INTO tblBookmark (username, bm_url) VALUES ('MJH', 'www.twitter.com');