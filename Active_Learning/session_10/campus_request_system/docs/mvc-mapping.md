# MVC Mapping Table

| Item | MVC Layer | Why? |
|---|---|---|
| Request | Model | It represents the core request data of the system |
| RequestRepository | Model | It handles database operations |
| RequestService | Model | It contains business logic for request processing |
| RequestValidator | Model | It checks input rules before data is saved |
| RequestController@index | Controller | It handles the request list flow |
| RequestController@show | Controller | It handles displaying request details |
| RequestController@store | Controller | It handles saving a new request |
| RequestController@updateStatus | Controller | It handles updating the request status |
| requests/index.php | View | It displays the request list |
| requests/show.php | View | It displays request details |
| requests/create.php | View | It displays the request submission form |