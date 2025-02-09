@props(['street-name'])

<nav>
    <ul>
        <li class="{{ Request::is('/') ? 'current' : '' }}">
            <a href="{{ route('index') }}">トップ</a>
        </li>
        <li class="{{ Request::routeIs('shopping-street.index') && Request::route('name') === $streetName ? 'current' : '' }}">
            <a href="{{ route('shopping-street.show', ['name' => $streetName]) }}">
                ホーム
            </a>
        </li>
        <li class="{{ Request::routeIs('shopping-street.map') && Request::route('name') === $streetName ? 'current' : '' }}">
            <a href="{{ route('shopping-street.map.index', ['name' => $streetName]) }}">
                マップ
            </a>
        </li>
        <li class="{{ Request::routeIs('shopping-street.notifications') && Request::route('name') === $streetName ? 'current' : '' }}">
            <a href="{{ route('shopping-street.notices.index', ['name' => $streetName]) }}">
                お知らせ
            </a>
        </li>
        <li class="{{ Request::routeIs('shopping-street.access') && Request::route('name') === $streetName ? 'current' : '' }}">
            <a href="{{ route('shopping-street.access.index', ['name' => $streetName]) }}">
                アクセス
            </a>
        </li>
        <li>
            @if(auth()->check())
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">ログイン</a>
            @endif
        </li>
    </ul>
</nav>