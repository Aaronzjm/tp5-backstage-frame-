#生活服务分类表
CREATE TABLE 'o2o_category'(
  'id' int(11) unsigned NOT NULL  auto_increment,
  'name' VARCHAR(50) NOT  NULL DEFAULT '',
  'parent_id' int(10) unsigned NOT NULL  DEFAULT 0,
  'listOrder' int(8) unsigned NOT NULL DEFAULT 0,
  'status' tinyint(1) NOT NULL DEFAULT 0,
  'create_time' int(11) unsigned NOT NULL DEFAULT 0,
  'update_time' int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY ('id'),
  KEY parent_id('parent_id')
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#城市表
CREATE TABLE 'o2o_city'(
  'id' int(11) unsigned NOT NULL  auto_increment,
  'name' VARCHAR(50) NOT  NULL DEFAULT '',
  'uname' VARCHAR(50) NOT  NULL DEFAULT '',
  'parent_id' int(10) unsigned NOT NULL  DEFAULT 0,
  'listOrder' int(8) unsigned NOT NULL DEFAULT 0,
  'status' tinyint(1) NOT NULL DEFAULT 0,
  'create_time' int(11) unsigned NOT NULL DEFAULT 0,
  'update_time' int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY ('id'),
  KEY parent_id('parent_id'),
  UNIQUE KEY uname('uname')
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#商圈表
CREATE TABLE 'o2o_area'(
  'id' int(11) unsigned NOT NULL  auto_increment,
  'name' VARCHAR(50) NOT  NULL DEFAULT '',
  'city_id' int(11) unsigned NOT NULL  DEFAULT 0,
  'parent_id' int(10) unsigned NOT NULL  DEFAULT 0,
  'listOrder' int(8) unsigned NOT NULL DEFAULT 0,
  'status' tinyint(1) NOT NULL DEFAULT 0,
  'create_time' int(11) unsigned NOT NULL DEFAULT 0,
  'update_time' int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY ('id'),
  KEY parent_id('parent_id'),
  KEY city_id('city_id')
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#商户表
CREATE TABLE 'o2o_bis'(
  'id' int(11) unsigned NOT NULL  auto_increment,
  'name' VARCHAR(50) NOT  NULL DEFAULT '',
  'email' VARCHAR(50) NOT  NULL DEFAULT '',
  'logo' VARCHAR(255) NOT  NULL DEFAULT '',
  'description' text NOT  NULL,
  'city_id' int(11) unsigned NOT NULL  DEFAULT 0,
  'city_path' varchar(50) NOT NULL DEFAULT '',
  'money' DECIMAL(20,2)  NOT NULL  DEFAULT '0.00',
  'listOrder' int(8) unsigned NOT NULL DEFAULT 0,
  'status' tinyint(1) NOT NULL DEFAULT 0,
  'create_time' int(11) unsigned NOT NULL DEFAULT 0,
  'update_time' int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY ('id'),
  KEY name('name'),
  KEY city_id('city_id')
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#商户账号表
CREATE TABLE 'o2o_bis_account'(
  'id' int(11) unsigned NOT NULL  auto_increment,
  'username' VARCHAR(50) NOT  NULL DEFAULT '',
  'password' char(32) NOT NULL DEFAULT '',
  'code' VARCHAR(10) NOT NULL DEFAULT '',
  'bis_id' int(11) unsigned NOT NULL DEFAULT 0,
  'last_login_ip' VARCHAR(30) NOT NULL DEFAULT '',
  'last_login_time' int(11) NOT NULL DEFAULT 0,
  'is_main' tinyint(1) unsigned NOT NULL DEFAULT 0,
  'listOrder' int(8) unsigned NOT NULL DEFAULT 0,
  'status' tinyint(1) NOT NULL DEFAULT 0,
  'create_time' int(11) unsigned NOT NULL DEFAULT 0,
  'update_time' int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY ('id'),
  KEY username('username'),
  KEY bis_id('bis_id')
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#商户门店表
CREATE TABLE 'o2o_bis_location'(
  'id' int(11) unsigned NOT NULL  auto_increment,
  'name' VARCHAR(50) NOT  NULL DEFAULT '',
  'logo' VARCHAR(255) NOT  NULL DEFAULT '',
  'address' VARCHAR(255) NOT  NULL DEFAULT '',
  'description' text NOT  NULL
  'is_main' tinyint(1) unsigned NOT NULL DEFAULT 0,
  'city_id' int(11) unsigned NOT NULL  DEFAULT 0,
  'city_path' varchar(50) NOT NULL DEFAULT '',
  'money' DECIMAL(20,2)  NOT NULL  DEFAULT '0.00',
  'listOrder' int(8) unsigned NOT NULL DEFAULT 0,
  'status' tinyint(1) NOT NULL DEFAULT 0,
  'create_time' int(11) unsigned NOT NULL DEFAULT 0,
  'update_time' int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY ('id'),
  KEY name('name'),
  KEY city_id('city_id')
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
