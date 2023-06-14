<?php

namespace App\Traits\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait FilterableSortable
{
    /**
     * Applies the specified filters from the request to the query.
     * 
     * @param Builder $query The query to filter
     * @param Request $request The HTTP request containing the filters
     * @return Builder The filtered query
     */
    public function scopeFilter(Builder $query, Request $request): Builder
    {
        // Check if the 'search' parameter is present in the request
        if ($request->has('search')) {
            // Apply the WHERE clause with a set of ORs
            $query->where(function ($query) use ($request) {
                // Iterate over each 'filterable' column of the model
                foreach ($this->filterable as $columnFilterable) {
                    // Check if the current column was selected for filtering
                    if ($request->has('column_filter')) {
                        if (in_array($columnFilterable, $request->column_filter)) {
                            // Add an OR clause to filter by this column
                            $query->orWhere($columnFilterable, 'ilike', "%{$request->search}%");
                        }
                    }
                }
            });
        }

        // Return the filtered query
        return $query;
    }

    /**
     * Applies the specified sorting from the request to the query.
     * 
     * @param Builder $query The query to sort
     * @param Request $request The HTTP request containing the sorting
     * @return Builder The sorted query
     */
    public function scopeSort(Builder $query, Request $request): Builder
    {
        // Iterate over each 'filterable' column of the model
        foreach ($this->filterable as $columnFilterable) {
            // Check if the 'sort_by' parameter is present in the request
            if ($request->has('sort_by')) {
                if ($columnFilterable == $request->sort_by) {
                    // Apply the ORDER BY clause to the query
                    $query->orderBy($request->sort_by, $request->sort_type ?? 'asc');
                }
            }
        }

        // Return the sorted query
        return $query;
    }
}
