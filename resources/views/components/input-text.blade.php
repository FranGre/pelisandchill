<input type="text" {{ $attributes->merge([
    'class' =>
        'rounded px-3 py-2 focus:border-blue-500
        bg-gray-200 hover:bg-gray-100
        dark:bg-zinc-700 dark:hover:bg-zinc-600' . $class,
]) }}>
