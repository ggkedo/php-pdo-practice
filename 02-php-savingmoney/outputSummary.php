<section class="outputSummary" id="outputSummary">
    
    <h2>Eredmény</h2>
    
    <p>Ha a hónap első napján félreteszel <span class="firstDay"><?php $firstDay ?></span> Ft-ot, majd aztán minden további nap <span class="reduction"><?php $reduction ?></span> Ft-tal kevesebbet, akkor az alábbi megspórolt összegekre számíthatsz:</p>
    
    <div class="summary">
        <h3>Egy hónap alatt</h3>
        <p class="result month"><?php echo number_format($results['monthly'], 0, ".", " "); ?> Ft</p>

        <h3>Egy év alatt</h3>
        <p class="result year"><?php echo number_format($results['yearly'], 0, ".", " "); ?> Ft</p>

        <a href="index.php" class="new">Új kalkuláció</a>
    </div>
    
</section>

<section class="outputDetails">
    
    <h2>Részletek</h2>
    
    <?php echo $results['table'] ?>
    
</section>