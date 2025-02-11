@props(['street-name'])

<nav class="menu-list">
    <ul>
        <li>
            <a href="{{ route('index') }}">トップ</a>
        </li>
        <li>
            <a href="{{ route('shopping-street.show', ['name' => $streetName]) }}">
                ホーム
            </a>
        </li>
        <li>
            <a href="{{ route('shopping-street.map.index', ['name' => $streetName]) }}">
                マップ
            </a>
        </li>
        <li>
            <a href="{{ route('shopping-street.notices.index', ['name' => $streetName]) }}">
                お知らせ
            </a>
        </li>
        <li>
            <a href="{{ route('shopping-street.access.index', ['name' => $streetName]) }}">
                アクセス
            </a>
        </li>
        <li>
            <a href="{{ route('mypage') }}">
                管理者用ページ
            </a>
        </li>
    </ul>
</nav>
<div style="margin-top: 69px;"></div>