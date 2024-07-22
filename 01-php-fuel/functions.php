<?php
function get_input($par, $def)
{
    if(isset($_GET[$par])) {return $_GET[$par];}
    return $def;
}

function print_form($distance, $avg, $price)
{
    echo '<form action="" method="get">
				
    <div>
        <label for="distance">Távolság (km)</label>
        <input type="number" id="distance" value="' .$distance. '" name="distance">
    </div>
    <div>
        <label for="avg">Átlagfogyasztás (L/100km)</label>
        <input type="number" id="avg" value="' .$avg. '" name="avg" step="0.1">
    </div>
    <div>
        <label for="price">Üzemanyagár (HUF/L)</label>
        <input type="number" id="price" value="' .$price. '" name="price">
    </div>
    
    <button>Kalkuláció</button>
    
</form>';
}

function print_result()
{

}
?>