<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

/* * ***************************Includes********************************* */
require_once __DIR__  . '/../../../../core/php/core.inc.php';

class Remi extends eqLogic {
    /*     * *************************Attributs****************************** */



    /*     * ***********************Methode static*************************** */

    public static function cron5() {
        foreach(self::byType('remi') as $remi) {
            if ($remi->getIsEnable() == 1) {
                $cmd = $remi->getCmd(null, 'refresh');

                if (!is_object($cmd)){
                    continue;
                }
                $cmd->execCmd();
            }
        }
    }
    
    /*
     * Fonction exécutée automatiquement toutes les minutes par Jeedom
      public static function cron() {

      }
     */


    /*
     * Fonction exécutée automatiquement toutes les heures par Jeedom
      public static function cronHourly() {

      }
     */

    /*
     * Fonction exécutée automatiquement tous les jours par Jeedom
      public static function cronDaily() {

      }
     */



    /*     * *********************Méthodes d'instance************************* */

    public function preInsert() {
        
    }

    public function postInsert() {
        
    }

    public function preSave() {
        
    }

    public function postSave() {
        $id = $this->getCmd(null, 'id');
        if (!is_object($id)){
            $id = new remiCmd();
            $id->setName(__('ID', __FILE__));
        }
        $id->setEqLogic_id($this->getId());
        $id->setLogicalId('id');
        $id->setType('info');
        $id->setSubType('string');
        $id->save();

        $name = $this->getCmd(null, 'name');
        if (!is_object($name)){
            $name = new remiCmd();
            $name->setName(__('Nom', __FILE__));
        }
        $name->setEqLogic_id($this->getId());
        $name->setLogicalId('name');
        $name->setType('info');
        $name->setSubType('string');
        $name->save();

        $refresh = $this->getCmd(null, 'refresh');
        if (!is_object($refresh)){
            $refresh = new remiCmd();
            $refresh->setName(__('Rafraichir', __FILE__));
        }
        $refresh->setEqLogic_id($this->getId());
        $refresh->setLogicalId('refresh');
        $refresh->setType('action');
        $refresh->setSubType('other');
        $refresh->save();
    }

    public function preUpdate() {
        
    }

    public function postUpdate() {
        
    }

    public function preRemove() {
        
    }

    public function postRemove() {
        
    }

    /*
     * Non obligatoire mais permet de modifier l'affichage du widget si vous en avez besoin
      public function toHtml($_version = 'dashboard') {

      }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action après modification de variable de configuration
    public static function postConfig_<Variable>() {
    }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action avant modification de variable de configuration
    public static function preConfig_<Variable>() {
    }
     */

    public function refreshRemi() {
        
    }

    /*     * **********************Getteur Setteur*************************** */
}

class RemiCmd extends cmd {
    /*     * *************************Attributs****************************** */


    /*     * ***********************Methode static*************************** */


    /*     * *********************Methode d'instance************************* */

    /*
     * Non obligatoire permet de demander de ne pas supprimer les commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
      public function dontRemoveCmd() {
      return true;
      }
     */

    public function execute($_options = array()) {
        
    }

    /*     * **********************Getteur Setteur*************************** */
}


