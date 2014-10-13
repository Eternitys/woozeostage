<?php

namespace WS\OvsBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EvenementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EvenementRepository extends EntityRepository {

    public function triSport($actif) {
        $qb = $this->createQueryBuilder('e');
        $qb->where('e.actif=:actif')
                ->setParameter('actif', $actif)
                ->leftJoin('e.sport', 's')
                ->orderBy('s.nom');
        return $qb->getQuery()->getResult();
    }

    public function triUser($actif) {
        $qb = $this->createQueryBuilder('e');
        $qb->where('e.actif=:actif')
                ->setParameter('actif', $actif)
                ->leftJoin('e.user', 'u')
                ->orderBy('u.username');
        return $qb->getQuery()->getResult();
    }

    /**
     * Methode utilisée dans RechercheType
     * @return type
     */
    public function rechercheVille() {
        $qb = $this->createQueryBuilder('e');
        $qb->where('e.actif=:actif')
                ->setParameter('actif', 1)
                ->groupBy('e.ville')
                ->orderBy('e.ville', 'ASC');
        return $qb;
    }

    public function result_Ville($ville) {
        $qb = $this->createQueryBuilder('e');
        $qb->where('e.actif=:actif')
                ->setParameter('actif', 1)
                ->andWhere('e.ville= :ville')
                ->setParameter('ville', $ville)
                ->andWhere('e.type=:type')
                ->setParameter('type', 'public');
        return $qb->getQuery()->getResult();
    }

    public function result_ville_Priver($ville, $user, $amis) {
        $ami_tab = array();
        foreach ($amis as $ami) {
            $ami_tab[] = $ami->getUserBis();
        }
        $ami_tab[] = $user;

        $qb = $this->createQueryBuilder('e');
        $qb->Where('e.user in (:user)')
                ->setParameter('user', $ami_tab)
                ->andWhere('e.actif=:actif')
                ->setParameter('actif', 1)
                ->andWhere('e.ville=:ville')
                ->setParameter('ville', $ville)
                ->andWhere('e.type=:type')
                ->setParameter('type', 'priver');
        return $qb->getQuery()->getResult();
    }

    public function result_Sport($sport) {
        $qb = $this->createQueryBuilder('e');
        $qb->where('e.actif= :actif')
                ->setParameter('actif', 1)
                ->andWhere('e.type=:type')
                ->setParameter('type', 'public')
                ->leftJoin('e.sport', 's')
                ->andWhere('s.nom= :sport')
                ->setParameter('sport', $sport);
        return $qb->getQuery()->getResult();
    }

    public function result_sport_Priver($sport, $user, $amis) {
        $ami_tab = array();
        foreach ($amis as $ami) {
            $ami_tab[] = $ami->getUserBis();
        }
        $ami_tab[] = $user;

        $qb = $this->createQueryBuilder('e');
        $qb->Where('e.user in (:user)')
                ->setParameter('user', $ami_tab)
                ->andWhere('e.actif=:actif')
                ->setParameter('actif', 1)
                ->andWhere('e.type=:type')
                ->setParameter('type', 'priver')
                ->leftJoin('e.sport', 's')
                ->andWhere('s.nom= :sport')
                ->setParameter('sport', $sport);
        return $qb->getQuery()->getResult();
    }

    public function result($ville, $sport) {
        $qb = $this->createQueryBuilder('e');
        $qb->where('e.actif=:actif')
                ->setParameter('actif', 1)
                ->leftJoin('e.sport', 's')
                ->andWhere('e.ville= :ville')
                ->setParameter('ville', $ville)
                ->andWhere('e.type=:type')
                ->setParameter('type', 'public')
                ->andWhere('s.nom= :sport')
                ->setParameter('sport', $sport);
        return $qb->getQuery()->getResult();
    }

    public function result_Priver($ville, $sport, $user, $amis) {
        $ami_tab = array();
        foreach ($amis as $ami) {
            $ami_tab[] = $ami->getUserBis();
        }
        $ami_tab[] = $user;

        $qb = $this->createQueryBuilder('e');
        $qb->Where('e.user in (:user)')
                ->setParameter('user', $ami_tab)
                ->leftJoin('e.sport', 's')
                ->andWhere('e.actif=:actif')
                ->setParameter('actif', 1)
                ->andWhere('e.ville=:ville')
                ->setParameter('ville', $ville)
                ->andWhere('e.type=:type')
                ->setParameter('type', 'priver')
                ->andWhere('s.nom= :sport')
                ->setParameter('sport', $sport);
        return $qb->getQuery()->getResult();
    }

    public function sortiePriverDate($date, $user, $amis) {
        $ami_tab = array();
        foreach ($amis as $ami) {
            $ami_tab[] = $ami->getUserBis();
        }
        $ami_tab[] = $user;

        $qb = $this->createQueryBuilder('e');
        $qb->Where('e.user in (:user)')
                ->setParameter('user', $ami_tab)
                ->andWhere('e.actif=:actif')
                ->setParameter('actif', 1)
                ->andWhere('e.date=:date')
                ->setParameter('date', $date)
                ->andWhere('e.type=:type')
                ->setParameter('type', 'priver')
                ->orderBy('e.heure', 'ASC');
        return $qb->getQuery()->getResult();
    }

    public function sortiePriverAmi($user, $ami, $amis) {
        $ami_tab = array();
        foreach ($amis as $ami) {
            $ami_tab[] = $ami->getUserBis();
        }
        $ami_tab[] = $user;
        $ami_tab[] = $ami;

        $qb = $this->createQueryBuilder('e');
        $qb->Where('e.user in (:user)')
                ->setParameter('user', $ami_tab)
                ->andWhere('e.actif=:actif')
                ->setParameter('actif', 1)
                ->andWhere('e.type=:type')
                ->setParameter('type', 'priver')
                ->orderBy('e.date', 'ASC');
        return $qb->getQuery()->getResult();
    }

}
