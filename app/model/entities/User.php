<?php




namespace App;

use Chap\Doctrine\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * App\User
 *
 * @ORM\Entity
 * @ORM\Table(name="`user`", uniqueConstraints={@ORM\UniqueConstraint(name="login_name_UNIQUE", columns={"login_name"})})
 */
class User extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`password`", type="string", length=100)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $login_name;

    /**
     * @ORM\Column(name="`role`", type="string", length=45)
     */
    protected $role;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $last_seen;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    protected $email;



    public function __construct()
    {

    }



}