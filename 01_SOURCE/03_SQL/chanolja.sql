create database chanolja_hst;
create database chanolja_mst;

use chanolja_hst;

create table TBL_LOGIN_HST(	# 로그인 로그 기록 
	LOGIN_DATETIME datetime NOT NULL, # 생성 일자
    USER_SEQ char(16) NOT NULL, # 사용자 고유번호
    USER_OS varchar(32) NOT NULL, # 사용자 OS
    USER_IP varchar(32) NOT NULL, # 사용자 IP
	USER_LANGUAGE varchar(32) NOT NULL, # 사용자 언어
    USER_BROWSER varchar(32) NOT NULL, # 사용자 브라우저
    WEB_WIDTH int NOT NULL, # 사용자 웹 가로 사이즈 
    WEB_HEIGHT int NOT NULL, # 사용자 웹 세로 사이즈 
    primary key (LOGIN_DATETIME, USER_SEQ) 
) engine=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;

create table TBL_ACCESS_HST ( # 사용자 접속 기록
	AC_DATETIME datetime NOT NULL, # 접속 일자
    USER_SEQ char(16) NOT NULL, # 사용자 고유번호 
    AC_PAGE varchar(100) NOT NULL, # 접속 페이지 
    primary key (USER_SEQ, AC_DATETIME)
) engine=InnoDB default charset=utf8mb4 collate=utf8mb4_0900_ai_ci;

use chanolja_mst;

CREATE TABLE TBL_RECOMENDER ( # 
  RECOMENDER char(16) NOT NULL,
  RECOMMENDED char(16) NOT NULL,
  PRIMARY KEY (RECOMENDER,RECOMMENDED)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE TBL_USER (
  USER_SEQ char(16) NOT NULL,
  USER_ID varchar(32) NOT NULL,
  USER_PW char(255) NOT NULL,
  USER_NAME char(32) DEFAULT NULL,
  USER_CELL char(16) DEFAULT NULL,
  USER_EMAIL char(128) DEFAULT NULL,
  USER_SEX char(1) DEFAULT 'h',
  USER_BIRTH datetime DEFAULT '1900-01-01 00:00:00',
  USER_ADDR varchar(200) NOT NULL,
  USE_FLAG tinyint(1) DEFAULT NULL,
  WRT_DATETIME datetime DEFAULT NULL,
  UPD_DATETINE datetime DEFAULT NULL,
  PRIMARY KEY (USER_SEQ,USER_ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;