<div class="pani">
    <ul class="pagination pull-right">
        <li>
            {!! $list->appends(Request::only('keyword'))->links() !!}
        </li>
    </ul>
</div>
