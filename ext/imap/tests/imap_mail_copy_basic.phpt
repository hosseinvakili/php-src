--TEST--
Test imap_mail_copy() function : basic functionality
--CREDITS--
Olivier Doucet
--SKIPIF--
<?php
require_once(__DIR__.'/setup/skipif.inc');
?>
--CONFLICTS--
defaultmailbox
--FILE--
<?php
echo "*** Testing imap_mail_copy() : basic functionality ***\n";

require_once(__DIR__.'/setup/imap_include.inc');


echo "Create a new mailbox for test\n";
$imap_stream = setup_test_mailbox("", 1);
if (!is_resource($imap_stream)) {
    exit("TEST FAILED: Unable to create test mailbox\n");
}

$check = imap_check($imap_stream);
echo "Msg Count in new mailbox: ". $check->Nmsgs . "\n";

var_dump(imap_mail_copy($imap_stream, '1', 'INBOX.'.IMAP_MAILBOX_PHPT_PREFIX));

imap_close($imap_stream);
?>
--CLEAN--
<?php
$mailbox_suffix = '';
require_once('setup/clean.inc');
?>
--EXPECT--
*** Testing imap_mail_copy() : basic functionality ***
Create a new mailbox for test
Create a temporary mailbox and add 1 msgs
New mailbox created
Msg Count in new mailbox: 1
bool(true)
