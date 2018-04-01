# DheenoMovie

## What is it about?
### This is a website to let users to browse movies and the movies are managed by ```management```

## User vs Management
+ User browse the movies and view the details of the movie.
+ Management performs CRUD operations on the movies

## What are the technologies
+ Php
+ MySql
+ HTML, CSS, JS
+ Model, Controller & View (MVC)

## MVC? Really?
<p>
Yes. This application uses MVC model, which is coded manually without refering to any available framework such as laravel. 
In this project all components are self coded without using external libraries.
</p>

## So how's the flow of the app?
```index.php``` -> Manages the import of all libraries <br>
```Bootstrap``` -> Manages the routing of the application <br>
```Controller_name.php``` -> Inherith base class and handles model call and view rendering <br>
```Model_name.php``` -> Executes the MySql query and passes the result to the calling controller  <br>
```View_name.php``` -> Renders the view, including displaying the data that is being passed by the controller <br>

### In general,Bootstrap calls the controller, controller calls the model and passes the data to view.

## MySQL db details
Movie Table <br>
```id``` -> Movie Id <br>
```title``` -> Movie Title <br>
```genreId``` -> Foreign Key Reference from Genre Table <br>
```synopsis``` -> Synopsis of the movie <br>

Genre Table <br>
```id``` -> Genre Id <br>
```name``` -> Genre Name <br>

Management Table <br>
```username``` -> Username<br>
```password``` -> password for user<br>
