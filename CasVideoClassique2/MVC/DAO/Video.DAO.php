<?php 

//classe statitque pour accès à la bdd

class VideoDAO {
    
    private static function ConnectVideo($user, $password) {
        $host = 'localhost';
        $bdd = 'video';
    

        try 
        {
            $mysqlPDO = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", 
            $user, $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('<h1>Erreur de connexion : </h1>' . $e->getMessage());
        }

        return $mysqlPDO;
    }

    private static function DisconnectVideo($mysqlPDO) {
        unset($mysqlPDO);
    }

    public static function ListeTypesFilms($user, $password) {
        //connexion bdd
        $mysqlPDO = VideoDAO::ConnectVideo($user, $password);
        //recupere liste films
        $sql = 'select CODE_TYPE_FILM, LIB_TYPE_FILM from typefilm order by LIB_TYPE_FILM;';
        // $rs = $mysqlPDO->query($sql);
        // $data = array();
        
        // foreach ($rs as $donnees) {
        //     $data[] = $donnees;
        // }
        $rs = $mysqlPDO->prepare($sql);
        $rs->execute();
        $data = $rs->fetchAll();

        //pour faire propre
        $rs->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);

        return $data;
    }

    public static function ListeStarFilms($user, $password) {
        //connexion bdd
        $mysqlPDO = VideoDAO::ConnectVideo($user, $password);
        //recupere liste films
        $sql = 'SELECT ID_STAR, NOM_STAR,PRENOM_STAR FROM star order by NOM_STAR,PRENOM_STAR;';
     
        $rs = $mysqlPDO->prepare($sql);
        $rs->execute();
        $data = $rs->fetchAll();

        //pour faire propre
        $rs->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);

        return $data;
    }


    // retourne les donnees d'un type de film issu de la table TypeFilm
    public static function retourneTypeFilm($user, $password, $type) {
        $mysqlPDO = VideoDAO::ConnectVideo($user, $password);

        $sql = "select CODE_TYPE_FILM, LIB_TYPE_FILM from typefilm where CODE_TYPE_FILM=?" ; 

        $rs = $mysqlPDO->prepare($sql);
        $rs->execute(array($type));
        $data = $rs->fetch(PDO::FETCH_ASSOC);

        $rs->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);

        return $data;
    }

        // retourne la liste des films d'un type voulu

        public static function listeFilmsParType($user, $password, $type) {
            $mysqlPDO = VideoDAO::ConnectVideo($user, $password);

            $sql = 'select ID_FILM, TITRE_FILM, ANNEE_FILM, ID_REALIS, REF_IMAGE, RESUME, NOM_STAR, PRENOM_STAR';

            $sql .= ' from film, star' ;

            $sql .= ' where film.ID_REALIS=star.ID_STAR';

            $sql .= ' and CODE_TYPE_FILM=?';

            $sql .= ' order by TITRE_FILM';

            $rs = $mysqlPDO->prepare($sql);
            $rs->execute(array($type));
            $data = $rs->fetchAll();
    
            $rs->closeCursor();
            VideoDAO::DisconnectVideo($mysqlPDO);
    
            return $data;
        }
    
        public static function ExisteAdherent ($user, $password, $dataResa) {
            $mysqlPDO = VideoDAO::ConnectVideo($user, $password);

            $sql = "SELECT * FROM adherent where num_adherent= ? and nom_adherent=?";

            $rs =$mysqlPDO->prepare($sql);
            $rs->execute(array($dataResa['numadherent'] , $dataResa['nom']));

            $data = $rs->fetchAll();
            $nombre = count($data);

            $rs->closeCursor();
            VideoDAO::DisconnectVideo($mysqlPDO);

            return ($nombre !=0);
        }

        public static function ExisteResaPourCeClient($user, $password, $dataResa) {

            $mysqlPDO = VideoDAO::ConnectVideo($user, $password);

            $sql = "SELECT * FROM location where num_adherent= :numadherent and id_film = :codfil and debut_location = :libcejour";

            $rs =$mysqlPDO->prepare($sql);
            $rs->execute(array(':numadherent' => $dataResa['numadherent'], ':codfil' => $dataResa['codfil'], ':libcejour' => $dataResa['libcejour']));

            $data = $rs->fetchAll();
            $nombre = count($data);

            $rs->closeCursor();
            VideoDAO::DisconnectVideo($mysqlPDO);

            return ($nombre !=0);
            
        }

        public static function InsertResa($user, $password, $dataResa) {

            $mysqlPDO = VideoDAO::ConnectVideo($user, $password);

            $sql = "INSERT INTO location (num_adherent, id_film, code_support, debut_location) VALUES (:numadherent, :codfil, \"D\", :libcejour)";

            $rs =$mysqlPDO->prepare($sql);
            $rs->execute(array(':numadherent' => $dataResa['numadherent'], ':codfil' => $dataResa['codfil'], ':libcejour' => $dataResa['libcejour']));

        
            $nombre = $rs->rowCount();

            $rs->closeCursor();
            VideoDAO::DisconnectVideo($mysqlPDO);

            return ($nombre !=0);
        }


        public static function creationFilm($user, $password, $newFilm) {

        $mysqlPDO = VideoDAO::ConnectVideo($user, $password);
        $sql = 'insert into film(ID_FILM, TITRE_FILM, ID_REALIS, CODE_TYPE_FILM, ANNEE_FILM, REF_IMAGE, RESUME) values (';
        $sql .= $newFilm->getId() . ', ';
        $sql .= '\'' . strtoupper(trim($newFilm->getTitre())) . '\', '; // avec conversion titre en MAJ
        $sql .= $newFilm->getReal() . ', ';
        $sql .= '\'' . $newFilm->getType() . '\', ';
        $sql .= $newFilm->getAnnee() . ', ';
        $sql .= '\'' . $newFilm->getRef() . '\', ';
        $sql .= '\'' . ucfirst(trim($newFilm->getResume())) . '\' );'; // capitale forcée au début du résumé
        $rs = $mysqlPDO->prepare($sql);
        $rs->execute();

        $rs->closeCursor();
        VideoDAO::DisconnectVideo($mysqlPDO);
        }
}


