create database projectDB;
use projectDB;
SET SQL_SAFE_UPDATES=0;
alter database projectdb  character set utf8;
create table tb_users(
	user_id varchar(40) primary key not null,
	user_pwd varchar(40) not null,
	user_email varchar(50) not null unique,
	user_img text null,
	user_identity varchar(20) null,
	user_regdate datetime not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_problems(
	pro_id int primary key AUTO_INCREMENT,
	pro_des text not null,
	pro_type int not null,
	pro_create_user varchar(40) not null,
	pro_create_time datetime not null,
	CONSTRAINT `PR_US` FOREIGN KEY (`pro_create_user`) REFERENCES `tb_users` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_ans(
	ans_id int not null primary key auto_increment,
	pro_id int not null,
	ans text not null,
	CONSTRAINT `ANS_PR` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_feedbacks(
	fb_id int not null auto_increment primary key,
	fb_name varchar(50) not null,
	fb_des text null,
	fb_begin datetime not null,
	fb_end datetime not null, 
	fb_create_time datetime not null,
	fb_create_user varchar(40) not null,
	fb_askgroup int null,
	CONSTRAINT `FB_US` FOREIGN KEY (`fb_create_user`) REFERENCES `tb_users` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_fb_pro(
	fb_id int not null,
	pro_id int not null,
	CONSTRAINT `FB_PR1` FOREIGN KEY (`fb_id`) REFERENCES `tb_feedbacks` (`fb_id`),
	CONSTRAINT `FB_PR2` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_submit(
	sub_id int auto_increment not null primary key,
	user_id varchar(40) not null,
	sub_time datetime not null,
	fb_id int not null,
	groups text null,
	CONSTRAINT `SUB_FB` FOREIGN KEY (`fb_id`) REFERENCES `tb_feedbacks` (`fb_id`),
	CONSTRAINT `SUB_US` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_sub_detail(
	sub_id int not null,
	pro_id int not null,
	ans text null,
	ans_id int null,
	CONSTRAINT `SUB_DET` FOREIGN KEY (`sub_id`) REFERENCES `tb_submit` (`sub_id`),
	CONSTRAINT `DET_PRO` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table tb_batchs(
	batch_id int primary key auto_increment,
	batch_name varchar(50) not null,
	batch_yeas int not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_semester(
	sem_id int primary key auto_increment not null,
	sem_begintime date not null,
	sem_endtime date not null,
	sem_status int null,
	sem_name varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_student(
		batch_id int not null,
	st_roll_id varchar(40) primary key not null,
	st_chinese_name varchar(40) not null,
	st_english_name varchar(40) not null,
	CONSTRAINT `STU_BAT` FOREIGN KEY (`batch_id`) REFERENCES `tb_batchs` (`batch_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_teacher(
	teacher_id int primary key auto_increment,
	teacher_name varchar(40) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_class(
	sem_id int not null,
	class_id int primary KEY auto_increment,
	teacher_id int,
	class_name varchar(100) not null,
	class_locations varchar(100),
	CONSTRAINT `SEM_CLA` FOREIGN KEY (`sem_id`) REFERENCES `tb_semester` (`sem_id`),
	CONSTRAINT `TEA_CLA` FOREIGN KEY (`teacher_id`) REFERENCES `tb_teacher` (`teacher_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_batch_class(
	class_id int not null,
	batch_id int not null,
	CONSTRAINT `bat_cla` FOREIGN KEY (`class_id`) REFERENCES `tb_class` (`class_id`),
	CONSTRAINT `cla_bat` FOREIGN KEY (`batch_id`) REFERENCES `tb_batchs` (`batch_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_class_time(
	ct_id int primary key auto_increment not null,
	class_id int not null,
	ct_week int not null,
	ct_weekday int not null,
	ct_daytime varchar(20),
	CONSTRAINT `time_class` FOREIGN KEY (`class_id`) REFERENCES `tb_class` (`class_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_user_student(
	st_roll_id varchar(40) not null,
	user_id varchar(40) not null,
	CONSTRAINT `st_user` FOREIGN KEY (`st_roll_id`) REFERENCES `tb_student` (`st_roll_id`),
	CONSTRAINT `user_st` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_user_teacher(
	teacher_id int not null,
	user_id varchar(40) not null,
	CONSTRAINT `tc_user` FOREIGN KEY (`teacher_id`) REFERENCES `tb_teacher` (`teacher_id`),
	CONSTRAINT `user_tc` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table tb_check_student(
	ct_id int not null,
	st_roll_id varchar(40) not null,
	ckst_check int null,	##为空则没有到，
	ckst_reason varchar(200) null,
	CONSTRAINT `ck_ct` FOREIGN KEY (`ct_id`) REFERENCES `tb_class_time` (`ct_id`),
	CONSTRAINT `ck_st` FOREIGN KEY (`st_roll_id`) REFERENCES `tb_student` (`st_roll_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
