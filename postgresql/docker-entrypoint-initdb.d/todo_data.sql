CREATE USER crud WITH PASSWORD 'P@ssword1234';
CREATE DATABASE todo_data OWNER crud;
\c todo_data crud
CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP(0) DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE todo (
    id SERIAL PRIMARY KEY,
    user_id SERIAL REFERENCES users(user_id),
    title TEXT,
    date_time TIMESTAMP(0) DEFAULT CURRENT_TIMESTAMP,
    checked BOOLEAN DEFAULT FALSE
);
