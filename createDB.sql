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
)
create table tb_semester(
	sem_begintime date not null,
	sem_endtime data not null,
	sem_name varchar(50)
)
create table tb_student(
	batch_id int not null,
	roll_id varchar(40) primary key not null,
	chinese_name varchar(40) not null,
	english_name varchar(40) not null
	CONSTRAINT `STU_BAT` FOREIGN KEY (`batch_id`) REFERENCES `tb_batchs` (`batch_id`)
)
create table tb_teacher(
	teacher_id int primary key auto_increment,
	teacher_name varchar(40) not null
)
create table tb_class(
	class_id int primary KEY auto_increment,
	teacher_id int,
	class_name varchar(100) not null,
	class_locations varchar(),
	class_week
	CONSTRAINT `TEA_CLA` FOREIGN KEY (`teacher_id`) REFERENCES `tb_teacher` (`teacher_id`)
)
create table tb_batch_class(
	class_id int not null,
	batch_id int not null,
	CONSTRAINT `bat_cla` FOREIGN KEY (`class_id`) REFERENCES `tb_class` (`class_id`),
	CONSTRAINT `BAT_CLA` FOREIGN KEY (`batch_id`) REFERENCES `tb_batchs` (`batch_id`)
)
create table 