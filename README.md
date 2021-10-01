# FE21-CR12-Philip
Requirements
"Mount Everest" is the name of a travel agency from Vienna. They want a nice looking responsive web page where they can advertise their travel offers. "Mount Everest" travel agency also wants that each offer could be shown independently when the user clicks on it or on a button "Details". Whenever that happens, a google maps map should show a pinpoint indicating the location of the current offer. As well, we consider that, before booking the holidays, the weather in the location is very important to help you decide so, a "Forecast" button should be available showing the weather of each offer.

- Make a CRUD (create/read/update/delete) for the touristic agency offers.
- Create a details file: when you click on any offer it will lead you to a new page that will show more information about the offer that was clicked on.
- On the details page, you need to use google maps API to show the location of the offer (remember that your database should have the columns longitude and latitude).

- Use the weather forecast API available in pre-work. Remember that the key is available there for you. There should be a button in the details page that would trigger an AJAX function that will show the weather for the exact location from the offer. Remember that the longitude and latitude were stored in the DB and already used in the previous task.

*Hint: remember that AJAX will need to communicate to a PHP service (see example shared in full-stack channel AJAXAPI.rar). As in pre-work, this service could use the curl function to fetch the information from the API and return this info back.

 
Bonus points:
- From the database that was built, create an API. This API is supposed to return a JSON with all information from all offers from the agency. There should be a link in the home that would lead you to the API. Please note that JSON is raw data from the database, no formatting is required here.
