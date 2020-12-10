<tr class="@if($loop->even) bg-gray-200 @endif">
    <td class="border px-4 py-2">Post #{{ $post->id }} </td>
    <td class="border px-4 py-2 w-1/2">
        <p>{{ $post->title }}</p>
        <p class="text-xs">{{ $post->subtitle }}</p>
    </td>
    <td class="border px-4 py-2">
        {{ $post->published_at }}
    </td>
    <td class="border px-4 py-2">
        {{ $post->is_popular_and_published_this_year ? 'Yes' : 'No' }}
    </td>
</tr>