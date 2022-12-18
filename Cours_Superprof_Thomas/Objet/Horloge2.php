<?php

class Horloge
{
    private $heure;
    private $minute;
    private $seconde;

    public function getHeure(){
        return $this->heure;
    }

    /**
     * @return mixed
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @return mixed
     */
    public function getSeconde()
    {
        return $this->seconde;
    }

    public function setHeure(int $l_heure){
        $this->heure = $l_heure;
        if ($this->heure > 23){
            $this->heure = 0;
        }
    }

    /**
     * @param mixed $minute
     */
    public function setMinute(int $minute): void
    {
        $this->minute = $minute;
        if ($this->minute > 60){
            $this->minute = 0;
        }
    }

    /**
     * @param mixed $seconde
     */
    public function setSeconde(int $seconde): void
    {
        $this->seconde = $seconde;
        if ($this->seconde > 60){
            $this->seconde = 0;
        }
    }


    public function avanceSeconde2 (int $NbSeconde){

        # cherche les heures, minutes, secondes
        $secondes = $this->getSeconde();
        $minutes = $this->getMinute();
        $heures = $this->getHeure();

        # ajoute les secondes demandées en paramètre
        $secondes += $NbSeconde;

        # si le nombre de secondes est supérieur à 60, je convertis en minutes et je donne le solde aux secondes
        if ($secondes > 60) {
            $convertisseurSecondeMinute = $secondes / 60;
            $minutes += floor($convertisseurSecondeMinute);
            $secondes -= 60 * floor($convertisseurSecondeMinute);
            $this->minute = $minutes;
            $this->seconde = $secondes;
        }

        # si le nombre de minutes est supérieur à 60, je convertis en heures et je donne le solde aux minutes
        if ($minutes > 60){
                $convertisseurMinuteHeure = $minutes / 60;
                $heures += floor($convertisseurMinuteHeure);
                $minutes -= 60 * floor($convertisseurMinuteHeure);
                $this->heure = $heures;
                $this->minute = $minutes;

            # si le nombre d'heure est supérieur à 23, mon heure passe à 0
            if ($heures > 23){
                    $heures = 0;
                    $this->heure = $heures;
                }
            }
        }


    public function affichage (){

        echo $this->heure.' heures '. $this->minute. ' minutes '.$this->seconde.' secondes.';
    }


}

$h1 = new Horloge();
$h1->setHeure(23);
$h1->setMinute(58);
$h1->setSeconde(0);
$h1->avanceSeconde2(250);
$h1->affichage();





/*Définir les get et les sets pour heure minutes secondes, créer fonction avance d'une seconde avec l'algo qui avance
d'une seconde. avant, dans setheure si le parametre de la fonction est plus grand que la limite de heure on met 0.
Ajouter une fonction affiche sans paramètre qui fait un echo de l'heure minute seconde.
*/