<div class="scroll_categories">
    <div class="scroll_categories--tag"><i class="bi bi-mouse-fill"></i> {{ $tag_title }}</div>
    <ul class="scroll_categories--list">
        <li>
            <a href="{{ $todas_link  }}" class="active">Todas</a>
        </li>
        @foreach($categories AS $category)
            <li>
                <a href="{{ $category[1]  }}">{{ $category[0] }}</a>
            </li>
        @endforeach
    </ul>
</div>