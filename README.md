# LaravelFilterableSortable
Laravel Filterable Sortable
This package provides a trait that can be used in Laravel models to easily apply filters and sorts to Eloquent queries. The trait provides two scopes: scopeFilter and scopeSort, which can be used to apply filters and sorting, respectively.


Pass the filters and sorting criteria in the URL query parameters:
bash

´´´
Copy code
/products?search=test&column_filter[]=description&column_filter[]=slug&sort_by=description&sort_type=asc
Contributing
´´´

Contributions are welcome! To submit a pull request, please follow these guidelines:

Fork the repository
Create a new branch for your feature or bug fix
Write tests for your changes (if applicable)
Make your changes and ensure that all tests pass
Submit a pull request
License
This package is licensed under the MIT License. See the LICENSE file for details.
