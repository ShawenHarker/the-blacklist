@props(['page'])

<table class="table-footer">
    <tr>
        <th>
            {{ $page->links() }}
        </th>
    </tr>
</table>