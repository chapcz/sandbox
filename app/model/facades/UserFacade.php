<?php

namespace Chap\Doctrine;
use App\User;
use Kdyby\Doctrine\EntityManager;


/**
 * Description of UserFacade
 *
 * @author Ing. Jan Loufek <loufek@chap.cz>
 */
class UserFacade extends BaseFacade   {
    
   

    public function __construct(EntityManager $em ) {
        $this->setRepo($em, User::class);
     }

     
    public function findByEmail($email) {

        return $this->repository->findOneBy(array("email" => $email));
    }

    

 
    

}
