<?php

namespace WS\OvsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use WS\OvsBundle\Entity\Evenement;
use WS\OvsBundle\Form\EvenementType;
use WS\OvsBundle\Form\EvenementEditType;
use WS\OvsBundle\Entity\UserEvenement;
use WS\OvsBundle\Form\EvenementGererType;
use WS\UserBundle\Entity\User;
use WS\UserBundle\Entity\Ami;

class AccueilController extends Controller {

    /**
     * @Route("/", name="ws_ovs_accueil_index", options={"expose"=true})
     * @Template()
     *
     * Méthode qui donne la liste des événement du jour.
     */
    public function indexAction() {
        // on recupère la date du jour qu'on formate pour avoir année-mois-jour.
        $date_new = new \DateTime();
        $date_format = $date_new->format('Y-m-d');
        $date = new \DateTime($date_format);
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository('WSOvsBundle:Evenement')->findBy(array('actif' => 1, 'date' => $date, 'type' => 'public'), array('heure' => 'ASC'));
        $user = $this->getUser();
        // Si un utilisateur est connecté on récupère la liste de ces événements privé et celle de ses amis.
        if ($user != null) {
            // statut 1 : validé ils sont amis, actif 1 : le lien n'ai pas desactivé
            $amis = $em->getRepository('WSUserBundle:Ami')->findBy(array('user' => $user, 'statut' => 1, 'actif' => 1));
            $evenement_privs = $em->getRepository('WSOvsBundle:Evenement')->sortiePriverDate($date, $user, $amis);
        } else {
            $evenement_privs = null;
        }

        return array('date' => $date, 'evenements' => $evenements, 'evenement_privs' => $evenement_privs);
    }

}
