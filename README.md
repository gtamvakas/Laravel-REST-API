# Laravel Movies REST API

A REST API made as a personal project. 


The supported methods are:

`GET`, `POST`, `PUT/PATCH`, `DELETE`.

(All the data in the database are supplied by users.)
## Usage

The base URL for all the requests is: 

`https://movie-api-laravel.herokuapp.com/api/movies`

**Methods**

  
(Appropriate errors are displays for each method when something is wrong.)
* `GET` : `https://movie-api-laravel.herokuapp.com/api/movies`
 returns all the movies in the database.

  Success status code: `200`.

* `POST`: `https://movie-api-laravel.herokuapp.com/api/movies` stores a new movie in the database.
  
    Requires a body where all parameters are required. 
    
    Example:

    ```json
  {      
        "name": "The Conjuring",
        "year": 2013,
        "director": "James Wan",
        "protagonist":"Patrick Wilson"           
  }  

    ```

    **Parameters**: 
    
    * **name**: string - maximum length: *255*
    * **year**: numeric - minimum value: *1900* | maximum value: *current year + 3*
    * **director**: string - maximum length: *255*
    * **protagonist**: string - maximum length: *255*


  Success status code: `201`.

* `PUT/PATCH`: `https://movie-api-laravel.herokuapp.com/api/movies/{id}` updates an existing movie.

   Requires a body where at least one parameter is required.

  Success status code: `200`.

* `DELETE`: `https://movie-api-laravel.herokuapp.com/api/movies/{id}` deletes an existing movie.

  Success status code: `204`.
## License
[MIT](https://choosealicense.com/licenses/mit/)
