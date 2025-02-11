@props(['name'])

<div class="custom-button">
    <a href="{{ route('shopping-street.map.index', ['name' => $name]) }}">イラストMAPに戻る</a>
</div>