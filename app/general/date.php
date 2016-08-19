<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:42
 */

namespace App\general;


class date
{
    /**
     * Formate la date au format entier STRTOTIME
     * @param $date // Date enregistrer au format d-m-Y H:i:s
     * @return int // Retourne la valeur INT DATETIME
     */
    public function format_strt($date)
    {
        return strtotime($date);
    }

    /**
     * Formate la date au format Standard définie par le prog
     * @param $format
     * @param $strtotime
     * @return bool|string
     */
    public function formatage($format, $strtotime)
    {
        return date($format, $strtotime);
    }

    /**
     * Formate la date STRTOTIME en formatage standard Français du type (JOUR DATE MOIS ANNEE)
     * @param $strtotime
     * @return string
     */
    public function formatage_long($strtotime){
        $j = date("N", $strtotime);
        $m = date("n", $strtotime);
        $y = date("Y", $strtotime);

        $dj = date("d", $strtotime);

        switch($j)
        {
            case 1: $data_jour = "Lundi"; break;
            case 2: $data_jour = "Mardi"; break;
            case 3: $data_jour = "Mercredi"; break;
            case 4: $data_jour = "Jeudi"; break;
            case 5: $data_jour = "Vendredi"; break;
            case 6: $data_jour = "Samedi"; break;
            case 7: $data_jour = "Dimanche"; break;
        }

        switch($m)
        {
            case 1: $data_mois = "Janvier"; break;
            case 2: $data_mois = "Février"; break;
            case 3: $data_mois = "Mars"; break;
            case 4: $data_mois = "Avril"; break;
            case 5: $data_mois = "Mai"; break;
            case 6: $data_mois = "Juin"; break;
            case 7: $data_mois = "Juillet"; break;
            case 8: $data_mois = "Aout"; break;
            case 9: $data_mois = "Septembre"; break;
            case 10: $data_mois = "Octobre"; break;
            case 11: $data_mois = "Novembre"; break;
            case 12: $data_mois = "Décembre"; break;
        }

        return $data_jour." ".$dj." ".$data_mois." ".$y;
    }

    /**
     * Formate la date STRTOTIME choisie en fonction du Format [d = jours | m = mois] et retourne la version française
     * @param $format
     * @param $strtotime
     * @return bool|string
     */
    public function formatage_sequentiel($format, $strtotime){
        if($format == "d"){
            $d = date("N", $strtotime);
            switch($d)
            {
                case 1: $data_jour = "Lundi"; break;
                case 2: $data_jour = "Mardi"; break;
                case 3: $data_jour = "Mercredi"; break;
                case 4: $data_jour = "Jeudi"; break;
                case 5: $data_jour = "Vendredi"; break;
                case 6: $data_jour = "Samedi"; break;
                case 7: $data_jour = "Dimanche"; break;
            }
            return $data_jour;
        }elseif($format == "m"){
            $m = date("n", $strtotime);
            switch($m)
            {
                case 1: $data_mois = "Janvier"; break;
                case 2: $data_mois = "Février"; break;
                case 3: $data_mois = "Mars"; break;
                case 4: $data_mois = "Avril"; break;
                case 5: $data_mois = "Mai"; break;
                case 6: $data_mois = "Juin"; break;
                case 7: $data_mois = "Juillet"; break;
                case 8: $data_mois = "Aout"; break;
                case 9: $data_mois = "Septembre"; break;
                case 10: $data_mois = "Octobre"; break;
                case 11: $data_mois = "Novembre"; break;
                case 12: $data_mois = "Décembre"; break;
            }
            return $data_mois;
        }else{
            return false;
        }
    }

    /**
     * Formate la date STANDARD en fonction du format choisie [d = jours | m = mois] et retourne la version française
     * @param $format
     * @return bool|string
     */
    public function formatage_sequentiel_no_str($format){
        if($format == "d"){
            $d = date("N");
            switch($d)
            {
                case 1: $data_jour = "Lundi"; break;
                case 2: $data_jour = "Mardi"; break;
                case 3: $data_jour = "Mercredi"; break;
                case 4: $data_jour = "Jeudi"; break;
                case 5: $data_jour = "Vendredi"; break;
                case 6: $data_jour = "Samedi"; break;
                case 7: $data_jour = "Dimanche"; break;
            }
            return $data_jour;
        }elseif($format == "m"){
            $m = date("n");
            switch($m)
            {
                case 1: $data_mois = "Janvier"; break;
                case 2: $data_mois = "Février"; break;
                case 3: $data_mois = "Mars"; break;
                case 4: $data_mois = "Avril"; break;
                case 5: $data_mois = "Mai"; break;
                case 6: $data_mois = "Juin"; break;
                case 7: $data_mois = "Juillet"; break;
                case 8: $data_mois = "Aout"; break;
                case 9: $data_mois = "Septembre"; break;
                case 10: $data_mois = "Octobre"; break;
                case 11: $data_mois = "Novembre"; break;
                case 12: $data_mois = "Décembre"; break;
            }
            return $data_mois;
        }else{
            return false;
        }
    }

