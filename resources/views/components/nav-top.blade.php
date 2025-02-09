<nav>
    <ul>
        <li class="{{ Request::is('/') ? 'current' : '' }}">
            <a href="{{ url('/') }}">トップ</a>
        </li>
        <li class="dropdown">
            <a class="syou">商店街</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('shopping-street.show', ['name' => 'hidamari']) }}">陽だまり商店街</a></li>
                <li><a href="{{ route('shopping-street.show', ['name' => 'komorebi']) }}">木もれび商店街</a></li>
                <li><a href="{{ route('shopping-street.show', ['name' => 'hoshiakari']) }}">星あかり商店街</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('mypage') }}">管理者用ページ</a>
            <!-- <a href="{{ url('/login') }}">管理者ログイン</a> -->
            <!-- <a href="{{ route('login') }}">管理者ログイン</a> -->
            <!-- @if(auth()->check())
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">ログイン</a>
            @endif -->
        </li>
    </ul>
</nav>
