<?php

namespace VEnis\Bundle\ReferralSystemDemoBundle\Model;

use FOS\UserBundle\Entity\User as BaseUser;

class User extends BaseUser implements UserInterface
{
    /**
     * Referral code (can be added to URI)
     *
     * @var string
     */
    protected $referralCode;

    /**
     * IP-address which user has during visit of referral link
     *
     * @var string
     */
    protected $referralIpAddress;

    /**
     * Date and time of user referral link visit
     *
     * @var \DateTime
     */
    protected $referralDate;

    /**
     * Referer which was during visiting of referral link
     *
     * @var string
     */
    protected $referralReferer;

    /**
     * Referral user (his referral code was used in URI)
     *
     * @var \FOS\UserBundle\Model\UserInterface
     */
    protected $referralUser;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    public function setReferralCode($referralCode)
    {
        $this->referralCode = $referralCode;
    }

    /**
     * {@inheritDoc}
     */
    public function getReferralCode()
    {
        return $this->referralCode;
    }

    /**
     * {@inheritDoc}
     */
    public function setReferralDate($referralDate)
    {
        $this->referralDate = $referralDate;
    }

    /**
     * {@inheritDoc}
     */
    public function getReferralDate()
    {
        return $this->referralDate;
    }

    /**
     * {@inheritDoc}
     */
    public function setReferralIpAddress($referralIpAddress)
    {
        $this->referralIpAddress = $referralIpAddress;
    }

    /**
     * {@inheritDoc}
     */
    public function getReferralIpAddress()
    {
        return $this->referralIpAddress;
    }

    /**
     * {@inheritDoc}
     */
    public function setReferralReferer($referralReferer)
    {
        $this->referralReferer = $referralReferer;
    }

    /**
     * {@inheritDoc}
     */
    public function getReferralReferer()
    {
        return $this->referralReferer;
    }

    /**
     * {@inheritDoc}
     */
    public function setReferralUser(\FOS\UserBundle\Model\UserInterface $user)
    {
        $this->referralUser = $user;
    }

    /**
     * {@inheritDoc}
     */
    public function getReferralUser()
    {
        return $this->referralUser;
    }

    /**
     * Generates referral code
     *
     * @param int $length
     * @return string
     * TODO: Can be extracted to separate service for better flexebility
     */
    static protected function generateReferralCode($length=6)
    {
        $hex = md5("yourSaltHere" . uniqid("", true));

        $pack = pack('H*', $hex);
        $tmp =  base64_encode($pack);

        $uid = preg_replace("#(*UTF8)[^A-Za-z0-9]#", "", $tmp);

        $len = max(4, min(128, $length));

        while (strlen($uid) < $len)
            $uid .= self::generateReferralCode(22);

        return substr($uid, 0, $length);
    }
}
