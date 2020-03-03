<?php
/**
 * script php à l'arrache qui permet de générer des attributs responsive/mobile first pour les spacings
 */
$screens=["sm","md","lg","xl","xxl"];
$props=[
    "pt","pl","pr","pb","px","py","pxy",
    "mt","ml","mr","mb","mx","my","mxy"
];

$sizes=["none","tiny","small","medium","big"];
?>

//responsive attributes

<?foreach ($screens as $screen):?>
@media (min-width: @screen-<?=$screen?>) {
<?foreach ($props as $prop):?>
<?foreach ($sizes as $size):?>
    [<?=$prop?>-<?=$size?>='<?=$screen?>']{
        .<?=$prop?>-<?=$size?>;
    }
<?endforeach?>
<?endforeach?>
}
<?endforeach?>
