PRAGMA foreign_keys=ON;

CREATE TABLE Person (
Id INTEGER PRIMARY KEY,
Username VARCHAR UNIQUE NOT NULL,
Hash VARCHAR NOT NULL,
Email VARCHAR NOT NULL,
FirstName VARCHAR NOT NULL,
LastName VARCHAR NOT NULL,
Type VARCHAR NOT NULL,
Bio VARCHAR,
Photo INTEGER REFERENCES Image ON DELETE CASCADE
);

CREATE TABLE Comment (
Id INTEGER PRIMARY KEY,
Commenter INTEGER REFERENCES Person ON DELETE CASCADE NOT NULL,
Parent INTEGER REFERENCES Comment,
Text VARCHAR NOT NULL,
Timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Restaurant (
Id INTEGER PRIMARY KEY,
Owner REFERENCES Person ON DELETE CASCADE NOT NULL,
Name VARCHAR NOT NULL,
Description VARCHAR NOT NULL,
Website VARCHAR NOT NULL,
Photo INTEGER REFERENCES Image ON DELETE CASCADE,
Address TEXT NOT NULL,
Latitude REAL NOT NULL,
Longitude REAL NOT NULL
);

CREATE TABLE Review (
Id INTEGER PRIMARY KEY,
Restaurant INTEGER REFERENCES Restaurant ON DELETE CASCADE NOT NULL,
Comment INTEGER REFERENCES Comment NOT NULL,
Score REAL NOT NULL
);

CREATE TABLE Image (
Id INTEGER PRIMARY KEY,
Restaurant INTEGER REFERENCES Restaurant ON DELETE CASCADE,
Extension VARCHAR NOT NULL
);

/* Removes the comment associated with the deleted review */
CREATE TRIGGER RemoveReviewComment
BEFORE DELETE ON Review
FOR EACH ROW
BEGIN
DELETE FROM Comment WHERE Id=OLD.Comment;
END;

/* Creates a virtual search table */
CREATE VIRTUAL TABLE RestaurantSearch USING fts4(Id, Name, Description);

CREATE TRIGGER InsertRestaurantSearch
AFTER INSERT ON Restaurant
FOR EACH ROW
BEGIN
INSERT INTO RestaurantSearch VALUES (NEW.Id, NEW.Name, NEW.Description);
END;
