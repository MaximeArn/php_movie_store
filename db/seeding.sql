CREATE DATABASE IF NOT EXISTS movie_store;
USE movie_store;

DROP TABLE IF EXISTS movie_actors;
DROP TABLE IF EXISTS cart_items;
DROP TABLE IF EXISTS carts;
DROP TABLE IF EXISTS purchase_history;
DROP TABLE IF EXISTS movies;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS actors;
DROP TABLE IF EXISTS users;

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

CREATE TABLE categories (
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
    category_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
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

INSERT INTO categories (name) VALUES
('Action'),
('Drama'),
('Comedy'),
('Horror');

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

INSERT INTO movies (title, description, price, image_url, director, category_id) VALUES
('Inception', 'A mind-bending thriller about dream manipulation.', 9.99, 'https://placehold.co/600x400', 'Christopher Nolan', 1),
('The Wolf of Wall Street', 'The story of a Wall Street tycoon.', 12.99, 'https://placehold.co/600x400', 'Martin Scorsese', 2),
('Jurassic Park', 'Dinosaurs brought back to life.', 14.99, 'https://placehold.co/600x400', 'Steven Spielberg', 1),
('Pulp Fiction', 'An intertwining tale of crime and redemption.', 10.99, 'https://placehold.co/600x400', 'Quentin Tarantino', 2),
('The Dark Knight', 'Batman faces the Joker in Gotham City.', 11.99, 'https://placehold.co/600x400', 'Christopher Nolan', 1),
('Interstellar', 'A team of explorers travel through a wormhole in space.', 13.99, 'interstellar.jpg', 'Christopher Nolan', 2),
('Avengers: Endgame', 'The Avengers assemble to defeat Thanos.', 15.99, 'https://placehold.co/600x400', 'Anthony and Joe Russo', 1),
('Black Widow', 'Natasha Romanoff confronts her past.', 8.99, 'https://placehold.co/600x400', 'Cate Shortland', 1),
('Iron Man', 'The story of Tony Stark and his suit of armor.', 9.49, 'https://placehold.co/600x400', 'Jon Favreau', 1),
('Thor: Ragnarok', 'Thor must escape the planet Sakaar.', 10.49, 'https://placehold.co/600x400', 'Taika Waititi', 3),
('Forrest Gump', 'A man with a low IQ achieves great things in life.', 7.99, 'https://placehold.co/600x400', 'Robert Zemeckis', 2),
('The Matrix', 'A hacker discovers the truth about his reality.', 12.49, 'https://placehold.co/600x400', 'The Wachowskis', 1),
('The Godfather', 'The story of the powerful Corleone family.', 14.49, 'https://placehold.co/600x400', 'Francis Ford Coppola', 2),
('The Shawshank Redemption', 'Two imprisoned men bond over years.', 10.99, 'https://placehold.co/600x400', 'Frank Darabont', 2),
('Gladiator', 'A betrayed Roman general seeks vengeance.', 12.99, 'https://placehold.co/600x400', 'Ridley Scott', 1),
('Titanic', 'A love story aboard the ill-fated Titanic.', 11.49, 'https://placehold.co/600x400', 'James Cameron', 2),
('The Avengers', 'Earth\'s mightiest heroes team up.', 13.49, 'https://placehold.co/600x400', 'Joss Whedon', 1),
('Doctor Strange', 'A surgeon becomes the Sorcerer Supreme.', 9.99, 'https://placehold.co/600x400', 'Scott Derrickson', 1),
('The Lion King', 'A young lion prince flees his kingdom.', 8.99, 'https://placehold.co/600x400', 'Jon Favreau', 2),
('Frozen', 'An ice queen must learn to control her powers.', 8.49, 'https://placehold.co/600x400', 'Chris Buck & Jennifer Lee', 2),
('Finding Nemo', 'A clownfish searches for his son.', 7.99, 'https://placehold.co/600x400', 'Andrew Stanton', 2),
('Shrek', 'An ogre rescues a princess.', 9.99, 'https://placehold.co/600x400', 'Andrew Adamson', 3),
('Toy Story', 'Toys come to life in this animated classic.', 8.49, 'https://placehold.co/600x400', 'John Lasseter', 3),
('Mad Max: Fury Road', 'Post-apocalyptic action-packed adventure.', 10.99, 'https://placehold.co/600x400', 'George Miller', 1),
('The Social Network', 'The story of Facebook\'s creation.', 9.99, 'https://placehold.co/600x400', 'David Fincher', 2),
('The Big Short', 'A group of investors predict the financial crisis.', 8.99, 'https://placehold.co/600x400', 'Adam McKay', 2),
('Get Out', 'A suspenseful thriller with social commentary.', 9.99, 'https://placehold.co/600x400', 'Jordan Peele', 4),
('It', 'A group of kids faces a terrifying clown.', 10.49, 'https://placehold.co/600x400', 'Andy Muschietti', 4),
('A Quiet Place', 'A family survives in silence to avoid creatures.', 9.49, 'https://placehold.co/600x400', 'John Krasinski', 4),
('Parasite', 'A gripping tale of class divide and survival.', 10.99, 'https://placehold.co/600x400', 'Bong Joon-ho', 2),
('Whiplash', 'A young drummer faces an intense music teacher.', 8.99, 'https://placehold.co/600x400', 'Damien Chazelle', 2);
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
(19, 8),
(20, 9),
(21, 10),
(22, 3),
(23, 6),
(24, 7),
(25, 8),
(26, 9),
(27, 4),
(28, 2),
(29, 1),
(30, 5);
