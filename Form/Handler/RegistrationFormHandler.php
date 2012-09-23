<?php

namespace  VEnis\Bundle\ReferralSystemDemoBundle\Form\Handler;

use FOS\UserBundle\Form\Handler\RegistrationFormHandler as BaseHandler;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use FOS\UserBundle\Util\TokenGeneratorInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class RegistrationFormHandler extends BaseHandler
{
    /**
     * Name of the cookie param that stores referral code
     * @var string
     */
    protected $referralCodeCookieParamName = "ref_code";

    /**
     * Name of the cookie param that stores visitors ip-address
     * @var string
     */
    protected $referralIpAddressCookieParamName = "ref_ip";

    /**
     * Name of the cookie param that stores referral uri visit date and time
     * @var string
     */
    protected $referralDateCookieParamName = "ref_date";

    /**
     * Name of the cookie param that stores referer
     * @var string
     */
    protected $referralRefererCookieParamName = "ref_referer";

    public function __construct(
        FormInterface $form,
        Request $request,
        UserManagerInterface $userManager,
        MailerInterface $mailer,
        TokenGeneratorInterface $tokenGenerator,
        $referralCodeCookieParamName,
        $referralIpAddressCookieParamName,
        $referralDateCookieParamName,
        $referralRefererCookieParamName
    ) {
        parent::__construct($form, $request, $userManager, $mailer, $tokenGenerator);
        $this->referralCodeCookieParamName = $referralCodeCookieParamName;
        $this->referralIpAddressCookieParamName = $referralIpAddressCookieParamName;
        $this->referralDateCookieParamName = $referralDateCookieParamName;
        $this->referralRefererCookieParamName = $referralRefererCookieParamName;
    }

    protected function onSuccess(UserInterface $user, $confirmation)
    {
        if($user instanceof \VEnis\Bundle\ReferralSystemDemoBundle\Model\UserInterface)
        {
            // Setting parent user
            $referralCode = $this->request->cookies->get($this->referralCodeCookieParamName);

            if(false == is_null($referralCode))
            {
                $parentUser = $this->userManager->findUserBy(array("referralCode" => $referralCode));
                if(false == is_null($parentUser))
                {
                    $user->setReferralUser($parentUser);

                    // Setting referral IP
                    $referralIpAddress = $this->request->cookies->get($this->referralIpAddressCookieParamName, "");
                    $user->setReferralIpAddress($referralIpAddress);

                    // Setting referral DateTime
                    $referralDate = new \DateTime();
                    $referralDate->setTimestamp($this->request->cookies->getInt($this->referralDateCookieParamName, 0));
                    $user->setReferralDate($referralDate);

                    // Setting referral referer
                    $referralReferer = $this->request->cookies->get($this->referralRefererCookieParamName, "");
                    $user->setReferralReferer($referralReferer);
                }
            }

        }

        parent::onSuccess($user, $confirmation);
    }


}
