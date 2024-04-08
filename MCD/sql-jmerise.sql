#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Simp_Grade
#------------------------------------------------------------

CREATE TABLE Simp_Grade(
        Id_Grade             Int  Auto_increment  NOT NULL ,
        Name_Grade           Varchar (255) NOT NULL ,
        Student_Number_Grade Int NOT NULL ,
        DateStart_Grade      Date NOT NULL ,
        DateEnd_Grade        Date NOT NULL
	,CONSTRAINT Simp_Grade_PK PRIMARY KEY (Id_Grade)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Simp_Role
#------------------------------------------------------------

CREATE TABLE Simp_Role(
        Id_Role   Int  Auto_increment  NOT NULL ,
        Name_Role Varchar (255) NOT NULL
	,CONSTRAINT Simp_Role_PK PRIMARY KEY (Id_Role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Simp_User
#------------------------------------------------------------

CREATE TABLE Simp_User(
        Id_User        Int  Auto_increment  NOT NULL ,
        LastName_User  Varchar (255) NOT NULL ,
        FirstName_User Varchar (255) NOT NULL ,
        Password_User  Varchar (255) NOT NULL ,
        Activated_User TinyINT NOT NULL ,
        Email_User     Varchar (255) NOT NULL ,
        Id_Role        Int
	,CONSTRAINT Simp_User_AK UNIQUE (Email_User)
	,CONSTRAINT Simp_User_PK PRIMARY KEY (Id_User)

	,CONSTRAINT Simp_User_Simp_Role_FK FOREIGN KEY (Id_Role) REFERENCES Simp_Role(Id_Role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Simp_Course
#------------------------------------------------------------

CREATE TABLE Simp_Course(
        Id_Course        Int  Auto_increment  NOT NULL ,
        Name_Course      Varchar (255) NOT NULL ,
        HourStart_Course Time NOT NULL ,
        HourEnd_Course   Time NOT NULL ,
        Date_Course      Date NOT NULL ,
        Code_Course      Int NOT NULL ,
        Id_Grade         Int NOT NULL
	,CONSTRAINT Simp_Course_PK PRIMARY KEY (Id_Course)

	,CONSTRAINT Simp_Course_Simp_Grade_FK FOREIGN KEY (Id_Grade) REFERENCES Simp_Grade(Id_Grade)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UserHasClass
#------------------------------------------------------------

CREATE TABLE UserHasClass(
        Id_Grade Int NOT NULL ,
        Id_User  Int NOT NULL
	,CONSTRAINT UserHasClass_PK PRIMARY KEY (Id_Grade,Id_User)

	,CONSTRAINT UserHasClass_Simp_Grade_FK FOREIGN KEY (Id_Grade) REFERENCES Simp_Grade(Id_Grade)
	,CONSTRAINT UserHasClass_Simp_User0_FK FOREIGN KEY (Id_User) REFERENCES Simp_User(Id_User)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UserHasCourse
#------------------------------------------------------------

CREATE TABLE UserHasCourse(
        Id_Course Int NOT NULL ,
        Id_User   Int NOT NULL ,
        IsLate    TinyINT NOT NULL ,
        IsAbsent  TinyINT NOT NULL
	,CONSTRAINT UserHasCourse_PK PRIMARY KEY (Id_Course,Id_User)

	,CONSTRAINT UserHasCourse_Simp_Course_FK FOREIGN KEY (Id_Course) REFERENCES Simp_Course(Id_Course)
	,CONSTRAINT UserHasCourse_Simp_User0_FK FOREIGN KEY (Id_User) REFERENCES Simp_User(Id_User)
)ENGINE=InnoDB;

