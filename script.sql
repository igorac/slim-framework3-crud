CREATE TABLE posts
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    description TEXT
);

INSERT INTO posts (title, description)
VALUES ('Post 1', 'Description 1');

INSERT INTO posts (title, description)
VALUES ('Post 2', 'Description 2');


CREATE TABLE users
(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL
);

INSERT INTO users (name, email, phone)
VALUES ('Igor', 'igorac1999@teste.com', '71 999999999');

INSERT INTO users (name, email, phone)
VALUES ('José', 'jose@teste.com', '71 999999999');
