<?php
/**
 * API Pronos
 * @param int $idpronos du paris selectioné
 * @return array $title = Defaite / Victoire / wait_validation / wait_match
 * 
 */
function infoPronos($idpronos)
{
    $db = dbConnect();

    /** IF PRONOS EXISTE */
    if($db->has("pronos", ['id_pronos' => $idpronos]))
    {   // Pronos existe on set toutes ces infos
        
        $pronos = $db->select("pronos", '*', ['id_pronos' => $idpronos ])[0];
        $confrontation = $db->select("confrontation", ["team1", "team2", "cote", "date_match"], ['id_pronos' => $idpronos]);


        $cote_total = $confrontation[0]['cote'];
        foreach ($confrontation as $v)
        {
            $date_last_match = max($date_last_match,$v['date_match']);

            $i++;
            if($i>1){
                $cote_total = $cote_total * $v['cote'];
            }
        }
        foreach ($confrontation as &$v)
        {
            $team2 = nameTeam($v['team2'])['nationality'];

            $v['team1'] = nameTeam($v['team1']);

            $v['team2'] = nameTeam($v['team2']);

            $date = $v['date_match'];


            $v['date_match'] = array("timestamp" => $date, "date" => date('d/m/Y', $date), "heure" => date('H m s', $date));
                 
        }

        // $date_last_match = date('d-m-Y', $date_last_match);


        switch ($pronos['type'])
        {
            case (1):
                $type = "Pronos Safe";
            break;

            case (2):
                $type = "Pronos Fun";
            break;
        }

        /** IF DATE MATCH OUT */
        $time = time();
        if($date_last_match < $time) 
        {
            // Le match est finis

            if($db->has("resultat", ['id_pronos' => $idpronos]))
            {
                 // Un resultat existe
                 $resultat = $db->select("resultat", ['id_pronos', "resultat", "note"], ['id_pronos' => $idpronos])[0];

                 if($resultat['resultat'] == 0)
                 {
                     $resultat = array("title" => "Defaite", "phrase" => "Match perdu", "icon" => "");
                 }
                 else
                 {
                     $resultat = array("title" => "Victoire", "phrase" => "Match gagné", "icon" => "");
                 }
            }
            else
            {
                // Pas encore de resultat
                $resultat = array("title" => "wait_validation", "phrase" => "<span class='text-warning'>En attente de validation</span>", "icon" => "");
            }
        }
        else
        {
            // Le match va se terminer plus tard
            $resultat = array("title" => "wait_match", "phrase" => "<span class='text-info'>En attente du match</span>", "icon" => "");
        }

        
        return $match = array(

            "info" => array(
                "resultat" => $resultat,
                 "id" => $idpronos,
                "content" => $pronos['content'],
                "cote_total" => round($cote_total, 1),
                "reliability" => $pronos['reliability'],
                "date" => date('d/m/Y',$date_last_match),
                "time_date_last_match" => $date_last_match,
                "date_last_match" => date('Y/m/d H:m', $date_last_match),
                "type" => $type
            ),
        
            "equipe" => $confrontation,

        

        );
    }
    else
    {
        throw new Exception("Ce pronos n'exite pas encore");
    }
}
