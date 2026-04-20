# Route Table

| HTTP | URL | Controller@Action | Purpose |
|---|---|---|---|
| GET | /requests | RequestController@index | Display the list of requests |
| GET | /requests/create | RequestController@create | Display the create request form |
| POST | /requests | RequestController@store | Save a new request |
| GET | /requests/{id} | RequestController@show | Display request details |
| POST | /requests/{id}/status | RequestController@updateStatus | Update request status |
| GET | /staff/requests | RequestController@staffIndex | Display all requests for staff |