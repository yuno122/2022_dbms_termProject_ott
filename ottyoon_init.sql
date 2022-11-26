/* 이름: ottyoon_init.sql*/
/* 설명 */

/* root 계정으로 접속, ottyoon 데이터베이스 생성 */
DROP DATABASE IF EXISTS  ottyoon;
create database ottyoon;
commit;

/* ottyoon data 를 초기화 */
 
use ottyoon;
DROP TABLE IF EXISTS user ;
DROP TABLE IF EXISTS creditCard;
DROP TABLE IF EXISTS profile;
DROP TABLE IF EXISTS contents;
DROP TABLE IF EXISTS review;

CREATE TABLE user(
    userid varchar(40) PRIMARY KEY,
    username varchar(40),
    userpassword varchar(40),
    phone varchar(40),
    address varchar(40)
);

CREATE TABLE creditCard(
    cardid varchar(40) PRIMARY KEY,
    userid varchar(40),
    bank varchar(40),
    validity varchar(40),
    cardpassword varchar(40),
    FOREIGN KEY (userid) REFERENCES user(userid)
);

CREATE TABLE profile(
    profileid INTEGER PRIMARY KEY,
    userid varchar(40),
    nickname varchar(40),
    ratings INTEGER,
    FOREIGN KEY (userid) REFERENCES user(userid)
);

CREATE TABLE contents(
    contentsid INTEGER PRIMARY KEY,
    title varchar(40),
    genre varchar(40),
    ratings INTEGER,
    country varchar(30),
    makedate DATE,
    episode INTEGER
);

CREATE TABLE review(
    reviewid INTEGER PRIMARY KEY,
    userid varchar(40),
    contentsid INTEGER,
    content varchar(200),
    gpa INTEGER,
    FOREIGN KEY (userid) REFERENCES user(userid),
    FOREIGN KEY (contentsid) REFERENCES contents(contentsid)
);

INSERT INTO user VALUES('syh11', '신윤호','qwer1234','010-6712-2353','부산광역시 북구');
INSERT INTO user VALUES('hgd1357', '홍길동','hgd113355','010-9999-9999','서울특별시 광진구');
INSERT INTO user VALUES('sya55', '신윤아','asdf1234','010-2222-2222','경기도 하남시');
INSERT INTO user VALUES('lee96', '이정수','zxcv22','010-0022-4422','경기도 수원시');
INSERT INTO user VALUES('kim123', '김시은','kimsi11','010-7788-9119','서울특별시 강남구');
INSERT INTO user VALUES('doraemi00', '도레미','qwer1177','010-4521-4521','서울특별시 종로구');


INSERT INTO creditCard VALUES('11-2222-33333', 'syh11', '우리은행', '11/24', '0000');
INSERT INTO creditCard VALUES('11-2222-555555', 'syh11', '국민은행', '09/24','1234');
INSERT INTO creditCard VALUES('22-513531-213124', 'hgd1357', '기업은행', '10/23', '5555');
INSERT INTO creditCard VALUES('333-643-36213', 'sya55', '농협은행', '06/24', '6143');
INSERT INTO creditCard VALUES('333-17433-15325', 'sya55', '우리은행', '01/25', '6822');
INSERT INTO creditCard VALUES('333-2633-3311233', 'sya55', '우체국은행', '11/23', '1222');
INSERT INTO creditCard VALUES('4-163463-413623', 'lee96', '서울은행', '02/24', '6111');
INSERT INTO creditCard VALUES('4-22164-331643', 'lee96', '농협은행', '03/24','1133');
INSERT INTO creditCard VALUES('55-15241-125523242', 'kim123', '우리은행', '05/24', '0000');
INSERT INTO creditCard VALUES('66-1646-111111', 'doraemi00', '부산은행', '08/24', '1423');
INSERT INTO creditCard VALUES('66-162246-11441111', 'doraemi00', '서울은행', '08/23', '4423');


