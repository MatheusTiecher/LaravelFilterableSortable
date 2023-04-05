# LaravelFilterableSortable
Laravel Filterable Sortable
This package provides a trait that can be used in Laravel models to easily apply filters and sorts to Eloquent queries. The trait provides two scopes: scopeFilter and scopeSort, which can be used to apply filters and sorting, respectively.

To apply, let's start by configuring the Product model. In the model with the <b>filterable</b> array with the available fields. Remembering to import the
trait <b>FilterableSortable</b>.

```
  protected $filterable = [
    'description',
    'slug',
  ];
```

How to use in controller ProductController In the index method. Passing the request to the sequential paraments in eloquent, <b>filter</b> and <b>sort</b>.
```
  public function index(Request $request)
  {
    $products = Product::filter($request)
                  ->sort($request)
                  ->paginate($request->per_page ?? 10);

    return response()->json($products);
  }
```


Pass the filters and sorting criteria in the URL query parameters:
```
/products?search=test&column_filter[]=description&column_filter[]=slug&sort_by=description&sort_type=asc
```

This package is licensed under the MIT License. See the LICENSE file for details.
