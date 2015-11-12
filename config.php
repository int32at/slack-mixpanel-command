<?php

    $config = array(
        //timezone that is used to calculate last seen
        "timezone" => "Europe/Vienna",

        //mixpanel configuration
        "mixpanel" => array(
            "key"=> "",
            "secret" => ""
        ),

        //slack configuration
        "slack" => array(
            //auth token of the custom command
            "token" => "",

            //whether to post publicly or to self only
            "post_to_channel" => 1,

            //id's of users that are allowed to use this command
            //otherwise will return not authenticated message.
            "auth_users" => array(
            )
        )
    );

?>
