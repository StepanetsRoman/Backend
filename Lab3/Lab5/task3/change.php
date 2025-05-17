<?php
function changeRow($pdo, $data)
{
    $sql = "UPDATE employees SET name = :name, position = :position, salary = :salary WHERE id = :id";
    $sthChange = $pdo->prepare($sql);

    $sthChange->bindValue(':name', $data['name']);
    $sthChange->bindValue(':position', $data['position']);
    $sthChange->bindValue(':salary', $data['salary']);
    $sthChange->bindValue(':id', $data['id']);

    $sthChange->execute();
}
