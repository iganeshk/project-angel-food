

USE angelfood;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS emergency_contact;
DROP TABLE IF EXISTS casemanager_site_user_map;
DROP TABLE IF EXISTS casemanager;
DROP TABLE IF EXISTS site_user_cohabitant_map;
DROP TABLE IF EXISTS cohabitant;

DROP TABLE IF EXISTS site_user_special_need_map ;
DROP TABLE IF EXISTS special_need; 
DROP TABLE IF EXISTS site_user_housing_type_map;
DROP TABLE IF EXISTS housing_type;
DROP TABLE IF EXISTS site_user_food_prep_map ;
DROP TABLE IF EXISTS food_prep_facilities;
DROP TABLE IF EXISTS site_user;
DROP TABLE IF EXISTS address;
DROP TABLE IF EXISTS site_user_type;
DROP TABLE IF EXISTS sexual_orientation;
DROP TABLE IF EXISTS race;
DROP TABLE IF EXISTS gender;
DROP TABLE IF EXISTS refer;
DROP TABLE IF EXISTS refer_type;
DROP TABLE IF EXISTS admin_action;
DROP TABLE IF EXISTS alert_action;
DROP TABLE IF EXISTS medical_diagnosises;
DROP TABLE IF EXISTS site_user_diagnosis_map;
DROP TABLE IF EXISTS congressional_districts ;
DROP TABLE IF EXISTS state ;
DROP TABLE IF EXISTS county ;
DROP TABLE IF EXISTS political_info ;




SET FOREIGN_KEY_CHECKS = 1;



CREATE TABLE site_user_type(userTypeId INT auto_increment,created_at DATETIME,
    updated_at DATETIME, PRIMARY KEY(userTypeId), userTypeName VARCHAR(20));
CREATE TABLE race(raceTypeId INT auto_increment, created_at DATETIME,
    updated_at DATETIME,PRIMARY KEY(raceTypeId), raceTypeName VARCHAR(20));
CREATE TABLE sexual_orientation(sexualOrientationTypeId INT auto_increment,created_at DATETIME,
    updated_at DATETIME, PRIMARY KEY(sexualOrientationTypeId), sexualOrientationTypeName VARCHAR(20));
CREATE TABLE gender(genderTypeId INT auto_increment, created_at DATETIME,
    updated_at DATETIME,PRIMARY KEY(genderTypeId), genderTypeName VARCHAR(20));
CREATE TABLE address(
    addressId INT NOT NULL auto_increment, 
    addrLine1 VARCHAR(100), 
    addrLine2 VARCHAR(100), 
    city VARCHAR(100),
    state VARCHAR(100),
    zip VARCHAR(100),
    created_at DATETIME,
    updated_at DATETIME,
    PRIMARY KEY(addressId));
CREATE TABLE refer_type(referTypeId INT  not null auto_increment ,PRIMARY KEY(referTypeId), created_at DATETIME,
    updated_at DATETIME, referTypeName VARCHAR(20));
CREATE TABLE refer(
	referId INT NOT NULL auto_increment,  
	referTypeId INT, 
	referPhone VARCHAR(20), 
	referName VARCHAR(20), 
    created_at DATETIME,
    updated_at DATETIME,
    PRIMARY KEY(referId),
	FOREIGN KEY(referTypeId) references refer_type(referTypeId));
CREATE TABLE casemanager(
	casemanagerId INT  NOT NULL auto_increment,
	PRIMARY KEY(casemanagerId),
	casemanagerName VARCHAR(20),
    created_at DATETIME,
    updated_at DATETIME,
    casemanagerPhone VARCHAR(20),
    casemanagerFax VARCHAR(20),
    casemanagerAgency VARCHAR(20)
    );
CREATE TABLE housing_type(housingTypeId INT NOT NULL AUTO_INCREMENT,created_at DATETIME,
    updated_at DATETIME, PRIMARY KEY(housingTypeId), housingTypeName VARCHAR(20));
 
CREATE TABLE site_user(
	uid INT NOT NULL auto_increment, 
	fname VARCHAR(20), 
	lname VARCHAR(20), 
    email VARCHAR(100),
    username varchar(50) unique,
    password VARCHAR(100),
	dob DATE, 
	ssn VARCHAR(20), 
	mobPhone VARCHAR(20), 
	printLang VARCHAR(20), 
	oralLang VARCHAR(20), 
	userTypeId INT , 
	genderTypeId INT,
	raceTypeId INT, 
	sexualOrientationTypeId INT,
    housingTypeId INT,
	isVeteran BOOL, 
    addressId INT,
    referId INT,
    created_at DATETIME,
    updated_at DATETIME,
    casemanagerId INT,
    token varchar(100),
    active bool,
    PRIMARY KEY (uid));

 
CREATE TABLE food_prep_facilities(prepId INT NOT NULL auto_increment, created_at DATETIME,
    updated_at DATETIME,PRIMARY KEY(prepId), prepName VARCHAR(20));
CREATE TABLE site_user_food_prep_map (
	prepId INT , 
	uid INT,
	PRIMARY KEY(prepId,uid));



CREATE TABLE special_need(specialNeedId INT NOT NULL AUTO_INCREMENT, created_at DATETIME,
    updated_at DATETIME,PRIMARY KEY(specialNeedId), specialNeedName VARCHAR(20) );
CREATE TABLE site_user_special_need_map (
	specialNeedId INT , 
	uid INT, 
	PRIMARY KEY(specialNeedId,uid));


CREATE TABLE cohabitant(
    cohabitantId INT NOT NULL auto_increment,
    cohabitantFirstName VARCHAR(20),
    cohabitantLastName VARCHAR(30),
	cohabitantAge INT, 
	relationship VARCHAR(20), 
    created_at DATETIME,
    updated_at DATETIME,
	isCaretaker BOOL,
	mealRequired BOOL,
	PRIMARY KEY(cohabitantId));
 
CREATE TABLE site_user_cohabitant_map(uid INT, cohabitantId int,  PRIMARY KEY(cohabitantId, uid) );


CREATE TABLE emergency_contact(contactId int Primary Key,uid INT, contactName VARCHAR(20),created_at DATETIME,
    updated_at DATETIME, phone VARCHAR(20), relation VARCHAR(20));

CREATE TABLE medical_diagnosises(diagnosisId INT NOT NULL auto_increment, created_at DATETIME,
    updated_at DATETIME,PRIMARY KEY(diagnosisId), diagnosisName VARCHAR(20));
CREATE TABLE site_user_diagnosis_map(
	uid INT, 
	diagnosisId INT ,
	PRIMARY KEY (uid,diagnosisId));

CREATE TABLE admin_action(ACTION_ID INT PRIMARY KEY, ACTION_NAME VARCHAR(20));
CREATE TABLE alert_action(
	actionId INT,
	uid INT,
	ALERT_DATE DATETIME , 
	ENTERED_BY VARCHAR(20),
	notes VARCHAR(100));

CREATE TABLE congressional_districts(congressionalDId INT PRIMARY KEY, congressionalDName VARCHAR(20) );
CREATE TABLE county (countyID INT PRIMARY KEY, countyName VARCHAR(20));
CREATE TABLE state (stateId INT PRIMARY KEY, stateName VARCHAR(20));
CREATE TABLE political_info( 
	uid int,
	countyId INT,
    stateId INT, 
    congressionalDId INT );
