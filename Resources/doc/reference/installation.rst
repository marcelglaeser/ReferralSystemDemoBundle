Installation
============

Prerequisites
-------------

PHP 5.3 and Symfony 2.1 are needed to make this bundle work. Also FOSUserBundle
needs to be installed and configured beforehand. Please follow all steps described
`here <https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Resources/doc/index.md>`_

Installation
------------

Add bundle requirement to composer.json

.. code-block:: php
    :emphasize-lines: 3

    "require": {
        ...
        "venis/referral-system-demo-bundle": "dev-master"
        ...
    }

Run composer to download library and it's dependencies

.. code-block:: bash

    php composer.phar update

Register the bundle in ``app/AppKernel.php``:

.. code-block:: php
    :emphasize-lines: 4

    <?php
    $bundles = array(
        // ...
        new VEnis\Bundle\ReferralSystemDemoBundle\VEnisReferralSystemDemoBundle(),
    );