-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Categories (id, name) VALUES
('Front-end devaaja'),
('Back-end devaaja'),
('UI designeri'),
('Fullstack guru'),
('Pelin rakentaja'),
('iOS / Android / Mobile osaaja'),
('Wordpress / Magento / Joomla / Ecommerce häkkääjä');

INSERT INTO Jobs (category_id, employer_id, type_id, job_name, description, area, created) VALUES
(1, 1, 1, 'Html ja Css taituri', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet. Etiam eget magna et nunc ultrices suscipit. Duis a ligula vel nisi auctor laoreet. Morbi varius suscipit purus, sed pretium nisl sagittis id. Aliquam vel nulla tempor, luctus quam nec, egestas sem. Nulla nulla ante, faucibus fringilla blandit non, porttitor at eros.</p>', 'Espoo', '2016-11-13 00:00:00'),
((3, 1, 2, 'Graafikko', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet. Etiam eget magna et nunc ultrices suscipit. Duis a ligula vel nisi auctor laoreet. Morbi varius suscipit purus, sed pretium nisl sagittis id. Aliquam vel nulla tempor, luctus quam nec, egestas sem. Nulla nulla ante, faucibus fringilla blandit non, porttitor at eros.</p>', 'Helsinki', '2016-11-13 00:00:00'),
(7, 1, 3, 'Wordpress ja Woocommerce guru', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet. Etiam eget magna et nunc ultrices suscipit. Duis a ligula vel nisi auctor laoreet. Morbi varius suscipit purus, sed pretium nisl sagittis id. Aliquam vel nulla tempor, luctus quam nec, egestas sem. Nulla nulla ante, faucibus fringilla blandit non, porttitor at eros.</p>', 'Oulu', '2016-11-13 00:00:00');

INSERT INTO Types (name, color) VALUES
('Täys päivä', '#4c9ef1'),
('Osa aika', '#81b800'),
('Freelance', '#f4f4f4');

INSERT INTO Employer (company_name, email, username, password, company_description, created) VALUES
('HTML ja CSS osaajat Oy', 'hae@htmljacssosaajat.com', 'osaajat', 'osaajat', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet. Etiam eget magna et nunc ultrices suscipit. Duis a ligula vel nisi auctor laoreet. Morbi varius suscipit purus, sed pretium nisl sagittis id. Aliquam vel nulla tempor, luctus quam nec, egestas sem. Nulla nulla ante, faucibus fringilla blandit non, porttitor at eros.</p>', '2016-11-10 18:00:10'),
('HelppojaSovelluksia Ky', 'yt@easysofties.com', 'easysofties', 'easysofties', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet. Etiam eget magna et nunc ultrices suscipit. Duis a ligula vel nisi auctor laoreet. Morbi varius suscipit purus, sed pretium nisl sagittis id. Aliquam vel nulla tempor, luctus quam nec, egestas sem. Nulla nulla ante, faucibus fringilla blandit non, porttitor at eros.</p>', '2016-11-10 19:00:10'),
('Java ja C Ay', 'lol@lol.com', 'javajac', 'javajac', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet. Etiam eget magna et nunc ultrices suscipit. Duis a ligula vel nisi auctor laoreet. Morbi varius suscipit purus, sed pretium nisl sagittis id. Aliquam vel nulla tempor, luctus quam nec, egestas sem. Nulla nulla ante, faucibus fringilla blandit non, porttitor at eros.</p>', '2016-11-10 21:11:10');

INSERT INTO Employee (first_name, last_name, email, username, password, description, created) VALUES
('Mikko', 'Mallikas', 'mikko@mallikas.com', 'mikkomallikas', 'mikkomallikas', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet.', '2016-11-14 09:42:08'),
('Pekka', 'Porilas', 'pekka@mporilas.com', 'pekkaporilas', 'pekkaporilas', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet.', '2016-11-14 09:42:08'),
('Saara', 'Sieppas', 'saarasieppas@moimoi.com', 'saarasieppas', 'saarasieppas', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet.', '2016-11-14 09:42:08'),
('Laura', 'Loisti', 'laurakas@mloistikas.com', 'lauraloisti', 'lauraloisti', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet.', '2016-11-14 09:42:08');
