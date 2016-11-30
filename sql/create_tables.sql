-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE Categories (
  id SERIAL PRIMARY KEY,
  name varchar(100) NOT NULL
);

CREATE TABLE Types (
  id SERIAL PRIMARY KEY,
  name varchar(100) NOT NULL,
  color varchar(100) NOT NULL
);

CREATE TABLE Employer (
  id SERIAL PRIMARY KEY,
  company_name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  username varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  company_description text NOT NULL,
  created DATE
);

CREATE TABLE Employee (
  id SERIAL PRIMARY KEY,
  first_name varchar(100) NOT NULL,
  last_name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  username varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  description text NOT NULL,
  created DATE
);

CREATE TABLE Jobs (
  id SERIAL PRIMARY KEY,
  category_id INTEGER REFERENCES Categories(Categories.id),
  employer_id INTEGER REFERENCES Employer(Employer.id) ON UPDATE CASCADE ON DELETE CASCADE,
  type_id INTEGER REFERENCES Types(Types.id),
  job_name varchar(100) NOT NULL,
  description text NOT NULL,
  area varchar(100) NOT NULL,
  created DATE
);

CREATE TABLE Employee_Jobs_Apply (
id SERIAL PRIMARY KEY,
job_id INTEGER REFERENCES Jobs(id) ON UPDATE CASCADE ON DELETE CASCADE,
employee_id INTEGER REFERENCES Employee(id) ON UPDATE CASCADE ON DELETE CASCADE
);
