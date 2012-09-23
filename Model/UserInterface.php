<?php

namespace VEnis\Bundle\ReferralSystemDemoBundle\Model;

interface UserInterface
{
    /**
     * Sets user referral code, that can be used in Uri's
     * @param string $referralCode
     */
    public function setReferralCode($referralCode);

    /**
     * Returns user referral code, that can be used in Uri's
     * @return string
     */
    public function getReferralCode();

    /**
     * Sets user referral date (when user visits referral link)
     * @param \DateTime $referralDate
     */
    public function setReferralDate($referralDate);

    /**
     * Returns user referral date (when user visits referral link)
     * @return \DateTime
     */
    public function getReferralDate();

    /**
     * Sets user referral Ip address
     * @param string $referralIpAddress
     */
    public function setReferralIpAddress($referralIpAddress);

    /**
     * Returns user referral Ip address
     * @return string
     */
    public function getReferralIpAddress();

    /**
     * Sets user referral referer
     * @param string $referralReferer
     */
    public function setReferralReferer($referralReferer);

    /**
     * Returns user referral referer
     * @return string
     */
    public function getReferralReferer();

    /**
     * Sets user referral user (his referral code was used in URI)
     * @param UserInterface $user
     */
    public function setReferralUser(\FOS\UserBundle\Model\UserInterface $user);

    /**
     * Returns user referral user (his referral code was used in URI)
     * @return \FOS\UserBundle\Model\UserInterface
     */
    public function getReferralUser();
}