    /**
     * Formate la date au format STANDARD et la retourne au format textuel distant (il y a N)
     * @param $date
     * @return string
     */
    public function ilya($date){
        $date_a_comparer = new DateTime($date);
        $date_actuelle = new DateTime("now");

        $intervalle = $date_a_comparer->diff($date_actuelle);

        if ($date_a_comparer > $date_actuelle)
        {
            $prefixe = 'dans ';
        }
        else
        {
            $prefixe = 'il y a ';
        }

        $ans = $intervalle->format('%y');
        $mois = $intervalle->format('%m');
        $jours = $intervalle->format('%d');
        $heures = $intervalle->format('%h');
        $minutes = $intervalle->format('%i');
        $secondes = $intervalle->format('%s');

        if ($ans != 0)
        {
            $relative_date = $prefixe . $ans . ' an' . (($ans > 1) ? 's' : '');
            if ($mois >= 6) $relative_date .= ' et demi';
        }
        elseif ($mois != 0)
        {
            $relative_date = $prefixe . $mois . ' mois';
            if ($jours >= 15) $relative_date .= ' et demi';
        }
        elseif ($jours != 0)
        {
            $relative_date = $prefixe . $jours . ' jour' . (($jours > 1) ? 's' : '');
        }
        elseif ($heures != 0)
        {
            $relative_date = $prefixe . $heures . ' heure' . (($heures > 1) ? 's' : '');
        }
        elseif ($minutes != 0)
        {
            $relative_date = $prefixe . $minutes . ' minute' . (($minutes > 1) ? 's' : '');
        }
        else
        {
            $relative_date = $prefixe . ' quelques secondes';
        }

        return $relative_date;
    }

    /**
     * Formate la date du jour au format STRTOTIME
     * @return int
     */
    public function date_jour_strt(){
        return strtotime(date("d-m-Y"));
    }


    /**
     * Retrouve et formate la distance de date entre tel jour et tel jour par rapport à l'année et la semaine (du N jour au N jour)
     * @param $annee
     * @param $semaine
     * @return string
     */
    public function semaine($annee, $semaine)
    {
        $date_format = new date();

        $lundi = new DateTime();
        $lundi->setISODate($annee, $semaine);

        $dimanche = new DateTime();
        $dimanche->setISODate($annee, $semaine);
        date_modify($dimanche, '+4 days');

        $format_lundi = $lundi->format("d-m-y");
        $format_dimanche = $dimanche->format("d-m-y");

        $strt_lundi = $date_format->format_strt($format_lundi);
        $strt_dimanche = $date_format->format_strt($format_dimanche);

        $day_lundi = $lundi->format("d");
        $day_dimanche = $dimanche->format("d");
        $mois_lundi = $date_format->formatage_sequentiel("m", $strt_lundi);
        $mois_dimanche = $date_format->formatage_sequentiel("m", $strt_dimanche);

        $format = "Du ".$day_lundi." ".$mois_lundi." au ".$day_dimanche." ".$mois_dimanche." ".date("Y");
        return $format;
    }

    /**
     * Retourne la valeur STRTOTIME distante entre deux date REF: function semaine
     * @param $annee
     * @param $semaine
     * @return array
     */
    public function semaine_strt($annee, $semaine)
    {
        $date_format = new date();
        $lundi = new DateTime();
        $lundi->setISODate($annee, $semaine);

        $vendredi = new DateTime();
        $vendredi->setISODate($annee, $semaine);
        date_modify($vendredi, '+4 days');

        $format_lundi = $lundi->format("d-m-Y");
        $format_vendredi = $vendredi->format("d-m-Y");

        $strt_lundi = $date_format->format_strt($format_lundi);
        $strt_vendredi = $date_format->format_strt($format_vendredi);

        return array(
            "strt_lundi" => $strt_lundi,
            "strt_vendredi" => $strt_vendredi
        );
    }

    /**
     * Formate le mois courant et trouve l'occurence de début et de fin de mois et retourne le mois au format STRTOTIME différenciel
     * @return array
     */
    public function month_strt()
    {
        $date_format = new date();
        $debut_mois = $date_format->format_strt(date("01-m-Y"));
        $fin_mois = $date_format->format_strt(date("31-m-Y"));

        return array("debut_mois" => $debut_mois, "fin_mois" => $fin_mois);

    }

    /**
     * Format et retourne le STRTOTIME en reste (Reste N jour)
     * @param $strtotime
     * @return float
     */
    public function reste($strtotime)
    {
        $diff = $strtotime - time();
        return round($diff / 86400, 0);
    }
    
}