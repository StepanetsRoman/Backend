<?php
function changeRow($pdo, $selectedData)
{
    $sql = "UPDATE tov SET name = :name,  price = :price, count = :count, note = :note WHERE id = :id";
    $sthChange = $pdo->prepare($sql);

    $sthChange->bindValue(':name', $selectedData['name']);  
    $sthChange->bindValue(':price', $selectedData['price']);
    $sthChange->bindValue(':count', $selectedData['count']);
    $sthChange->bindValue(':note', $selectedData['note']);
    $sthChange->bindValue(':id', $selectedData['id']);

    $sthChange->execute();
}
