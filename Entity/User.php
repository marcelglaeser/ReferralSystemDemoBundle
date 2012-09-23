<?php
namespace  VEnis\Bundle\ReferralSystemDemoBundle\Entity;

use VEnis\Bundle\ReferralSystemDemoBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Base Doctrine ORM class for handling referral system functionality *
 */
class User extends BaseUser
{
    /**
     * @ORM\PrePersist
     *
     * Generates referral code for user
     */
    public function initReferralData()
    {
        $this->referralCode = self::generateReferralCode();
    }
}
