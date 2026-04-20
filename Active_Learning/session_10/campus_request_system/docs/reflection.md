# Reflection

## 1. Which parts of your design are Model, View, and Controller?
In my design, the Model includes Request, RequestRepository, RequestService, and RequestValidator because these classes handle data, business logic, and validation. The View includes the files inside the requests folder because they display information to the user. The Controller is RequestController because it receives user actions and coordinates the flow between model and view.

## 2. Where should validation happen, and why?
Validation should happen before data is saved into the database, preferably in a separate validator class or in the service layer. This is important because invalid input should be stopped early. Separating validation also makes the code easier to maintain and reuse.

## 3. What would break if you put SQL inside a View file?
If SQL is placed inside a View file, the system would become difficult to maintain because presentation and database logic would be mixed together. It would violate MVC and SRP principles. It would also make debugging, testing, and changing the user interface much harder.

## 4. What code do you expect to write next week to make this real?
Next week, I expect to write the actual database queries inside the repository, create a router to connect URLs to controller actions, add HTML forms for input, and connect everything together so users can submit and manage requests in a real web application.