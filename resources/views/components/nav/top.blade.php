<nav class="menu-list">
    <ul>
        <li>
            <a href="{{ route('index') }}">トップ</a>
        </li>
        <li class="dropdown">
            <a class="street">商店街</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('shopping-street.show', ['name' => 'hidamari']) }}">陽だまり商店街</a></li>
                <li><a href="{{ route('shopping-street.show', ['name' => 'komorebi']) }}">木もれび商店街</a></li>
                <li><a href="{{ route('shopping-street.show', ['name' => 'hoshiakari']) }}">星あかり商店街</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('mypage') }}">管理者用ページ</a>
        </li>
    </ul>
</nav>
<div style="margin-top: 69px;"></div>
