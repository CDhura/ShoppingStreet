<html>

<head>
    <title>zimo_map</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1 class="tytle">○○商店街　簡単MAP</h1>
    <img class="center_img" src="{{ asset('img/ALLmap.png') }}" usemap="#storemap" alt="Store Map" width=1200>

<map name="storemap">
<area shape="rect" coords="622,76,805,266" href="{{ route('map.hamburger') }}" alt="Hamburger Shop">
<area shape="rect" coords="88,146,248,303" href="{{ route('map.shuttered1') }}" alt="shuttered Shop1">


</map>

</body>

</html>