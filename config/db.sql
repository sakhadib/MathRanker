CREATE TABLE Contest (
  contestID INT,
  Date DATE,
  Time TIME,
  Rating INT,
  PRIMARY KEY (contestID)
);

CREATE TABLE user (
  username VARCHAR(50),
  email VARCHAR(255),
  password VARCHAR(255),
  FirstName VARCHAR(100),
  LastName VARCHAR(100),
  Institution VARCHAR(255),
  city VARCHAR(100),
  Country VARCHAR(100),
  Rating INT,
  role VARCHAR(50),
  PRIMARY KEY (username)
);

CREATE TABLE problem (
  problemID INT,
  problemlettter VARCHAR(2),
  Statement TEXT,
  Answer DECIMAL(22, 10),
  ContestID INT,
  status VARCHAR(50),
  PRIMARY KEY (problemID),
  FOREIGN KEY (ContestID) REFERENCES Contest(contestID)
);

CREATE TABLE AllTag (
  TagID INT,
  name VARCHAR(255),
  Description TEXT,
  PRIMARY KEY (TagID)
);

CREATE TABLE Post (
  PostID INT,
  Date DATE,
  Time TIME,
  Content TEXT,
  username VARCHAR(50),
  PRIMARY KEY (PostID),
  FOREIGN KEY (username) REFERENCES user(username)
);

CREATE TABLE Attempt (
  username VARCHAR(50),
  Date DATE,
  Time TIME,
  verdict VARCHAR(50),
  AID INT,
  problemID INT,
  PRIMARY KEY (AID),
  FOREIGN KEY (problemID) REFERENCES problem(problemID),
  FOREIGN KEY (username) REFERENCES user(username)
);

CREATE TABLE penalty (
  AID INT,
  amount INT,
  ProblemID INT,
  contestID INT,
  username VARCHAR(50),
  PRIMARY KEY (ProblemID, contestID, username),
  FOREIGN KEY (AID) REFERENCES Attempt(AID),
  FOREIGN KEY (username) REFERENCES user(username),
  FOREIGN KEY (contestID) REFERENCES Contest(contestID),
  FOREIGN KEY (ProblemID) REFERENCES problem(problemID)
);

CREATE TABLE XPlog (
  AID INT,
  id INT,
  username VARCHAR(50),
  problemID INT,
  GainedXP DECIMAL(22, 10),
  PRIMARY KEY (id),
  FOREIGN KEY (AID) REFERENCES Attempt(AID),
  FOREIGN KEY (username) REFERENCES user(username),
  FOREIGN KEY (problemID) REFERENCES problem(problemID)
);

CREATE TABLE vote (
  voteID INT,
  username VARCHAR(50),
  postID INT,
  up BOOLEAN,
  PRIMARY KEY (voteID),
  FOREIGN KEY (username) REFERENCES user(username),
  FOREIGN KEY (postID) REFERENCES Post(PostID)
);

CREATE TABLE comment (
  commentID INT,
  username VARCHAR(50),
  postID INT,
  content TEXT,
  TimeStamp TIMESTAMP,
  PRIMARY KEY (commentID),
  FOREIGN KEY (postID) REFERENCES Post(PostID),
  FOREIGN KEY (username) REFERENCES user(username)
);

CREATE TABLE ProblemTag (
  TagID INT,
  ProblemID INT,
  PRIMARY KEY (TagID, ProblemID),
  FOREIGN KEY (TagID) REFERENCES AllTag(TagID),
  FOREIGN KEY (ProblemID) REFERENCES problem(problemID)
);

CREATE TABLE Registers (
  contestID INT,
  userName VARCHAR(50),
  Time TIME,
  Rating INT,
  PRIMARY KEY (contestID, userName),
  FOREIGN KEY (userName) REFERENCES user(username),
  FOREIGN KEY (contestID) REFERENCES Contest(contestID)
);

CREATE TABLE Sets (
  problemID INT,
  userName VARCHAR(50),
  contestID INT,
  PRIMARY KEY (problemID, userName, contestID),
  FOREIGN KEY (contestID) REFERENCES Contest(contestID),
  FOREIGN KEY (problemID) REFERENCES problem(problemID),
  FOREIGN KEY (userName) REFERENCES user(username)
);
