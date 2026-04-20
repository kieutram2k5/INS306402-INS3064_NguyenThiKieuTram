# SRP Class Responsibility Table

| Class Name | Responsibility | Reason to Change |
|---|---|---|
| Request | Stores request data such as id, title, description, location, category, and status | The structure of request data changes |
| RequestRepository | Reads and writes request data from the database | The data storage method changes |
| RequestService | Applies business rules such as allowed status changes | The business rules change |
| RequestValidator | Validates input fields before data is saved | The validation rules change |
| RequestController | Receives user actions and coordinates model/service/view | The routes or request-handling flow changes |
| ViewRenderer | Loads view templates and passes data to them | The rendering method changes |