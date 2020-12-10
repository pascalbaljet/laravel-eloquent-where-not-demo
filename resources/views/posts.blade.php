<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Demo</title>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:pt-0">
            <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8 sm:py-6 lg:py-8">
                <table class="table-auto w-full mb-6">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Year</th>
                            <th>Title</th>
                            <th>Votes</th>
                            <th>Comments</th>
                            <th>By Admin</th>
                            <th>On Front Page</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($posts as $post)
                            <tr class="@if($loop->even) bg-gray-200 @endif">
                                <td class="border px-4 py-2">Post #{{ $post->id }}</td>
                                <td class="border px-4 py-2">
                                    {{ optional($post->published_at)->format('Y') ?: '-' }}
                                </td>
                                <td class="border px-4 py-2 w-1/2">{{ $post->title }}</td>
                                <td class="border px-4 py-2">{{ $post->votes }}</td>
                                <td class="border px-4 py-2">{{ $post->comments_count }}</td>
                                <td class="border px-4 py-2">{{ $post->user->is_admin ? 'Yes' : 'No' }}</td>
                                <td class="border px-4 py-2">{{ $post->on_front_page ? 'Yes' : 'No' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $posts->withQueryString()->links() !!}
            </div>
        </div>
    </body>
</html>