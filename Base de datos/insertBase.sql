INSERT INTO usuarios (nickname,password,email,nombre,apellidos) VALUES ("admin","$2y$10$/Uek6FjoVUSylwNMY/bwvOheMtdZEJIu.R.eNnzn4YR7FQVOZaDZa","admin@gmail.com","admin","administrador");
INSERT INTO usuarios (nickname,password,email,nombre,apellidos) VALUES ("alex","$2y$10$orv6UXGOJGbP/.CbRsEOb.F3pTaz4TwG/.UN8KquLOYDS45BnpOsO","alex@gmail.com","psalexps","luis");

INSERT INTO temas (titulo,texto,fecha,id_usuario) VALUES ("What is AJAX?",
"AJAX = Asynchronous JavaScript and XML.
AJAX is a technique for creating fast and dynamic web pages.
AJAX allows web pages to be updated asynchronously by exchanging small amounts of data with the server behind the scenes. This means that it is possible to update parts of a web page, without reloading the whole page.
Classic web pages, (which do not use AJAX) must reload the entire page if the content should change.
Examples of applications using AJAX: Google Maps, Gmail, Youtube, and Facebook tabs.",
"2018-10-10",
1);

INSERT INTO respuestas (texto,fecha,id_usuario,id_tema) VALUES ("AJAX is Based on Internet Standards
AJAX is based on internet standards, and uses a combination of:
XMLHttpRequest object (to exchange data asynchronously with a server)
JavaScript/DOM (to display/interact with the information)
CSS (to style the data)
XML (often used as the format for transferring data)",
"2018-10-10",
2,
1);

INSERT INTO respuestas (texto,fecha,id_usuario,id_tema) VALUES ("The onreadystatechange Property
The readyState property holds the status of the XMLHttpRequest.
The onreadystatechange property defines a function to be executed when the readyState changes.
The status property and the statusText property holds the status of the XMLHttpRequest object.",
"2018-10-10",
2,
1);

INSERT INTO respuestas (texto,fecha,id_usuario,id_tema) VALUES ("1. An event occurs in a web page (the page is loaded, a button is clicked).
2. An XMLHttpRequest object is created by JavaScript.
3. The XMLHttpRequest object sends a request to a web server.
4. The server processes the request.
5. The server sends a response back to the web page.
6. The response is read by JavaScript.
7. Proper action (like page update) is performed by JavaScript.",
"2018-10-10",
2,
1);

INSERT INTO valoraciones (id_usuario,id_tema,id_respuesta) VALUES (1,
1,
null);

INSERT INTO valoraciones (id_usuario,id_respuesta) VALUES (2,
1);

INSERT INTO temas (titulo,texto,fecha,id_usuario) VALUES ("What is HTML?",
"HTML is the standard markup language for creating Web pages.
HTML stands for Hyper Text Markup Language
HTML describes the structure of Web pages using markup
HTML elements are the building blocks of HTML pages
HTML elements are represented by tags
HTML tags label pieces of content such as 'heading', 'paragraph', 'table', and so on
Browsers do not display the HTML tags, but use them to render the content of the page",
"2018-10-10",
1);

INSERT INTO respuestas (texto,fecha,id_usuario,id_tema) VALUES ("Example Explained :
The '<'!DOCTYPE html'>' declaration defines this document to be HTML5.
The '<'html'>' element is the root element of an HTML page.
The '<'head'>' element contains meta information about the document.
The '<'title'>' element specifies a title for the document.
The '<'body'>' element contains the visible page content.
The '<'h1'>' element defines a large heading.
The '<'p'>' element defines a paragraph.",
"2018-10-10",
2,
2);

INSERT INTO temas (titulo,texto,fecha,id_usuario) VALUES ("What is CSS?",
"CSS is a language that describes the style of an HTML document.
CSS describes how HTML elements should be displayed.
This tutorial will teach you CSS from basic to advanced.",
"2018-10-10",
1);

INSERT INTO respuestas (texto,fecha,id_usuario,id_tema) VALUES ("CSS stands for Cascading Style Sheets.
CSS describes how HTML elements are to be displayed on screen, paper, or in other media.
CSS saves a lot of work. It can control the layout of multiple web pages all at once.
External stylesheets are stored in CSS files.",
"2018-10-10",
2,
3);

INSERT INTO temas (titulo,texto,fecha,id_usuario) VALUES ("What is JavaScript?",
"JavaScript is the programming language of HTML and the Web.
JavaScript is easy to learn.
This tutorial will teach you JavaScript from basic to advanced.",
"2018-10-10",
1);

INSERT INTO respuestas (texto,fecha,id_usuario,id_tema) VALUES ("JavaScript Can Change HTML Content
One of many JavaScript HTML methods is getElementById().
This example uses the method to 'find' an HTML element (with id='demo') and changes the element content (innerHTML) to 'Hello JavaScript'",
"2018-10-10",
2,
4);

INSERT INTO temas (titulo,texto,fecha,id_usuario) VALUES ("What is SQL?",
"SQL is a standard language for storing, manipulating and retrieving data in databases.
Our SQL tutorial will teach you how to use SQL in: 
MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.",
"2018-10-10",
1);

INSERT INTO respuestas (texto,fecha,id_usuario,id_tema) VALUES ("What Can SQL do? :
SQL can execute queries against a database.
SQL can retrieve data from a database.
SQL can insert records in a database.
SQL can update records in a database.
SQL can delete records from a database.
SQL can create new databases.
SQL can create new tables in a database.
SQL can create stored procedures in a database.
SQL can create views in a database.
SQL can set permissions on tables, procedures, and views.",
"2018-10-10",
2,
5);

INSERT INTO temas (titulo,texto,fecha,id_usuario) VALUES ("What is Bootstrap?",
"Bootstrap is the most popular HTML, CSS, and JavaScript framework for developing responsive, mobile-first websites.
Bootstrap is completely free to download and use!",
"2018-10-10",
1);

INSERT INTO respuestas (texto,fecha,id_usuario,id_tema) VALUES ("What is Bootstrap? :
Bootstrap is a free front-end framework for faster and easier web development
Bootstrap includes HTML and CSS based design templates for typography, forms,
buttons, tables, navigation, modals, image carousels and many other, as well as optional JavaScript plugins
Bootstrap also gives you the ability to easily create responsive designs",
"2018-10-10",
2,
6);

INSERT INTO temas (titulo,texto,fecha,id_usuario) VALUES ("What is jQuery?",
"jQuery is a JavaScript Library.
jQuery greatly simplifies JavaScript programming.
jQuery is easy to learn.",
"2018-10-10",
1);

INSERT INTO respuestas (texto,fecha,id_usuario,id_tema) VALUES ("What is jQuery? :
jQuery is a lightweight, 'write less, do more', JavaScript library.
The purpose of jQuery is to make it much easier to use JavaScript on your website.
jQuery takes a lot of common tasks that require many lines of JavaScript code to accomplish, and wraps them into methods that you can call with a single line of code.
jQuery also simplifies a lot of the complicated things from JavaScript, like AJAX calls and DOM manipulation.
The jQuery library contains the following features:
HTML/DOM manipulation.
CSS manipulation.
HTML event methods.
Effects and animations.
AJAX.
Utilities.",
"2018-10-10",
2,
7);