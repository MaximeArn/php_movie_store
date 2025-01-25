CREATE DATABASE IF NOT EXISTS movie_store;
USE movie_store;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE actors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
    director VARCHAR(100) NOT NULL,
    category ENUM('Action', 'Drama', 'Comedy', 'Horror') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE movie_actors (
    movie_id INT NOT NULL,
    actor_id INT NOT NULL,
    PRIMARY KEY (movie_id, actor_id),
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE,
    FOREIGN KEY (actor_id) REFERENCES actors(id) ON DELETE CASCADE
);


CREATE TABLE carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT NOT NULL,
    movie_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    FOREIGN KEY (cart_id) REFERENCES carts(id) ON DELETE CASCADE,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
);

CREATE TABLE purchase_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    movie_id INT NOT NULL,
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (movie_id) REFERENCES movies(id)
);

INSERT INTO actors (name) VALUES
('Leonardo DiCaprio'),
('Brad Pitt'),
('Tom Hanks'),
('Meryl Streep'),
('Scarlett Johansson'),
('Robert Downey Jr.'),
('Chris Hemsworth'),
('Natalie Portman'),
('Morgan Freeman'),
('Anne Hathaway');

INSERT INTO movies (title, description, price, image_url, director, category) VALUES
('Inception', 'A mind-bending thriller about dream manipulation.', 9.99, 'inception.jpg', 'Christopher Nolan', 'Action'),
('The Wolf of Wall Street', 'The story of a Wall Street tycoon.', 12.99, 'wolf_of_wall_street.jpg', 'Martin Scorsese', 'Drama'),
('Jurassic Park', 'Dinosaurs brought back to life.', 14.99, 'jurassic_park.jpg', 'Steven Spielberg', 'Action'),
('Pulp Fiction', 'An intertwining tale of crime and redemption.', 10.99, 'pulp_fiction.jpg', 'Quentin Tarantino', 'Drama'),
('The Dark Knight', 'Batman faces the Joker in Gotham City.', 11.99, 'dark_knight.jpg', 'Christopher Nolan', 'Action'),
('Interstellar', 'A team of explorers travel through a wormhole in space.', 13.99, 'interstellar.jpg', 'Christopher Nolan', 'Drama'),
('Avengers: Endgame', 'The Avengers assemble to defeat Thanos.', 15.99, 'endgame.jpg', 'Anthony and Joe Russo', 'Action'),
('Black Widow', 'Natasha Romanoff confronts her past.', 8.99, 'black_widow.jpg', 'Cate Shortland', 'Action'),
('Iron Man', 'The story of Tony Stark and his suit of armor.', 9.49, 'iron_man.jpg', 'Jon Favreau', 'Action'),
('Thor: Ragnarok', 'Thor must escape the planet Sakaar.', 10.49, 'thor_ragnarok.jpg', 'Taika Waititi', 'Comedy'),
('Forrest Gump', 'A man with a low IQ achieves great things in life.', 7.99, 'forrest_gump.jpg', 'Robert Zemeckis', 'Drama'),
('The Matrix', 'A hacker discovers the truth about his reality.', 12.49, 'matrix.jpg', 'The Wachowskis', 'Action'),
('The Godfather', 'The story of the powerful Corleone family.', 14.49, 'godfather.jpg', 'Francis Ford Coppola', 'Drama'),
('The Shawshank Redemption', 'Two imprisoned men bond over years.', 10.99, 'shawshank.jpg', 'Frank Darabont', 'Drama'),
('Gladiator', 'A betrayed Roman general seeks vengeance.', 12.99, 'gladiator.jpg', 'Ridley Scott', 'Action'),
('Titanic', 'A love story aboard the ill-fated Titanic.', 11.49, 'titanic.jpg', 'James Cameron', 'Drama'),
('The Avengers', 'Earth\'s mightiest heroes team up.', 13.49, 'avengers.jpg', 'Joss Whedon', 'Action'),
('Doctor Strange', 'A surgeon becomes the Sorcerer Supreme.', 9.99, 'doctor_strange.jpg', 'Scott Derrickson', 'Action'),
('The Lion King', 'A young lion prince flees his kingdom.', 8.99, 'lion_king.jpg', 'Jon Favreau', 'Drama');

INSERT INTO movie_actors (movie_id, actor_id) VALUES
(1, 1),
(2, 1),
(3, 3),
(4, 2),
(4, 1),
(5, 1),
(6, 1),
(7, 2),
(8, 5),
(9, 6),
(10, 7),
(11, 3),
(12, 1),
(13, 4),
(14, 5),
(15, 3),
(16, 2),
(17, 1),
(18, 6),
(19, 8);
