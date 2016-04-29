<?php

namespace Chap\Doctrine;
use Chap\RecordNotFoundException;
use Kdyby\Doctrine\EntityManager;
use Kdyby\Doctrine\EntityRepository;
use Kdyby\Doctrine\QueryBuilder;
use Nette\Object;


/**
 * Description of BaseFacade
 *
 * @author Ing. Jan Loufek <loufek@chap.cz>
 */
abstract class BaseFacade extends Object {

    /**
     * @var EntityManager
     */
    public $em;

    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder() {
        
        return $this->repository->createQueryBuilder('u');
    }

    public function findById($id) {
        return $this->repository->find($id);
    }


    public function getById($id) {
        $x = $this->repository->find($id);
        if ($x == NULL) {
            throw new RecordNotFoundException("Record with id $id not found!");
        }
        return $x;
    }


    public function clearDao(){
        $this->repository->clear();
    }

    /**
     * @param $entity
     * @return EntityManager
     */
    public function persist($entity){
        return $this->em->persist($entity);
    }

    /**
     * @return EntityManager
     * @throws \Exception
     */
    public function flush(){
        return $this->em->flush();
    }

    /**
     * @param $entity
     * @return EntityManager
     */
    public function persistAndFlush($entity){
        $this->persist($entity);
        return $this->flush();
    }
    
    public function removeCacheTag($tag){
        $this->em->getConfiguration()->getResultCacheImpl()->delete($tag);
        
    }

    protected function setRepo(EntityManager $em, $entityName){
        $this->em = $em;
        $this->repository = $em->getRepository($entityName);
    }


}
