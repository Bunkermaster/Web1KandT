<?php
/**
 * verifie si un slug existe ou pas
 * false si existe pas
 * true si existe
 * true si slug est vide
 * @param string $slug
 * @param PDO $pdo
 * @return bool
 */
function checkSlug($slug, $pdo)
{
    $slug = trim($slug);
    if ($slug === '') {
        return true;
    }
    $sql = "SELECT
      count(*)
    FROM
      `page`
    WHERE
      slug = :slug
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':slug', $slug);
    $stmt->execute();
    $compteur = $stmt->fetch()[0];
    if ($compteur > 0) {
        return true;
    }
    return false;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=kandt-webp2019;port=3306','root','root');
} catch(PDOException $exception) {
    die($exception->getMessage());
}
$pdo->exec('SET NAMES UTF8');
