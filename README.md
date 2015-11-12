# slack-mixpanel-command
Allows you to retrieve your Mixpanel users within Slack!

![screenshot](https://cloud.githubusercontent.com/assets/2839279/11114600/29d29f8c-8926-11e5-85d7-6ff26fbd2f86.png)

### Installation

#### 1. Slack
Create a [new Slash Command](https://my.slack.com/services/new/slash-commands) on Slack with these parameters:
- **Command name**: /mixpanel
- **URL**: http://example.com/command.php
- **Method**: POST
- **Token**: copy the token, you will need it later.

Now click `Save Integration` and that's all you got to do on Slack.

#### 2. Webserver
Before deploying anything to your webserver, you have to edit `config.php` and add your keys.

- **timezone**: specifies the timezone which will be used to calculate last seen. A list can be found [here](http://php.net/manual/en/timezones.php).
- **mixpanel key**: Add your Mixpanel key here. They can be found in the Account/Projects setting
- **mixpanel secret**: Add your Mixpanel secret here. They can be found in the Account/Projects setting
- **slack token**: the token you just copied when you created the Slack command before
- **slack auth_users**: the user id's that have access to this command

Once this is done, copy `config.php` and `command.php` to your webserver so that it points to the Slack URL location (in this case, http://example.com/command.php).

That's it. Now you can query Mixpanel from Slack!

### Commands
- **/mixpanel**: *returns helpful information on how to use this command*
- **/mixpanel help**: *returns helpful information on how to use this command*
- **/mixpanel current**: *returns the total amount of users*
- **/mixpanel lastseen**: *returns the amount of users in the last week*
- **/mixpanel lastseen XXX**: *returns the amount of users in the last XXX (example: 1 week, 2 hours, 25 minutes)*
- **/mixpanel country XXX**: *returns the amount of users in the country (example: country US, country AT)*

### Notes
Usually, Slack commands are available to your complete team. 
However, in most cases you don't actually want your whole team to query Mixpanel all the time. 
That's why the `auth_users` exists - you can limit the usage of the /mixpanel command to certain people. 
You do this by adding the user's id to the array like:

```php
"auth_users" => array(
  "U03057NFB" /* User A */,
  "U03DXP2C3" /* User B */
)
```

Users that are not in this list will receive a `not authenticated.` message.
To get the user's id please reference to the [Slack user.list api tester](https://api.slack.com/methods/users.list/test). 
Query the data, search for the user name and copy the id.
