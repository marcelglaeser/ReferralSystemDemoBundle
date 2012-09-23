Configuration
=============

Configuration options

* ``v_enis_referral_system_demo``
    * ``query_param_name`` : Name of the referral code query parameter in the URI
    * ``cookie_param_names`` :
        * ``code`` : Name of the cookie param that stores referral code
        * ``ip`` : Name of the cookie param that stores visitors ip-address
        * ``date`` : Name of the cookie param that stores referral uri visit date and time
        * ``referer`` : Name of the cookie param that stores referer

Full Configuration Options
--------------------------

.. code-block:: yaml

    v_enis_referral_system_demo:
        # Name of the referral code query parameter in the URI
        query_param_name:     ref # Example: refid
        cookie_param_names:
            # Name of the cookie param that stores referral code
            code:                 ref_code # Example: myrefcode
            # Name of the cookie param that stores visitors ip-address
            ip:                   ref_ip # Example: myrefip
            # Name of the cookie param that stores referral uri visit date and time
            date:                 ref_date # Example: myrefdate
            # Name of the cookie param that stores referer
            referer:              ref_referer # Example: myrefreferer
