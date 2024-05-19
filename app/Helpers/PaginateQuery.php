<?php

if (!function_exists('paginate_query')) {
    function paginate_query($query)
    {
        return $query->orderBy(request('sort_field') ?? 'id', request('sort_direction') ?? 'desc')
            ->paginate(request('per_page') ?? 10);
    }
}
