# LaravelFilterableSortable
LaravelFilterableSortable is a package that provides a trait for Laravel models that enables easy filtering and sorting of Eloquent queries. The package includes two scopes, namely scopeFilter and scopeSort, that can be used to apply filters and sorting to queries, respectively.

To use this package, you first need to configure your model. In the model, specify an array named <b>$filterable</b>, which contains the available fields to be filtered. Additionally, import the FilterableSortable trait.

For example, let's configure the Product model:
```PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\FilterableSortable;

class Product extends Model
{
    use HasFactory, FilterableSortable;

    protected $filterable = [
        'description',
        'slug',
    ];

    // ...
}
```

Next, in your controller (e.g., ProductController), use the index method to pass the request and sequentially apply filtering and sorting to the Eloquent query.
```PHP
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::filter($request)
            ->sort($request)
            ->paginate($request->per_page ?? 10);

        return response()->json($products);
    }

    // ...
}
```

Finally, pass the filters and sorting criteria as URL query parameters. For example:
```
/products?search=test&column_filter[]=description&column_filter[]=slug&sort_by=description&sort_type=asc
```

Note that this package is licensed under the MIT License. Please see the LICENSE file for details.