INSERT INTO profile VALUES(1, 'syh11', '나', 19);
INSERT INTO profile VALUES(2,'syh11', '부모님', 19);
INSERT INTO profile VALUES(3,'hgd1357', '홍길동', 15);
INSERT INTO profile VALUES(4,'sya55', '천재', 19);
INSERT INTO profile VALUES(5,'sya55', '남친', 19);
INSERT INTO profile VALUES(6,'lee96', '나', 19);
INSERT INTO profile VALUES(7,'lee96', '동생', 12);
INSERT INTO profile VALUES(8,'kim123', '나', 19);
INSERT INTO profile VALUES(9,'kim123', '동생', 15);
INSERT INTO profile VALUES(10,'kim123', '엄마', 19);
INSERT INTO profile VALUES(11,'kim123', '아빠', 19);
INSERT INTO profile VALUES(12,'doraemi00', '나', 12);
INSERT INTO profile VALUES(13,'doraemi00', '부모님', 19);


INSERT INTO contents VALUES(1,'오징어게임', '스릴러', 19, '대한민국', STR_TO_DATE('2021-09-17','%Y-%m-%d'), 9);
INSERT INTO contents VALUES(2,'1899', '액션', 19, '독일', STR_TO_DATE('2022-10-24','%Y-%m-%d'), 8);
INSERT INTO contents VALUES(3,'체인소 맨', '액션', 19, '일본', STR_TO_DATE('2022-10-11','%Y-%m-%d'), 6);
INSERT INTO contents VALUES(4,'연예인 매니저로 살아남기', '코미디', 15, '대한민국', STR_TO_DATE('2022-11-07','%Y-%m-%d'), 12);
INSERT INTO contents VALUES(5,'수리남', '범죄', 19, '대한민국', STR_TO_DATE('2022-09-09','%Y-%m-%d'), 6);
INSERT INTO contents VALUES(6,'빠삐용', '스릴러', 15, '미국', STR_TO_DATE('2019-02-27','%Y-%m-%d'), 1);
INSERT INTO contents VALUES(7,'Breaking Bad', '범죄', 19, '미국', STR_TO_DATE('2012-07-15','%Y-%m-%d'), 62);
INSERT INTO contents VALUES(8,'슬기로운 감빵생활', '드라마', 15, '대한민국', STR_TO_DATE('2017-11-22','%Y-%m-%d'), 16);
INSERT INTO contents VALUES(9,'멜로가 체질', '로맨스', 15, '대한민국', STR_TO_DATE('2019-08-09','%Y-%m-%d'), 16);
INSERT INTO contents VALUES(10,'블랙 미러', 'SF', 19, '영국', STR_TO_DATE('2019-06-05','%Y-%m-%d'), 22);

INSERT INTO review VALUES(1,'syh11', 1, '재밌는 작품입니다.', 5);
INSERT INTO review VALUES(2,'syh11', 5, '연기력이 뛰어납니다.', 5);
INSERT INTO review VALUES(3,'syh11', 7, '중간에 루즈하긴 함', 4);
INSERT INTO review VALUES(4,'syh11', 10, '개띵작', 5);
INSERT INTO review VALUES(5,'hgd1357', 1, '베리 나이스', 5);
INSERT INTO review VALUES(6,'sya55', 5, '꿀잼', 4);
INSERT INTO review VALUES(7,'sya55', 9, '나쁘지 않음', 3);
INSERT INTO review VALUES(8,'lee96', 2, '재밌어요ㅎㅎ', 4);
INSERT INTO review VALUES(9,'lee96', 3, '취향타는 작품', 3);
INSERT INTO review VALUES(10,'kim123', 6, '제 취향은 아님', 2);
INSERT INTO review VALUES(11,'kim123', 9, '웃겨요~~', 5);
INSERT INTO review VALUES(12,'kim123', 10, '꾸르잼ㅎㅎ', 5);
INSERT INTO review VALUES(13,'kim123', 4, '웃겨요~~ㅎㅎ', 4);
INSERT INTO review VALUES(14,'hgd1357', 1, '오겜 열풍~ㅎㅎ', 5);
INSERT INTO review VALUES(15,'syh11', 3, '취향이 갈린다.', 4);
INSERT INTO review VALUES(16,'doraemi00', 1, '굿', 5);
INSERT INTO review VALUES(17,'lee96', 8, '재밋음', 5);
INSERT INTO review VALUES(18,'doraemi00', 4, '노잼', 1);
