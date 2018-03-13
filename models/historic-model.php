<?php
/*
 * La classe historic contient toutes les méthodes relatives à l'historique de navigation de l'utilisateur.
 * Elle est enfant de dataBase.
 * La classe contient en attribut les id de tout les éléments contenus dans la base de données et visités par l'utilisateur
 */
class historic extends dataBase {

    public $id = 0;
    public $id_user = 0;
    public $id_articles = 0;
    public $id_components = 0;
    public $id_products = 0;
    public $id_topic = 0;
    public $id_advice = 0;

    public function __construct() {
        parent::__construct();
    }
/*
 * Cette méthode permet d'ajouter les id des éléments contenus dans la base de données et visités par l'utilisateur
 */
    public function AddInHistoric() {
        $query = 'INSERT INTO `' . self::PREFIX . 'historic`(`id_user`, `id_articles`, id_components, id_products, id_topic, id_advice) VALUES (:id_user, :id_articles, :id_components, :id_products, :id_topic, :id_advice)';
        $addInHistoric = $this->db->prepare($query);
        $addInHistoric->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $addInHistoric->bindValue(':id_articles', $this->id_articles, PDO::PARAM_INT);
        $addInHistoric->bindValue(':id_components', $this->id_components, PDO::PARAM_INT);
        $addInHistoric->bindValue(':id_products', $this->id_products, PDO::PARAM_INT);
        $addInHistoric->bindValue(':id_topic', $this->id_topic, PDO::PARAM_INT);
        $addInHistoric->bindValue(':id_advice', $this->id_advice, PDO::PARAM_INT);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addInHistoric->execute();
    }
/*
 * Cette méthode permet d'afficher l'historique de navigation de l'utilisateur
 * La requête contient une jointure entre toutes les tables de la base de données du projet afin de récupèrer chaque élément contenus dans la base de données et visités par l'utilisateur 
 * Cela permet d'afficher dans l'historique un lien vers ces éléments déjà visités
 */
    public function getHistoric($user_id) {
        $query = 'SELECT
`' . self::PREFIX . 'historic`.`id` AS historic_id,
 `' . self::PREFIX . 'historic`.`id_user`,
 `' . self::PREFIX . 'historic`.`id_articles`,
 `' . self::PREFIX . 'historic`.`id_components`,
 `' . self::PREFIX . 'historic`.`id_products`,
 `' . self::PREFIX . 'historic`.`id_topic`,
 `' . self::PREFIX . 'historic`.`id_advice`,
 `' . self::PREFIX . 'advices`.`id` AS advices_id,
 `' . self::PREFIX . 'advices`.`title` AS advices_title,
 `' . self::PREFIX . 'articles`.`id` AS articles_id,
 `' . self::PREFIX . 'articles`.`title` AS article_title,
 `' . self::PREFIX . 'components`.`id` AS components_id,
 `' . self::PREFIX . 'components`.`componentsname`,
 `' . self::PREFIX . 'products`.`id` AS products_id,
 `' . self::PREFIX . 'products`.`productname`,
 `' . self::PREFIX . 'forum`.`id` AS forum_id,
 `' . self::PREFIX . 'forum`.`topic` AS topic,
 `' . self::PREFIX . 'topic`.`topicid`,
 `' . self::PREFIX . 'user`.`id` AS user_id,
 `' . self::PREFIX . 'user`.`login`
FROM
(
`' . self::PREFIX . 'historic`
LEFT JOIN
`' . self::PREFIX . 'advices`
ON
`' . self::PREFIX . 'historic`.`id_advice` = `' . self::PREFIX . 'advices`.`id`
LEFT JOIN
`' . self::PREFIX . 'user`
ON
`' . self::PREFIX . 'historic`.`id_user` = `' . self::PREFIX . 'user`.`id`
LEFT JOIN
`' . self::PREFIX . 'articles`
ON
`' . self::PREFIX . 'historic`.`id_articles` = `' . self::PREFIX . 'articles`.`id`
LEFT JOIN
`' . self::PREFIX . 'components`
ON
`' . self::PREFIX . 'historic`.`id_components` = `' . self::PREFIX . 'components`.`id`
LEFT JOIN
`' . self::PREFIX . 'products`
ON
`' . self::PREFIX . 'historic`.`id_products` = `' . self::PREFIX . 'products`.`id`
LEFT JOIN
`' . self::PREFIX . 'forum`
ON
`' . self::PREFIX . 'historic`.`id_topic` = `' . self::PREFIX . 'forum`.`id`
LEFT JOIN
`' . self::PREFIX . 'topic`
ON
`' . self::PREFIX . 'forum`.`topic` = `' . self::PREFIX . 'topic`.`topicid`
)
WHERE
`' . self::PREFIX . 'historic`.`id_user` = :id_user';
        $historicResult = $this->db->prepare($query);
        $historicResult->bindValue('id_user', $user_id, PDO::PARAM_INT);
        $historicResult->execute();
        if ($historicResult->execute()) {
            $historicList = $historicResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $historicList;
    }
/*
 * Cette méthode permet de compter le nombre de lines dans l'historique d'un utilisateur afin d'établir une pagination
 */
    public function countHistoricLine($user_id) {
        $query = 'SELECT COUNT(`id`) AS `historicLine` FROM `' . self::PREFIX . 'historic` WHERE id_user = :id_user';
        $historicLineCount = $this->db->prepare($query);
        $historicLineCount->bindValue('id_user', $user_id, PDO::PARAM_INT);
        $historicLineCount->execute();
        if ($historicLineCount->execute()) {
            $historicLineResult = $historicLineCount->fetch(PDO::FETCH_OBJ);
        } else {
            $historicLineResult = false;
        }
        return $historicLineResult;
    }
/*
 * Cette méthode permet de supprimer l'historique de l'utilisateur
 */
    public function deleteHistoric($user_id) {
        $query = 'DELETE FROM `' . self::PREFIX . 'historic` WHERE id_user = :id_user';
        $historicLineCount = $this->db->prepare($query);
        $historicLineCount->bindValue('id_user', $user_id, PDO::PARAM_INT);
        $historicLineCount->execute();
        return $historicLineCount;
    }

    function __destruct() {
        
    }

}

