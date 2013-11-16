CREATE DATABASE tutorials_that_work;

CREATE TABLE Contributors (
	ID int NOT NULL AUTO_INCREMENT,
	LastName varchar(255) NOT NULL,
	FirstName varchar(255) NOT NULL,
	Email varchar(255) NOT NULL UNIQUE,
	Password_Digest varchar(255) NOT NULL,
	Permission int NOT NULL,
	PRIMARY KEY (ID),
	FOREIGN KEY (Permission) REFERENCES Permissions(ID)
);

CREATE TABLE Permissions (
	ID int NOT NULL AUTO_INCREMENT,
	Name varchar(255) NOT NULL UNIQUE,
	PRIMARY KEY (ID)
);

CREATE TABLE Languages (
	ID int NOT NULL AUTO_INCREMENT,
	Name varchar(255) NOT NULL UNIQUE,
	PRIMARY KEY (ID)
);

CREATE TABLE Tutorials (
	ID int NOT NULL,
	Name varchar(255) NOT NULL UNIQUE,
	Language varchar(255) NOT NULL,
	Content text NOT NULL,
	Image_URL varchar(255) NOT NULL,
	P_ID int NOT NULL,
	PRIMARY KEY (ID),
	FOREIGN KEY (P_ID) REFERENCES Contributors(ID),
	FOREIGN KEY (Language) REFERENCES Languages(Name)
);

INSERT INTO Permissions (Name) VALUES
	("admin"),
	("contributor");

INSERT INTO Contributors (FirstName, LastName, Email, Password_Digest, Permission) VALUES
	("Bertie", "Ancona", "alancona@bbns.org", "root", 1),
	("David", "Markey", "dmarkey@bbns.org", "root", 1),
	("Nick", "Friscia", "nfriscia@bbns.org", "root", 1),
	("Brian", "Siao Tick Chong", "bsiaotickchong@bbns.org", "root", 1),
	("Mike", "Bernstein", "mbernstein@bbns.org", "root", 1);